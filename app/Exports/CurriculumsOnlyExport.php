<?php

namespace App\Exports;

use PhpOffice\PhpSpreadsheet\Style\Alignment;
use App\Models\Curriculum;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CurriculumsOnlyExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    private $rowNumber = 1; // Biến đếm hàng

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Lọc dữ liệu chỉ chứa giáo trình
        return Curriculum::with(['scientists', 'book' , 'training'])
                         ->where('book_id', '1')
                         ->get();
    }

    public function map($curriculum): array
    {
        $scientistsRoles = $curriculum->scientists->map(function ($scientist) {
            $roleName = \App\Models\Role::find($scientist->pivot->role_id)->role_name;
            return "{$scientist->profile_name} ({$roleName})";
        })->implode('; ');

        return [
            $this->rowNumber++, 
            $curriculum->name,
            $curriculum->year,
            $curriculum->publisher,
            $curriculum->book->book_name,
            $curriculum->training->training_name,
            $scientistsRoles,
        ];
    }

    public function headings(): array
    {
        return [
            'STT',
            'Tên giáo trình',
            'Năm XB',
            'Nhà XB',
            'Loại sách',
            'Trình độ đào tạo',
            'Cán bộ tham gia(vai trò)',
        ];
    }

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

        // Thiết lập độ rộng cho cột
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setWidth(80);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setWidth(40);
        $sheet->getColumnDimension('E')->setWidth(40);
        $sheet->getColumnDimension('F')->setWidth(40);
        $sheet->getColumnDimension('G')->setWidth(60);

        // Căn giữa số trong các cột
        $sheet->getStyle('A')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('C')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('D')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('E')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('F')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->getStyle('B')->getAlignment()->setWrapText(true);
        $sheet->getStyle('H')->getAlignment()->setWrapText(true);

        return [];
    }
}
