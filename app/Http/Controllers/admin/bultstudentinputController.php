<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Imports\StudentsImport;
use App\Models\student;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class bultstudentinputController extends Controller
{
    public function bulk()
    {
        return view('backend.Page.inputstudent');
    }

    public function importExcel(Request $request)
    {
        $request->validate([
            'academic_year' => 'required|integer|between:2025,2050',
            'excel_file' => 'required|file|mimes:xlsx,xls|max:5120',
        ]);

        try {
            Excel::import(new StudentsImport($request->academic_year), $request->file('excel_file'));

            return back()->with('success', 'Student data imported successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong while importing data.');
        }
    }
    public function downloadDemo()
    {
        $filePath = public_path('demo/demo_students.xlsx'); // ফাইলের লোকেশন
        $fileName = 'demo_students.xlsx';

        return response()->download($filePath, $fileName);
    }
    public function list(Request $request)
    {
        $currentYear = date('Y'); // বর্তমান বছর

        $query = student::where('academic_year', $currentYear);

        // যদি সার্চ ভ্যালু থাকে
        if ($request->has('search') && $request->search != '') {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('student_id', 'like', '%' . $request->search . '%')
                    ->orWhere('roll_no', 'like', '%' . $request->search . '%')
                    ->orWhere('father_name', 'like', '%' . $request->search . '%')
                    ->orWhere('mother_name', 'like', '%' . $request->search . '%')
                    ->orWhere('mobile_no', 'like', '%' . $request->search . '%');
            });
        }

        // প্রতি পেইজে কত দেখাবে (default 10)
        $perPage = $request->get('per_page', 10);

        $students = $query->orderBy('id', 'desc')->paginate($perPage);

        return view('backend.Page.studentlist', compact('students'));
    }
    public function delete(Request $request, $id){
        // return $id;
        $delete = student::where('id', $id)->delete();
        if($delete){
            return back()->with('success', 'Student data Delete successfully!');
        }
    }
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $student->update([
            'student_id'   => $request->student_id,
            'name'         => $request->name,
            'section'      => $request->section,
            'roll_no'      => $request->roll_no,
            'father_name'  => $request->father_name,
            'mother_name'  => $request->mother_name,
            'mobile_no'    => $request->mobile_no,
        ]);

        return redirect()->back()->with('success', 'Student updated successfully!');
    }
}
