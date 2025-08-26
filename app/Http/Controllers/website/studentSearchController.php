<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\student;
use Illuminate\Http\Request;

class studentSearchController extends Controller
{
    public function search(Request $request)
    {
        $query = Student::query();

        if ($request->section) {
            $query->where('section', $request->section);
        }

        if ($request->roll_no) {
            $query->where('roll_no', $request->roll_no);
        }

        $students = $query->get();

        return response()->json($students);
    }
}
