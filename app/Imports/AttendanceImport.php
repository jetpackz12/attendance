<?php

namespace App\Imports;

use App\Models\Attendance;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithStartRow;

class AttendanceImport implements ToModel, WithStartRow, WithCalculatedFormulas
{
    public function startRow(): int
    {
        return 6;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Attendance([
            'name' => $row['1'],
            'address' => $row['2'],
            'date' => $row['3'],
            'time_in_1'  => is_numeric($row[4]) ? Date::excelToDateTimeObject($row[4])->format('h:i:s A') : $row[4],
            'time_out_1' => is_numeric($row[5]) ? Date::excelToDateTimeObject($row[5])->format('h:i:s A') : $row[5],
            'time_in_2'  => is_numeric($row[6]) ? Date::excelToDateTimeObject($row[6])->format('h:i:s A') : $row[6],
            'time_out_2' => is_numeric($row[7]) ? Date::excelToDateTimeObject($row[7])->format('h:i:s A') : $row[7],
            'late_time' => $row['8'],
            'total' => $row['9'],
            'remarks' => $row['10'],
        ]);
    }
}
