@extends('layouts.master')
@section('title','Company')
@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">


        <!-- Basic Bootstrap Table -->
        <div class="card">

            <div class="modal fade" id="addProductModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel3">New Company</h5>
                            <button type="button" class="btn-close text-gray-500" data-bs-dismiss="modal"
                                aria-label="Close">
                                <img src="https://img.icons8.com/material-outlined/44/000000/multiply--v1.png" />
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <form method="post" action="{{ route('company.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name"> Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name"
                                                id="basic-default-name" placeholder="IT ZONE" />
                                        </div>

                                    </div>


                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-phone"> Location</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="location" id="basic-default-phone"
                                                class="form-control phone-mask" placeholder="Brt" aria-label="658 799 8941"
                                                aria-describedby="basic-default-phone" />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-message">Contact</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="basic-default-message" name="contact"
                                                class="form-control" aria-label="" placeholder="9832312332"
                                                aria-describedby="basic-icon-default-message2">
                                        </div>
                                    </div>

                                    <div class="modal-footer mt-5">
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
                <h5 class="card-header">List of Companies</h5>
                <button type="button" data-bs-toggle="modal" data-bs-target="#addProductModal"
                    class="btn btn-primary bg-[#696cff] mr-10">Add</button>
            </div>
            <!-- Session Status -->
            <x-auth-session-status class="mx-4 p-3 my-2 bg-green-50 border-[2px] rounded-md border-green-400" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mx-4 p-3 my-2 bg-red-50 border-[2px] rounded-md border-red-400" :errors="$errors" />
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Contact</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($companies as $company)
                            <tr>
                                <td><strong>{{ $loop->index + 1 }}</strong></td>
                                <td class="capitalize"><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                    <strong>{{ $company->name }}</strong>
                                </td>
                                <td>{{ $company->location }}</td>
                                <td><span class="badge bg-label-primary me-1">{{ $company->contact }}</span></td>

                                <td class="flex">
                                    <button type="button " data-bs-toggle="modal" data-bs-target='#editProductModal-{{$company->id}}'>
                                        <img
                                            src="https://img.icons8.com/external-kiranshastry-lineal-kiranshastry/27/646CFC/external-edit-interface-kiranshastry-lineal-kiranshastry.png" />
                                    </button>
                                     <form action="{{route('company.destroy',$company->id)}}" id="company-delete-{{$company->id}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" class="text-red-500 text-2xl m" onclick='deleteRow("company-delete-{{$company->id}}")'>
                                                <img src="https://img.icons8.com/ios/26/FF1111/delete-forever--v1.png" />
                                            </button>
                                    </form>
                                    <div class="modal fade" id="editProductModal-{{$company->id}}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel3">Edit Product</h5>
                                                
                                                    <button type="button" class="btn-close text-gray-500"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <img src="https://img.icons8.com/material-outlined/44/000000/multiply--v1.png" />
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card-body">
                                                        <form method="post" action="{{route('company.update',$company->id)}}" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('patch')
                                                            <div class="row mb-3">
                                                                <label class="col-sm-2 col-form-label"
                                                                    for="basic-default-name"> Name</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        name="name" id="basic-default-name"
                                                                        value="{{$company->name}}"
                                                                        placeholder="John Doe" />
                                                                </div>
                                                            </div>


                                                            <div class="row mb-3">
                                                                <label class="col-sm-2 col-form-label"
                                                                    for="basic-default-phone"> Location</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="location"
                                                                        id="basic-default-phone"
                                                                        class="form-control phone-mask" placeholder="brt"
                                                                        aria-label="658 799 8941"
                                                                        value={{$company->location}}
                                                                        aria-describedby="basic-default-phone" />
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                                <label class="col-sm-2 col-form-label"
                                                                    for="basic-default-message">Contact</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" id="basic-default-message"
                                                                        name="contact" class="form-control"
                                                                        aria-label=" Description about products"
                                                                        value="{{$company->contact}}"
                                                                        aria-describedby="basic-icon-default-message2">
                                                                </div>
                                                            </div>


                                                            <div class="modal-footer mt-5">
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
    </div>
@endsection
