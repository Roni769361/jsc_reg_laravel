@extends('backend.Layout.master')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Student List</h4>

                    <!-- Search + Per Page Form -->
                    <form action="{{ route('students.list') }}" method="GET" class="d-flex">
                        <input type="text" name="search" value="{{ request('search') }}"
                            class="form-control form-control-sm me-2 text-white"
                            placeholder="Search student...">

                        <select name="per_page" class="form-select form-select-sm me-2 text-white" onchange="this.form.submit()">
                            <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                            <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                            <option value="500" {{ request('per_page') == 500 ? 'selected' : '' }}>500</option>
                            <option value="1000" {{ request('per_page') == 1000 ? 'selected' : '' }}>1000</option>
                        </select>

                        <button type="submit" class="btn btn-light btn-sm">Search</button>
                    </form>
                </div>


                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Student ID</th>
                                <th>Name</th>
                                <th>Section</th>
                                <th>Roll</th>
                                <th>Father's Name</th>
                                <th>Mother's Name</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($students as $key => $student)
                            <tr>
                                <td>{{ $students->firstItem() + $key }}</td>
                                <td>{{ $student->student_id }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->section }}</td>
                                <td>{{ $student->roll_no }}</td>
                                <td>{{ $student->father_name }}</td>
                                <td>{{ $student->mother_name }}</td>
                                <td>{{ $student->mobile_no }}</td>
                                <td>
                                    <!-- Edit Button -->
                                    <button type="button"
                                        class="btn btn-sm btn-info"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editModal{{ $student->id }}">
                                        Edit
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="editModal{{ $student->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $student->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <form method="POST" action="{{ url('admin/student/update', $student->id) }}">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel{{ $student->id }}">Edit Student</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label>Student ID</label>
                                                            <input type="text" name="student_id" value="{{ $student->student_id }}" class="form-control">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label>Name</label>
                                                            <input type="text" name="name" value="{{ $student->name }}" class="form-control">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label>Section</label>
                                                            <input type="text" name="section" value="{{ $student->section }}" class="form-control">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label>Roll No</label>
                                                            <input type="text" name="roll_no" value="{{ $student->roll_no }}" class="form-control">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label>Father Name</label>
                                                            <input type="text" name="father_name" value="{{ $student->father_name }}" class="form-control">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label>Mother Name</label>
                                                            <input type="text" name="mother_name" value="{{ $student->mother_name }}" class="form-control">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label>Mobile No</label>
                                                            <input type="text" name="mobile_no" value="{{ $student->mobile_no }}" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ url('admin/student/delete/' . $student->id) }}"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this student?')">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="text-center">No students found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center">
                        {{ $students->appends(request()->query())->links('pagination::bootstrap-5') }}
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection