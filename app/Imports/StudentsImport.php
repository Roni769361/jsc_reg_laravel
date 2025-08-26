<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class StudentsImport implements ToModel, WithStartRow
{
    protected $academicYear;

    // Constructor দিয়ে academicYear পাঠানো হলো
    public function __construct($academicYear)
    {
        $this->academicYear = $academicYear;
    }

    // হেডার বাদ দিয়ে data শুরু হবে row-2 থেকে
    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        return new Student([
            'academic_year' => $this->academicYear,   // extra input
            'student_id'    => $row[0],
            'roll_no'       => $row[1],
            'section'       => $row[2],
            'name'          => $row[3],
            'gender'        => $row[4],
            'religion'      => $row[5],
            'father_name'   => $row[6],
            'mother_name'   => $row[7],
            'mobile_no'     => $row[8],
        ]);
    }
}
