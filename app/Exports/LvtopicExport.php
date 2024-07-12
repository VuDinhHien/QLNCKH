<?php

namespace App\Exports;

use App\Models\Topic;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class LvtopicExport implements FromArray, WithTitle, WithHeadings, WithStyles, WithColumnWidths
{
    protected $topics;
    protected $headerPositions = [];

    public function __construct()
    {
        // Lấy tất cả các đề tài cùng với cấp đề tài và danh sách các nhà khoa học
        $this->topics = Topic::with(['lvtopic', 'scientists' => function($query) {
            $query->withPivot('role_id');
        }])->get()->groupBy('lvtopic_id');
    }

    public function array(): array
    {
        $data = [];
        $counter = 1;
        $rowIndex = 1;

        // Thêm dòng tiêu đề chính
        $data[] = ['Thống kê danh sách đề tài theo cấp', '', '', '', ''];
        $this->headerPositions[] = $rowIndex; // Lưu vị trí của dòng tiêu đề chính
        $rowIndex++;

        foreach ($this->topics as $lvtopicId => $topicGroup) {
            // Header row
            $rowHeader = [
                $this->intToRoman($counter) . ' ' . $topicGroup->first()->lvtopic->lvtopic_name, '', '', '', ''
            ];
            $data[] = $rowHeader;
            $rowIndex++;

            // Column titles row
            $data[] = ['Tên đề tài', 'Năm', 'Ngày bắt đầu', 'Ngày kết thúc', 'Tên cán bộ và vai trò'];
            $this->headerPositions[] = $rowIndex; // Lưu vị trí của tiêu đề
            $rowIndex++;

            foreach ($topicGroup as $topic) {
                $scientists = implode(', ', $topic->scientists->map(function ($scientist) {
                    return $scientist->profile_name . ' (' . \App\Models\Role::find($scientist->pivot->role_id)->role_name . ')';
                })->toArray());
                $data[] = [$topic->topic_name, $topic->year, $topic->start_date, $topic->end_date, $scientists];
                $rowIndex++;
            }

            // Add an empty row
            $data[] = ['', '', '', '', ''];
            $rowIndex++;
            $counter++;
        }
        return $data;
    }

    public function title(): string
    {
        return 'Topics by Level';
    }

    public function headings(): array
    {
        return [];
    }

    public function styles(Worksheet $sheet)
    {
        // Đặt wrap text cho tất cả các cột
        $sheet->getStyle('A:Z')->getAlignment()->setWrapText(true);

        // Áp dụng style cho các tiêu đề
        foreach ($this->headerPositions as $headerPosition) {
            $sheet->getStyle("A{$headerPosition}:E{$headerPosition}")->applyFromArray([
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'color' => ['argb' => 'FFFF00'],
                ],
                'font' => [
                    'bold' => true,
                ],
            ]);
        }

        return [];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 40,  // Tên đề tài
            'B' => 15,  // Năm
            'C' => 20,  // Ngày bắt đầu
            'D' => 20,  // Ngày kết thúc
            'E' => 50,  // Tên cán bộ và vai trò
        ];
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
