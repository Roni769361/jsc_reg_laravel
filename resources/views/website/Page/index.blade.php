@extends('website.Layout.master')

@section('content')
<!-- Application Notice -->
<div class="container">
    <div class="application-notice shadow-sm">
        <p class="mb-0">📅 <strong>আবেদন শুরু:</strong> ১ সেপ্টেম্বর ২০২৫ &nbsp; | &nbsp; ⏳ <strong>আবেদন শেষ:</strong> ২০
            সেপ্টেম্বর ২০২৫</p>
    </div>
</div>

<!-- Notice Section -->
<div id="notice" class="container">
    <div class="notice-board shadow mt-4">
        <h3 class="text-danger">📢 দৃষ্টি আকর্ষণ</h3>
        <p>
            ৬ষ্ঠ শ্রেণির রেজিষ্ট্রেশন তথ্য মতে উক্ত রেজিষ্ট্রেশন তথ্য ফরম পূরণ
            করতে হবে।
        </p>
        <p>
            উল্লেখ্য থাকে যে, রেজিঃ বিষয়ে বিভিন্ন নোটিশ বিদ্যালয়ের ওয়েবসাইটে প্রকাশ করা হবে, তাই নিয়মিত বিদ্যালয়ের ওয়েবসাইট
            ভিজিট করার জন্য নির্দেশ দেয়া যাচ্ছে।
        </p>
    </div>
</div>

<!-- Important Links -->
<div id="links" class="container text-center mt-5">
    <h2 class="mb-4">🔗 জরুরী লিংক</h2>
    <div class="row">
        <div class="col-md-4 mb-3">
            <a href="{{url('/reg')}}" class="btn btn-primary w-100 btn-custom">রেজিষ্ট্রেশন করুন</a>
        </div>
        <div class="col-md-4 mb-3">
            <a href="#" class="btn btn-success w-100 btn-custom">আবেদন কপি ডাউনলোড</a>
        </div>
        <div class="col-md-4 mb-3">
            <button type="button" class="btn btn-warning w-100 btn-custom" data-bs-toggle="modal" data-bs-target="#searchModal">
                স্টুডেন্ট আইডি খুঁজুন
            </button>
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

    </div>
</div>

<!-- FAQ Section -->
<div id="faq" class="container faq-section mt-5">
    <h2 class="text-center mb-4">❓ প্রায়শই জিজ্ঞাসিত প্রশ্ন</h2>
    <div class="accordion" id="faqAccordion">
        <div class="accordion-item">
            <h2 class="accordion-header" id="q1">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#a1">
                    আমি কীভাবে রেজিস্ট্রেশন করবো?
                </button>
            </h2>
            <div id="a1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    রেজিস্ট্রেশন করতে উপরে থাকা "রেজিষ্ট্রেশন করুন" বাটনে ক্লিক করুন এবং প্রয়োজনীয় তথ্য পূরণ করুন।
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="q2">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#a2">
                    ভুল তথ্য দিলে কী হবে?
                </button>
            </h2>
            <div id="a2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    ভুল তথ্য দিলে তা সব একাডেমিক সার্টিফিকেটে প্রতিফলিত হবে। তাই তথ্য অবশ্যই সঠিকভাবে প্রদান করুন।
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="q3">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#a3">
                    আমি কীভাবে আবেদন কপি পাবো?
                </button>
            </h2>
            <div id="a3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    আবেদন করার পর "আবেদন কপি ডাউনলোড" বাটন থেকে আপনার আবেদন কপি ডাউনলোড করতে পারবেন।
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Photo Schedule Section -->
<div id="photo-schedule" class="container mt-5">
    <h2 class="text-center mb-4">📷 ছবি তোলার সিডিউল</h2>

    <div class="alert alert-danger text-center fw-bold" role="alert">
        সকল শিক্ষার্থীকে নির্ধারিত দিনে ইউনিফর্ম পরিধান করে উপস্থিত হতে হবে। অনুপস্থিত শিক্ষার্থীর জন্য পুনরায় ছবি তোলা হবে না।
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center align-middle">
            <thead class="table-primary">
                <tr>
                    <th>শ্রেণি</th>
                    <th>তারিখ</th>
                    <th>সময়</th>
                    <th>স্থান</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>৬ষ্ঠ শ্রেণি (ক)</td>
                    <td>১০ সেপ্টেম্বর ২০২৫</td>
                    <td>সকাল ৯:০০ - ১০:০০</td>
                    <td>বিদ্যালয় মিলনায়তন</td>
                </tr>
                <tr>
                    <td>৬ষ্ঠ শ্রেণি (খ)</td>
                    <td>১১ সেপ্টেম্বর ২০২৫</td>
                    <td>সকাল ৯:০০ - ১০:০০</td>
                    <td>বিদ্যালয় মিলনায়তন</td>
                </tr>
                <tr>
                    <td>৬ষ্ঠ শ্রেণি (গ)</td>
                    <td>১২ সেপ্টেম্বর ২০২৫</td>
                    <td>সকাল ৯:০০ - ১০:০০</td>
                    <td>বিদ্যালয় মিলনায়তন</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Emergency Contact Section -->
<div id="contact" class="container mt-5">
    <h2 class="text-center mb-4">📞 জরুরী যোগাযোগ</h2>
    <div class="row justify-content-center">
        <!-- Contact 1 -->
        <div class="col-md-5 mb-3">
            <div class="card shadow h-100">
                <div class="row g-0 align-items-center">
                    <div class="col-4">
                        <img src="{{asset('contact_img/hm.jpg')}}" class="img-fluid rounded-start" alt="Contact 1">
                    </div>
                    <div class="col-8">
                        <div class="card-body">
                            <h5 class="card-title">জনাব নুরুল আখের</h5>
                            <p class="card-text mb-1">প্রধান শিক্ষক</p>
                            <p class="card-text mb-0">📞 ০১৮১৭৭৭৭৬৩০</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact 2 -->
        <div class="col-md-5 mb-3">
            <div class="card shadow h-100">
                <div class="row g-0 align-items-center">
                    <div class="col-4">
                        <img src="{{asset('contact_img/ict.jpg')}}" class="img-fluid rounded-start" alt="Contact 2">
                    </div>
                    <div class="col-8">
                        <div class="card-body">
                            <h5 class="card-title">জনাব রনি কান্তি নাথ</h5>
                            <p class="card-text mb-1">সহকারী শিক্ষক (আইসিটি)</p>
                            <p class="card-text mb-0">📞 ০১৮৬৪৭৬৯৩৬১</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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


@endsection()