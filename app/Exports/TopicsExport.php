<?php

namespace App\Exports;


use App\Models\Topic;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;


class TopicsExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    private $rowNumber = 1; // Biến đếm hàng

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Topic::with(['scientists', 'lvtopic'])->get();
    }

    /**
     * Định dạng dữ liệu cho từng hàng
     */
    public function map($topic): array
    {
        $scientistsRoles = $topic->scientists->map(function ($scientist) {
            $roleName = \App\Models\Role::find($scientist->pivot->role_id)->role_name;
            return "{$scientist->profile_name} ({$roleName})";
        })->implode('; ');

        return [
            $this->rowNumber++,
            $topic->topic_name,
            $topic->result,
            $topic->lvtopic->lvtopic_name, // Hiển thị tên cấp đề tài thay vì ID
            $topic->start_date,
            $topic->end_date,
            $scientistsRoles,
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
            'Kết quả nghiệm thu',
            'Cấp đề tài/đề án',
            'Ngày bắt đầu',
            'Ngày kết thúc',
            'Cán bộ tham gia(vai trò)',
        ];
    }

    /**
     * Áp dụng kiểu cho bảng tính
     */
    public function styles(Worksheet $sheet)
    {
        // Làm đậm và đổi nền màu vàng cho hàng đầu tiên
        $sheet->getStyle('1')->applyFromArray([
            'font' => ['bold' => true],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['argb' => 'FFFF00'],
            ],
        ]);

        // Thiết lập độ rộng cho cột
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setWidth(80); // Độ rộng cụ thể cho cột B
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setWidth(30);
        $sheet->getColumnDimension('E')->setWidth(30);
        $sheet->getColumnDimension('F')->setWidth(30);
        $sheet->getColumnDimension('G')->setWidth(50);

        // Căn giữa số trong cột
        $sheet->getStyle('A')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('C')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('D')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('E')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('F')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Thiết lập wrap text cho các cột cần thiết
        $sheet->getStyle('B')->getAlignment()->setWrapText(true);
        $sheet->getStyle('G')->getAlignment()->setWrapText(true);

        return [];
    }
}