<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\Exportable;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class CombinedCurriculumsExport implements WithEvents
{
    use Exportable;

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // Lấy dữ liệu cho giáo trình và sách tham khảo
                $curriculums = \App\Models\Curriculum::with(['scientists', 'book', 'training'])->get();
                $trainingCurriculums = $curriculums->where('book_id', 1);
                $referenceBooks = $curriculums->where('book_id', 2);

                // Bắt đầu từ hàng đầu tiên
                $startRow = 1;

                // Ghi tiêu đề cho phần I: Thống kê theo giáo trình
                $sheet->setCellValue('A' . $startRow, 'I: Thống kê theo giáo trình');
                $sheet->mergeCells('A' . $startRow . ':G' . $startRow); // Gộp các ô từ A đến G
                $sheet->getStyle('A' . $startRow)->getFont()->setBold(true);
                $sheet->getStyle('A' . $startRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
                $startRow++;

                // Ghi tiêu đề cho bảng giáo trình
                $sheet->fromArray(['STT', 'Tên giáo trình', 'Năm XB', 'Nhà XB', 'Loại sách', 'Trình độ đào tạo', 'Cán bộ tham gia(vai trò)'], null, 'A' . $startRow);
                $sheet->getStyle('A' . $startRow . ':G' . $startRow)->applyFromArray([
                    'font' => ['bold' => true],
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => ['argb' => 'FFFF00'],
                    ],
                ]);
                $startRow++;

                // Ghi dữ liệu cho giáo trình
                $rowNumber = 1;
                foreach ($trainingCurriculums as $curriculum) {
                    $scientistsRoles = $curriculum->scientists->map(function ($scientist) {
                        $roleName = \App\Models\Role::find($scientist->pivot->role_id)->role_name;
                        return "{$scientist->profile_name} ({$roleName})";
                    })->implode('; ');

                    $sheet->fromArray([
                        $rowNumber++,
                        $curriculum->name,
                        $curriculum->year,
                        $curriculum->publisher,
                        $curriculum->book->book_name,
                        $curriculum->training->training_name,
                        $scientistsRoles,
                    ], null, 'A' . $startRow);

                    $startRow++;
                }

                // Thêm khoảng trống giữa hai bảng
                $startRow += 2;

                // Ghi tiêu đề cho phần II: Thống kê theo sách tham khảo
                $sheet->setCellValue('A' . $startRow, 'II: Thống kê theo sách tham khảo');
                $sheet->mergeCells('A' . $startRow . ':G' . $startRow); // Gộp các ô từ A đến G
                $sheet->getStyle('A' . $startRow)->getFont()->setBold(true);
                $sheet->getStyle('A' . $startRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
                $startRow++;

                // Ghi tiêu đề cho bảng sách tham khảo
                $sheet->fromArray(['STT', 'Tên sách tham khảo', 'Năm XB', 'Nhà XB', 'Loại sách', 'Trình độ đào tạo', 'Cán bộ tham gia(vai trò)'], null, 'A' . $startRow);
                $sheet->getStyle('A' . $startRow . ':G' . $startRow)->applyFromArray([
                    'font' => ['bold' => true],
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => ['argb' => 'FFFF00'],
                    ],
                ]);
                $startRow++;

                // Ghi dữ liệu cho sách tham khảo
                $rowNumber = 1;
                foreach ($referenceBooks as $curriculum) {
                    $scientistsRoles = $curriculum->scientists->map(function ($scientist) {
                        $roleName = \App\Models\Role::find($scientist->pivot->role_id)->role_name;
                        return "{$scientist->profile_name} ({$roleName})";
                    })->implode('; ');

                    $sheet->fromArray([
                        $rowNumber++,
                        $curriculum->name,
                        $curriculum->year,
                        $curriculum->publisher,
                        $curriculum->book->book_name,
                        $curriculum->training->training_name,
                        $scientistsRoles,
                    ], null, 'A' . $startRow);

                    $startRow++;
                }

                // Lặp qua các cột từ A đến G
                foreach (range('A', 'G') as $column) {
                    // Định nghĩa độ rộng của cột
                    // Ví dụ: đặt độ rộng cột A là 20
                    if ($column === 'A') {
                        $sheet->getColumnDimension($column)->setWidth(10);
                    }  elseif ($column === 'C') {
                        // Ví dụ: đặt độ rộng cột C là 30
                        $sheet->getColumnDimension($column)->setWidth(30);
                    } elseif ($column === 'G'){
                        $sheet->getColumnDimension($column)->setWidth(50);
                    }
                     else {
                        // Đối với các cột còn lại (D, E, F, G), bạn có thể đặt độ rộng khác tùy ý
                        $sheet->getColumnDimension($column)->setWidth(25); // Ví dụ: đặt độ rộng là 25 cho các cột còn lại
                    }
                }

                // Thiết lập độ rộng cho cột B nhỏ hơn và cho phép xuống dòng
                $sheet->getColumnDimension('B')->setWidth(80);
                $sheet->getStyle('B1:B' . $startRow)->getAlignment()->setWrapText(true);

                // Căn chỉnh cột
                $sheet->getStyle('A1:G' . $startRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle('B2:B' . $startRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
            },
        ];
    }
}
