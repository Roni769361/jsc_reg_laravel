@extends('backend.Layout.master')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Upload Student Excel</h4>
                </div>
                <div class="card-body">

                    <!-- Demo Download Button -->
                    <div class="mb-4 text-end">
                        <a href="{{ route('download.demo') }}" class="btn btn-success">
                            <i class="bi bi-download"></i> Download Demo Excel
                        </a>
                    </div>

                    <!-- Form Start -->
                    <form action="{{url('admin/import-excel')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Academic Year Dropdown -->
                        <div class="mb-3">
                            <label for="academicYear" class="form-label fw-semibold">Academic Year</label>
                            <select id="academicYear" name="academic_year" class="form-select" required>
                                <option value="">-- Select Year --</option>
                                @for($year = 2025; $year <= 2050; $year++)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                            </select>
                        </div>

                        <!-- Excel File Input -->
                        <div class="mb-3">
                            <label for="excelFile" class="form-label fw-semibold">Upload Excel File</label>
                            <input
                                type="file"
                                id="excelFile"
                                name="excel_file"
                                class="form-control"
                                accept=".xlsx,.xls,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel"
                                required>
                            <div class="form-text">Only .xlsx or .xls files are allowed.</div>
                        </div>

                        <!-- Confirmation Checkbox -->
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="confirmCheck" required>
                            <label class="form-check-label fw-semibold" for="confirmCheck">
                                I confirm that the data is correct
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="bi bi-upload"></i> Upload Excel
                            </button>
                        </div>

                    </form>
                    <!-- Form End -->

                </div>
            </div>

        </div>
    </div>
</div>
@endsection