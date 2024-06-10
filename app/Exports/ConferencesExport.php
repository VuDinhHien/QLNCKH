<?php

namespace App\Exports;

use App\Models\Conference;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class ConferencesExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
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
            $conference->id,
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
            'cơ quan',
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
}
