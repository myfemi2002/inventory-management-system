@extends('admin.admin_master')
@section('title', 'Add User & Roles')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Start Page Content -->
<!-- -------------------------------------------------------------- -->
<div class="row">
<div class="col-12">
    <!-- ----------------------------------------- -->
    <!-- 1. Basic Form -->
    <!-- ----------------------------------------- -->
    <!-- ---------------------
        start Basic Form
        ---------------- -->
    <div class="card">
        <div class="card-body">

            <form id="myForm" class="form" method="POST" action="{{ route('role.store') }}" enctype="multipart/form-data">@csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3"> <input type="text" name="name" class="form-control" id="tb-fname" placeholder="Enter Name here" required/>
                            <label for="tb-fname">Name</label>
                        </div>
                        <small class="form-control-feedback">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </small>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3"> <input type="email" name="email" class="form-control" id="tb-email" placeholder="name@example.com" required/>
                            <label for="tb-email">Email address</label>
                        </div>
                        <small class="form-control-feedback">
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </small>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating"> <input type="password" name="password" class="form-control" id="tb-pwd" placeholder="Password" required/>
                            <label for="tb-pwd">Password</label>
                        </div>
                        <small class="form-control-feedback">
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </small>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating"> <input type="password" name="confirm_password" class="form-control" id="tb-cpwd" placeholder="Password"/>
                            <label for="tb-cpwd">Confirm Password</label>
                        </div>
                        <small class="form-control-feedback">
                        @error('confirm_password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </small>
                    </div>
                    <div class="col-md-12 mb-4 mt-3">
                        <label class="mb-2">Assign User Roles :</label> <br>
                        <label class="checkbox-inline mr-4"><input type="checkbox" name="role"  value="1" id="cc1">Create User & Role  </label>
                        <label class="checkbox-inline mr-2"><input type="checkbox" name="current_stock"  value="1" id="cc2"> Current Stock</label>
                        <label class="checkbox-inline mr-2"><input type="checkbox" name="customer"  value="1" id="cc3"> Customer </label>
                        <label class="checkbox-inline mr-2"><input type="checkbox" name="supplier"  value="1" id="cc4"> Supplier </label>
                        <label class="checkbox-inline mr-2"> <input type="checkbox" name="unit"  value="1" id="cc5"> Unit  </label>
                        <label class="checkbox-inline mr-2"> <input type="checkbox" name="category"  value="1" id="cc6"> Category</label>
                        <label class="checkbox-inline mr-2"> <input type="checkbox" name="product"  value="1" id="cc7"> Product </label>
                        <label class="checkbox-inline mr-2"> <input type="checkbox" name="purchase"  value="1" id="cc8"> Purchase </label>
                        <label class="checkbox-inline mr-2"><input type="checkbox" name="invoice"  value="1" id="cc9"> Invoice </label>
                        <label class="checkbox-inline mr-2"><input type="checkbox" name="stock"  value="1" id="cc10"> Stock  </label>
                    </div>
                    <div class="col-12">
                    </div>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-6"></div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-3"> </div>
                                <div class="col-3">
                                    <div class="ms-auto mt-3 mt-md-0">
                                        <button type="submit" class="btn btn-info font-medium rounded-pill px-4">
                                            <div class="d-flex align-items-center">
                                                <i data-feather="send" class="feather-sm fill-white me-2"></i> Submit
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </form>
    </div>
</div>
<!-- ---------------------
    end Basic Form
    ---------------- -->

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                name: {
                    required : true,
                },
                email: {
                    required : true,
                },
                password: {
                    required : true,
                },
                confirm_password: {
                    required : true,
                },
            },
            messages :{
                name: {
                    required : 'Please Enter  Name',
                },
                email: {
                    required : 'Please Enter Email ',
                },
                password: {
                    required : 'Please Enter Password',
                },
                confirm_password: {
                    required : 'Please Enter Confirm Password',
                },
            },
            errorElement : 'span',
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });

</script>
@endsection
