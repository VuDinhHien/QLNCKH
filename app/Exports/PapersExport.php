<?php

namespace App\Exports;

use App\Models\Magazine;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PapersExport implements FromView, WithTitle, WithStyles
{
    protected $magazines;

    public function __construct()
    {
        // Lấy tất cả các magazine và nhóm theo paper_id
        $this->magazines = Magazine::with(['scientists' => function($query) {
            $query->withPivot('role_id');
        }])->get()->groupBy('paper_id');
    }

    public function view(): View
    {
        return view('exports.papers', ['magazines' => $this->magazines]);
    }

    public function title(): string
    {
        return 'Magazines by Paper';
    }

    public function styles(Worksheet $sheet)
    {
        // Bắt đầu từ hàng đầu tiên
        $row = 1;
        $counter = 1;

        // Áp dụng định dạng cho tiêu đề của mỗi bảng
        foreach ($this->magazines as $paperId => $magazineGroup) {
            $headerRow = $row + 1; // Tiêu đề luôn ở hàng tiếp theo

            // Tiêu đề của bảng hiện tại
            $sheet->setCellValue("A{$row}", $this->intToRoman($counter) . ". Paper ID: {$paperId}");
            $sheet->mergeCells("A{$row}:D{$row}");
            $sheet->getStyle("A{$row}")->getFont()->setBold(true);
            $counter++;

            // Áp dụng định dạng nền màu vàng và in đậm cho tiêu đề của bảng hiện tại
            $sheet->getStyle("A{$headerRow}:D{$headerRow}")->applyFromArray([
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'color' => ['argb' => 'FFFF00'],
                ],
            ]);
            $sheet->getStyle("A{$headerRow}:D{$headerRow}")->getFont()->setBold(true);

            // Tăng số hàng lên bằng số lượng bản ghi trong nhóm cộng thêm 3 (1 cho tiêu đề bảng, 1 cho tiêu đề cột, 1 cho khoảng cách)
            $row = $headerRow + count($magazineGroup) + 2;
        }

        // Đặt chiều rộng cột
        foreach (range('A', 'D') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }
    }

    private function intToRoman($num)
    {
        $n = intval($num);
        $result = '';
        $lookup = ['M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1];
        foreach ($lookup as $roman => $value) {
            $matches = intval($n / $value);
            $result .= str_repeat($roman, $matches);
            $n = $n % $value;
        }
        return $result;
    }
}
