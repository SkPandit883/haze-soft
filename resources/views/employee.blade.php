@extends('layouts.master')
@section('title', 'Employee')
@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">


        <!-- Basic Bootstrap Table -->
        <div class="card">

            <div class="modal fade" id="addProductModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel3">New Employee</h5>
                            <button type="button" class="text-gray-500 btn-close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <img src="https://img.icons8.com/material-outlined/44/000000/multiply--v1.png" />
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <form method="post" action="{{ route('employee.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label" for="basic-default-company">Company</label>
                                        <div class="col-sm-10">
                                            <select id="defaultSelect" name="company_id" class="form-select">
                                                @foreach ($companies as $company)
                                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label"
                                            for="basic-default-company">Department</label>
                                        <div class="grid grid-cols-2 col-sm-10">
                                            @foreach ($departments as $department)
                                                <div>
                                                    <input type="checkbox" id="vehicle1" name="department_id[]"
                                                        value="{{ $department->id }}">
                                                    <label for="vehicle2"> {{ $department->name }}</label><br>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name"> Employee
                                            Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name"
                                                id="basic-default-name" placeholder="Mr Shan" />
                                        </div>

                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name"> Employee
                                            Number</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="employee_number"
                                                id="basic-default-name" placeholder="Cyber Security" />
                                        </div>

                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name"> Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" name="email"
                                                id="basic-default-name" placeholder="test2 gmail" />
                                        </div>

                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name"> Contact</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="contact"
                                                id="basic-default-name" placeholder="9823123123" />
                                        </div>

                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name"> Designation</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="designation"
                                                id="basic-default-name" placeholder="Cyber Expert" />
                                        </div>

                                    </div>
                                    <div class="mt-5 modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>
                                        <button type="submit" class="btn btn-primary bg-[#696cff]">Save </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="flex flex-row items-center justify-between">
                <h5 class="card-header">List of Departments</h5>
                <button type="button" data-bs-toggle="modal" data-bs-target="#addProductModal"
                    class="btn btn-primary bg-[#696cff] mr-10">Add</button>
            </div>
            <!-- Session Status -->
            <x-auth-session-status class="mx-4 p-3 my-2 bg-green-50 border-[2px] rounded-md border-green-400"
                :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mx-4 p-3 my-2 bg-red-50 border-[2px] rounded-md border-red-400"
                :errors="$errors" />
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Employee Number</th>
                            <th>Email</th>
                            <th>Contact</th>
                            {{-- <th>Designation</th> --}}
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($employees as $employee)
                            <tr>
                                <td><strong>{{ $loop->index + 1 }}</strong></td>
                                <td class="capitalize"><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                    <strong>{{ $employee->name }}</strong>
                                </td>
                                <td>{{ $employee->employee_number }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->contact }}</td>
                                {{-- <td>{{ $employee->designation }}</td> --}}

                                <td class="flex">
                                    <button type="button " data-bs-toggle="modal"
                                        data-bs-target='#editEmployeeModal-{{ $employee->id }}'>
                                        <img
                                            src="https://img.icons8.com/external-kiranshastry-lineal-kiranshastry/27/646CFC/external-edit-interface-kiranshastry-lineal-kiranshastry.png" />
                                    </button>
                                    <form action="{{ route('employee.destroy', $employee->id) }}"
                                        id="employee-delete-{{ $employee->id }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="text-2xl text-red-500 m"
                                            onclick='deleteRow("employee-delete-{{ $employee->id }}")'>
                                            <img src="https://img.icons8.com/ios/26/FF1111/delete-forever--v1.png" />
                                        </button>
                                    </form>
                                    <div class="modal fade" id="editProductModal-{{ $employee->id }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel3">Edit Employee</h5>

                                                    <button type="button" class="text-gray-500 btn-close"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <img
                                                            src="https://img.icons8.com/material-outlined/44/000000/multiply--v1.png" />
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card-body">
                                                        <form method="post"
                                                            action="{{ route('department.update', $employee->id) }}"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            @method('patch')
                                                            <div class="mb-3 row">
                                                                <label class="col-sm-2 col-form-label"
                                                                    for="basic-default-company">Company</label>
                                                                <div class="col-sm-10">
                                                                    <select id="defaultSelect" name="company_id"
                                                                        class="form-select">
                                                                        @foreach ($companies as $company)
                                                                            <option value="{{ $company->id }}">
                                                                                {{ $company->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label class="col-sm-2 col-form-label"
                                                                    for="basic-default-company">Department</label>
                                                                <div class="col-sm-10">
                                                                    <select id="defaultSelect" name="department_id"
                                                                        class="form-select">
                                                                        @foreach ($companies as $company)
                                                                            <option value="{{ $company->id }}">
                                                                                {{ $company->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label class="col-sm-2 col-form-label"
                                                                    for="basic-default-name"> Employee
                                                                    Name</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        name="name" id="basic-default-name"
                                                                        placeholder="Cyber Security" />
                                                                </div>

                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label class="col-sm-2 col-form-label"
                                                                    for="basic-default-name"> Employee
                                                                    Number</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        name="employee_number" id="basic-default-name"
                                                                        placeholder="Cyber Security" />
                                                                </div>

                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label class="col-sm-2 col-form-label"
                                                                    for="basic-default-name"> Email</label>
                                                                <div class="col-sm-10">
                                                                    <input type="email" class="form-control"
                                                                        name="email" id="basic-default-name"
                                                                        placeholder="Cyber Security" />
                                                                </div>

                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label class="col-sm-2 col-form-label"
                                                                    for="basic-default-name"> Email</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        name="contact" id="basic-default-name"
                                                                        placeholder="Cyber Security" />
                                                                </div>

                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label class="col-sm-2 col-form-label"
                                                                    for="basic-default-name"> Email</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        name="designation" id="basic-default-name"
                                                                        placeholder="Cyber Security" />
                                                                </div>

                                                            </div>


                                                            <div class="mt-5 modal-footer">
                                                                <button type="button" class="btn btn-outline-secondary"
                                                                    data-bs-dismiss="modal">
                                                                    Close
                                                                </button>
                                                                <button type="submit"
                                                                    class="btn btn-primary bg-[#696cff]">Save </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                        @endforeach



                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
        <div class="m-3 ">
            {{ $employees->links() }}

        </div>
    </div>
@endsection
