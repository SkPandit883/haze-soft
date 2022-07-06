@extends('layouts.master')
@section('content')
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="modal fade" id="addProductModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">New Company</h5>
                    <button type="button" class="btn-close text-gray-500" data-bs-dismiss="modal" aria-label="Close">
                        <img src="https://img.icons8.com/material-outlined/44/000000/multiply--v1.png" />
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <form method="post" action="" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name"> Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" id="basic-default-name" placeholder="John Doe" />
                                </div>
                            </div>
 

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-phone"> Location</label>
                                <div class="col-sm-10">
                                    <input type="text" name="price" id="basic-default-phone" class="form-control phone-mask" placeholder="1200" aria-label="658 799 8941" aria-describedby="basic-default-phone" />
                                </div>
                            </div>
                          
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-message">Contact</label>
                                <div class="col-sm-10">
                                    <input type="text" id="basic-default-message" name="description" class="form-control"  aria-label=" Description about products" aria-describedby="basic-icon-default-message2"></input>
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

    <!-- Basic Bootstrap Table -->
    <div class="card">


        <div class="flex flex-row items-center justify-between">
            <h5 class="card-header">List of products</h5>
            <button type="button" data-bs-toggle="modal" data-bs-target="#addProductModal" class="btn btn-primary bg-[#696cff] mr-10">Add</button>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <tr>
                        <td><strong>1</strong></td>
                        <td class="capitalize"><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>name</strong></td>
                        <td><span class="badge bg-label-primary me-1">cat</span></td>
                        <td>price</td>
                        <td>
                            <img style="height:65px;width:60px" src="" alt="" srcset="">
                        </td>
                        <td>des</td>
                        <td>
                            <button type="button " data-bs-toggle="modal" data-bs-target='#editProductModal'>
                                <img src="https://img.icons8.com/external-kiranshastry-lineal-kiranshastry/27/646CFC/external-edit-interface-kiranshastry-lineal-kiranshastry.png" />
                            </button>

                            <button type="button" class="text-red-500 text-2xl m" onclick="deleteRow()">
                                <img src="https://img.icons8.com/ios/26/FF1111/delete-forever--v1.png" />
                            </button>
                            <div class="modal fade" id="editProductModal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel3">Edit Product</h5>
                                            <button type="button" class="btn-close text-gray-500" data-bs-dismiss="modal" aria-label="Close">
                                                <img src="https://img.icons8.com/material-outlined/44/000000/multiply--v1.png" />
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card-body">
                                                <form method="post" action="" enctype="multipart/form-data">
                                                  @csrf
                                                  <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="basic-default-name"> Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="name" id="basic-default-name" placeholder="John Doe" />
                                                    </div>
                                                </div>
                     
                    
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="basic-default-phone"> Location</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="price" id="basic-default-phone" class="form-control phone-mask" placeholder="1200" aria-label="658 799 8941" aria-describedby="basic-default-phone" />
                                                    </div>
                                                </div>
                                              
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="basic-default-message">Contact</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="basic-default-message" name="description" class="form-control"  aria-label=" Description about products" aria-describedby="basic-icon-default-message2"></input>
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

                        </td>
                    </tr>



                </tbody>
            </table>
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->
</div>
@endsection
