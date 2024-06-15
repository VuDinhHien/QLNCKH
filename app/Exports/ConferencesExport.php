<?php

namespace App\Exports;

use App\Models\Conference;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Events\AfterSheet;


class ConferencesExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithEvents
{


    private $rowNumber = 1; // Biến đếm hàng

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Conference::with('seminar')->get();
    }

    public function map($conference): array
    {
        return [
            $this->rowNumber++, 
            $conference->conference_name,
            $conference->seminar->seminar_name,
            $conference->office,
            $conference->unit,
            $conference->money,
            $conference->status_name,
            $conference->date,
        ];
    }

    public function headings(): array
    {
        return [
            'STT',
            'Tên hội nghị/hội thảo',
            'Loại hội thảo',
            'Cơ quan',
            'Đơn vị',
            'Kinh phí',
            'Tên trạng thái',
            'Ngày thực hiện',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Làm đậm và đổi nền màu vàng cho hàng đầu tiên
            1 => [
                'font' => ['bold' => true],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['argb' => 'FFFF00'],
                ],
            ],
        ];
    }

    /**
     * Register the events for setting column widths and alignment
     *
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                // Thiết lập độ rộng của các cột
                $sheet->getStyle('A')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle('C')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle('H')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $sheet->getColumnDimension('B')->setWidth(100);
                $sheet->getColumnDimension('C')->setWidth(30);
                $sheet->getColumnDimension('H')->setWidth(30);
            },
        ];

       
    }
}
