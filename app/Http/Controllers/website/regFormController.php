<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Devfaysal\BangladeshGeocode\Models\Division;
use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Upazila;

class regFormController extends Controller
{
    public function index()
    {
        // Division এর ইংরেজি নাম নিয়ে আসা
        $divisions = Division::select('id', 'name as name')->get();
        return view('website.Page.regForm', compact('divisions'));
    }

    public function getDistricts($division_id)
    {
        // District এর ইংরেজি নাম
        $districts = District::where('division_id', $division_id)
            ->select('id', 'name as name')
            ->get();
        return response()->json($districts);
    }

    public function getUpazilas($district_id)
    {
        // Upazila এর ইংরেজি নাম
        $upazilas = Upazila::where('district_id', $district_id)
            ->select('id', 'name as name')
            ->get();
        return response()->json($upazilas);
    }

    public function store(Request $request)
    {
        return $request;
        // Step 1: ইনপুট থেকে তারিখ বানানো
        $birthDate = $request->birth_year . '-' . str_pad($request->birth_month, 2, '0', STR_PAD_LEFT) . '-' . str_pad($request->birth_day, 2, '0', STR_PAD_LEFT);
        $birthDateCarbon = \Carbon\Carbon::parse($birthDate);

        // Step 2: চেক করার জন্য ক্যালকুলেশন (১লা জানুয়ারি ধরা হবে)
        $currentYear = date('Y');
        $checkDate = \Carbon\Carbon::create($currentYear, 1, 1); // ১ জানুয়ারি

        $age = $birthDateCarbon->diffInYears($checkDate);

        // Step 3: বয়স চেক করা
        if ($age < 11 || $age > 15) {
            return redirect()->back()->with('error', 'বয়স অবশ্যই ১১ থেকে ১৫ বছরের মধ্যে হতে হবে (১ জানুয়ারি অনুযায়ী)।');
        }

        // Step 4: ডাটাবেজে সেভ করা
        $student = new Student(); // আপনার মডেল দিন
        $student->birth_date = $birthDate;
        $student->save();

        return redirect()->back()->with('success', 'ডাটা সফলভাবে সংরক্ষণ করা হয়েছে।');
    }
}
