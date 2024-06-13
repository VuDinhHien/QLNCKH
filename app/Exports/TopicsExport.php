<?php

namespace App\Exports;

use App\Models\Topic;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TopicsExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        
        return Topic::with('scientist', 'lvtopic')->get();
    }

    /**
     * Định dạng dữ liệu cho từng hàng
     */
    public function map($topic): array
    {
        return [
            $topic->id,
            $topic->topic_name,
            $topic->scientist->profile_name, // Hiển thị tên chủ nhiệm thay vì ID
            $topic->result,
            $topic->lvtopic->lvtopic_name, // Hiển thị tên cấp đề tài thay vì ID
            $topic->start_date,
            $topic->end_date,
        ];
    }

    /**
     * Đặt tiêu đề cho các cột
     */
    public function headings(): array
    {
        return [
            'STT',
            'Tên đề tài/đề án',
            'Chủ nhiệm',
            'Kết quả nghiệm thu',
            'Cấp đề tài/đề án',
            'Ngày bắt đầu',
            'Ngày kết thúc',
        ];
    }

    /**
     * Áp dụng kiểu cho bảng tính
     */
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
