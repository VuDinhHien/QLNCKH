<?php

namespace App\Exports;

use PhpOffice\PhpSpreadsheet\Style\Alignment;
use App\Models\Magazine;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class MagazinesExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    private $rowNumber = 1; // Biến đếm hàng


    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Magazine::with(['scientists', 'paper'])->get();
    }

    public function map($magazine): array
    {
        $scientistsRoles = $magazine->scientists->map(function ($scientist) {
            $roleName = \App\Models\Role::find($scientist->pivot->role_id)->role_name;
            return "{$scientist->profile_name} ({$roleName})";
        })->implode('; ');

        return [
            $this->rowNumber++, 
            $magazine->magazine_name,
            $magazine->year,
            $magazine->journal,
            $magazine->paper->paper_name,
            $scientistsRoles,
        ];
    }

    public function headings(): array
    {
        return [
            'STT',
            'Tên bài báo',
            'Năm công bố',
            'Tên Tạp chí',
            'Loại bài báo',
            'Cán bộ tham gia',
        ];
    }
    /**
     * Áp dụng kiểu cho bảng tính
     */
    public function styles(Worksheet $sheet)
    {
        // Làm đậm và đổi nền màu vàng cho hàng đầu tiên
        $sheet->getStyle('A1:G1')->applyFromArray([
            'font' => ['bold' => true],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['argb' => 'FFFF00'],
            ],
        ]);

        // Thiết lập độ rộng cho cột A và B
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setWidth(80);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setWidth(40);
        $sheet->getColumnDimension('E')->setWidth(40);
        $sheet->getColumnDimension('F')->setWidth(80);
        // Đặt độ rộng cụ thể cho cột B


        // Căn giữa số trong cột A
        $sheet->getStyle('A')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Căn giữa số trong cột C
        $sheet->getStyle('C')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->getStyle('B')->getAlignment()->setWrapText(true);

        return [];
    }
}
