@extends('website.Layout.master')

@section('content')

<div class="container my-4">
    <form action="{{url('/student/store')}}" method="POST" enctype="multipart/form-data" id="studentForm">
        @csrf

        <!-- Academic Info -->
        <fieldset class="border p-3 mb-4 rounded">
            <legend class="float-none w-auto px-3 text-primary fw-bold">Academic Information</legend>
            <div class="row g-3">
                <div class="col-md-3">
                    <label class="form-label">
                        300 Tk Payment Slip No
                        <a href="#" class="ms-2 small text-primary"
                            data-bs-toggle="modal" data-bs-target="#paymentSlipModal">
                            (নমুনা)
                        </a>
                    </label>
                    <input type="text" name="payment_slip_no" class="form-control">
                </div>

                <!-- Modal -->
                <div class="modal fade" id="paymentSlipModal" tabindex="-1" aria-labelledby="paymentSlipModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header py-2">
                                <h5 class="modal-title" id="paymentSlipModalLabel">Payment Slip নমুনা</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-2">
                                <img src="{{ asset('demo/200TkPaymentSlip.jpg') }}" alt="Payment Slip Sample" class="img-fluid rounded">
                            </div>
                            <div class="modal-footer py-2">
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Student ID
                        <a href="#" class="ms-2 small text-primary"
                            data-bs-toggle="modal" data-bs-target="#searchModal">
                            (স্টুডেন্ট আইডি খুঁজুন)
                        </a>
                    </label>
                    <input type="text" name="student_id" class="form-control" required>


                </div>
                <div class="col-md-3">
                    <label class="form-label">Class Roll</label>
                    <input type="text" name="class_roll" class="form-control">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Section</label>
                    <select name="section" class="form-select">
                        <option disabled selected>Select Section</option>
                        <option>A1</option>
                        <option>A2</option>
                        <option>B1</option>
                        <option>B2</option>
                    </select>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-md-3">
                    <label class="form-label">Class 6 Reg. Card Registration No.</label>
                    <input type="text" name="six_Reg_no" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Class 6 Reg. Card Roll No.</label>
                    <input type="text" name="six_Roll_no" class="form-control" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Board</label>
                    <select name="board" class="form-select">
                        <option disabled selected>Select Section</option>
                        <option>Dhaka</option>
                        <option>Rajshahi</option>
                        <option>Comilla</option>
                        <option>Jessore</option>
                        <option>Chittagong</option>
                        <option>Barisal</option>
                        <option>Sylhet </option>
                        <option>Madrasah </option>
                        <option>Technical </option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Passing Year</label>
                    <select name="passing_year" class="form-select">
                        <option disabled selected>Select Section</option>
                        <option>2023</option>
                    </select>
                </div>
            </div>
        </fieldset>

        <!-- Student Info -->
        <fieldset class="border p-3 mb-4 rounded">
            <legend class="float-none w-auto px-3 text-info fw-bold">Student Information</legend>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Student's Name English</label>
                    <input type="text" name="name_en" class="form-control english-only" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Student's Name Bangla</label>
                    <input type="text" name="name_bn" class="form-control bangla-only">
                </div>

                <div class="col-md-5">
                    <label class="form-label">Birth Registration No.</label>
                    <input type="text" name="birth_reg_no" class="form-control" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Birth Date</label>
                    <div class="row g-2">
                        <div class="col-4">
                            <select class="form-select" name="birth_day" required>
                                <option disabled selected>Day</option>
                                @for ($d=1;$d<=31;$d++)
                                    <option value="{{ $d }}">{{ $d }}</option>
                                    @endfor
                            </select>
                        </div>
                        <div class="col-4">
                            <select class="form-select" name="birth_month" required>
                                <option disabled selected>Month</option>
                                @foreach (['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'] as $index => $m)
                                <option value="{{ $index+1 }}">{{ $m }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <select class="form-select" name="birth_year" required>
                                <option disabled selected>Year</option>
                                @php
                                $currentYear = date('Y');
                                $minYear = $currentYear - 15; // সর্বোচ্চ বয়স
                                $maxYear = $currentYear - 11; // নূন্যতম বয়স
                                @endphp
                                @for ($y=$minYear;$y<=$maxYear;$y++)
                                    <option value="{{ $y }}">{{ $y }}</option>
                                    @endfor
                            </select>
                        </div>
                    </div>
                </div>


                <div class="col-md-2">
                    <label class="form-label">Gender</label>
                    <select class="form-select" name="gender" required>
                        <option selected disabled>Select Gender</option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Other</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Religion</label>
                    <select class="form-select" name="religion">
                        <option selected disabled>Select Religion</option>
                        <option>Islam</option>
                        <option>Hindu</option>
                        <option>Buddhist</option>
                        <option>Christian</option>
                        <option>Other</option>
                    </select>
                </div>

                <!-- Father's Info -->
                <div class="col-md-6"> <label class="form-label">Father's Name English</label> <input type="text" class="form-control english-only" name="father_name_en"> </div>
                <div class="col-md-6"> <label class="form-label">Father's Name Bangla</label> <input type="text" class="form-control bangla-only" name="father_name_bn"> </div>
                <div class="col-md-6"> <label class="form-label">Father's NID No.</label> <input type="text" class="form-control english-only" name="father_nid"> </div>
                <div class="col-md-6"> <label class="form-label">Father's Birth Date</label> <input type="date" class="form-control" name="father_birth_date"> </div> <!-- Mother's Info -->
                <div class="col-md-6"> <label class="form-label">Mother's Name English</label> <input type="text" class="form-control english-only" name="mother_name_en"> </div>
                <div class="col-md-6"> <label class="form-label">Mother's Name Bangla</label> <input type="text" class="form-control bangla-only" name="mother_name_bn"> </div>
                <div class="col-md-6"> <label class="form-label">Mother's NID No.</label> <input type="text" class="form-control english-only" name="mother_nid"> </div>
                <div class="col-md-6"> <label class="form-label">Mother's Birth Date</label> <input type="date" class="form-control" name="mother_birth_date"> </div> <!-- Address & Phone -->
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Division</label>
                        <select id="division" class="form-select" name="division" required>
                            <option selected disabled>Select Division</option>
                            @foreach($divisions as $division)
                            <option value="{{ $division->id }}">{{ $division->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">District</label>
                        <select id="district" class="form-select" name="district" required>
                            <option selected disabled>Select District</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Upazila</label>
                        <select id="upazila" class="form-select" name="upazila" required>
                            <option selected disabled>Select Upazila</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12"> <label class="form-label">Full Address English</label> <textarea class="form-control english-only" rows="2" name="address"></textarea> </div>


                <div class="col-md-6"> <label class="form-label">Phone No.</label> <input type="text" class="form-control" name="phone"> </div>
                <div class="col-md-6">
                    <label class="form-label">Class 6 Registration Card Upload</label>
                    <input type="file" name="reg_card" id="reg_card" class="form-control" accept=".jpg,.jpeg,.png" required>
                </div>
            </div>
            <div class="form-check mt-4"> <input class="form-check-input" type="checkbox" id="agreeCheck" required> <label class="form-check-label text-danger fw-bold" for="agreeCheck"> উপরোক্ত প্রদত্ত সকল তথ্য সঠিক এবং বিদ্যালয়ের একাডেমিক কাগজপত্রে ভুল তথ্য প্রদান হলে তার সম্পূর্ণ দায়ভার আমি বহন করব। </label> </div>
        </fieldset>

        <div class="text-center">
            <button class="btn btn-success px-5">Submit</button>
        </div>
    </form>
</div>




<!-- Search Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable"> <!-- scrollable for mobile -->
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="searchModalLabel">স্টুডেন্ট সার্চ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <!-- Search Form -->
                <form id="searchStudentForm">
                    @csrf
                    <div class="row g-2">
                        <div class="col-12 col-md-6">
                            <label>Section</label>
                            <select name="section" id="search_section" class="form-control">
                                <option value="">Select Section</option>
                                <option value="A1">A1</option>
                                <option value="A2">A2</option>
                                <option value="B1">B1</option>
                                <option value="B2">B2</option>
                                <!-- অন্যান্য Section গুলো এখানে যোগ করুন -->
                            </select>
                        </div>
                        <div class="col-12 col-md-6">
                            <label>Roll No</label>
                            <input type="text" name="roll_no" id="search_roll" class="form-control" placeholder="Enter Roll No">
                        </div>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary w-100 w-md-auto">Search</button>
                    </div>
                </form>

                <!-- Search Result Table -->
                <div class="mt-3 table-responsive">
                    <table class="table table-bordered table-striped mb-0" id="searchResult">
                        <!-- Ajax দ্বারা এখানে ডাটা লোড হবে -->
                    </table>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary w-100 w-md-auto" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<!-- Script for Validation -->
<script>
    // শুধুমাত্র ইংরেজি ইনপুট
    document.querySelectorAll('.english-only').forEach(input => {
        input.addEventListener('input', function() {
            this.value = this.value.replace(/[^A-Za-z\s]/g, '');
        });
    });

    // শুধুমাত্র বাংলা ইনপুট
    document.querySelectorAll('.bangla-only').forEach(input => {
        input.addEventListener('input', function() {
            this.value = this.value.replace(/[^ঀ-৿\s]/g, '');
        });
    });

    // ফাইল সাইজ চেক (২ MB Max)
    document.getElementById('reg_card').addEventListener('change', function() {
        const file = this.files[0];
        if (file && file.size > 2 * 1024 * 1024) {
            alert('⚠️ ফাইল সাইজ সর্বোচ্চ ২ এমবি হতে হবে!');
            this.value = ''; // Reset file input
        }
    });
</script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {

        // Division -> District load
        $('#division').on('change', function() {
            var division_id = $(this).val();
            if (division_id) {
                $.ajax({
                    url: '/get-districts/' + division_id,
                    type: 'GET',
                    success: function(data) {
                        $('#district').empty().append('<option selected disabled>Select District</option>');
                        $('#upazila').empty().append('<option selected disabled>Select Upazila</option>');
                        $.each(data, function(key, district) {
                            $('#district').append('<option value="' + district.id + '">' + district.name + '</option>');
                        });
                    }
                });
            }
        });

        // District -> Upazila load
        $('#district').on('change', function() {
            var district_id = $(this).val();
            if (district_id) {
                $.ajax({
                    url: '/get-upazilas/' + district_id,
                    type: 'GET',
                    success: function(data) {
                        $('#upazila').empty().append('<option selected disabled>Select Upazila</option>');
                        $.each(data, function(key, upazila) {
                            $('#upazila').append('<option value="' + upazila.id + '">' + upazila.name + '</option>');
                        });
                    }
                });
            }
        });

    });
</script>



<script>
    document.addEventListener("DOMContentLoaded", function() {

        const form = document.getElementById('searchStudentForm');
        const resultDiv = document.getElementById('searchResult');

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            let section = document.getElementById('search_section').value;
            let roll = document.getElementById('search_roll').value;

            fetch("{{ route('students.search') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        section: section,
                        roll_no: roll
                    })
                })
                .then(response => response.json())
                .then(data => {
                    let html = `
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Section</th>
                        <th>Roll No</th>
                        <th>Father's Name</th>
                        <th>Mother's Name</th>
                        <th>Phone</th>
                    </tr>
                </thead>
                <tbody>
            `;

                    if (data.length > 0) {
                        data.forEach((student, index) => {
                            html += `
                        <tr>
                            <td>${index+1}</td>
                            <td><span class="badge bg-warning text-dark">${student.student_id}</span></td>
                            <td>${student.name}</td>
                            <td>${student.section}</td>
                            <td>${student.roll_no}</td>
                            <td>${student.father_name}</td>
                            <td>${student.mother_name}</td>
                            <td>${student.mobile_no}</td>
                        </tr>
                    `;
                        });
                    } else {
                        html += `<tr><td colspan="6" class="text-center">No students found</td></tr>`;
                    }

                    html += `</tbody>`;
                    resultDiv.innerHTML = html;
                })
                .catch(error => console.error(error));
        });

    });
</script>


@endsection