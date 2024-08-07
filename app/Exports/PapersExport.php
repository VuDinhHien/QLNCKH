<?php

namespace App\Exports;

use App\Models\Magazine;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PapersExport implements FromArray, WithTitle, WithHeadings, WithStyles, WithColumnWidths
{
    protected $magazines;
    protected $headerPositions = [];

    public function __construct()
    {
        $this->magazines = Magazine::with(['paper', 'scientists' => function($query) {
            $query->withPivot('role_id');
        }])->get()->groupBy('paper_id');
    }

    public function array(): array
    {
        $data = [];
        $counter = 1;
        $rowIndex = 1;
        
        foreach ($this->magazines as $paperId => $magazineGroup) {
            // Header row
            $rowHeader = [
                $this->intToRoman($counter) . ' ' . $magazineGroup->first()->paper->paper_name, '', '', ''
            ];
            $data[] = $rowHeader;
            $rowIndex++;

            // Column titles row
            $data[] = ['Tên bài báo', 'Năm', 'Loại bài báo', 'Tên cán bộ và vai trò'];
            $this->headerPositions[] = $rowIndex; // Lưu vị trí của tiêu đề
            $rowIndex++;
            
            foreach ($magazineGroup as $magazine) {
                $scientists = implode(', ', $magazine->scientists->map(function ($scientist) {
                    return $scientist->profile_name . ' (' . \App\Models\Role::find($scientist->pivot->role_id)->role_name . ')';
                })->toArray());
                $data[] = [$magazine->magazine_name, $magazine->year, $magazine->journal, $scientists];
                $rowIndex++;
            }

            // Add an empty row
            $data[] = ['', '', '', ''];
            $rowIndex++;
            $counter++;
        }
        return $data;
    }

    public function title(): string
    {
        return 'Magazines by Paper';
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
            $sheet->getStyle("A{$headerPosition}:D{$headerPosition}")->applyFromArray([
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
            'A' => 40,  // Tên bài báo
            'B' => 15,  // Năm
            'C' => 20,  // Loại bài báo
            'D' => 50,  // Tên cán bộ và vai trò
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
