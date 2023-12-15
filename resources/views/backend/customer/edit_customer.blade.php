@extends('admin.admin_master')
@section('title', 'Edit Customer')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="card w-100">
    <div class="card-body border-top">
        <form id="myForm" class="form" method="POST" action="{{ route('customer.update',$editData->id) }}" enctype="multipart/form-data">@csrf
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="mb-3 form-group">
                        <label for="inputfname" class="control-label col-form-label"> Customer Name <span class="text-danger"> *</span></label>
                        <input type="text" name="name" class="form-control" value="{{ $editData->name }}" placeholder="Name" required>
                        <small class="form-control-feedback">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </small>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="mb-3 form-group">
                        <label for="inputlname2" class="control-label col-form-label"> Customer Phone Number <span class="text-danger"> *</span></label>
                        <input type="tel" name="mobile_no" class="form-control" value="{{ $editData->mobile_no }}"  placeholder="Phone No" required>
                        <small class="form-control-feedback">
                        @error('mobile_no')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="mb-3 form-group">
                        <label for="uname" class="control-label col-form-label"> Customer Email <span class="text-danger"> *</span></label>
                        <input type="email" name="email" class="form-control" value="{{ $editData->email }}"  placeholder="Email" required>
                        <small class="form-control-feedback">
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </small>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="mb-3 form-group">
                        <label for="uname" class="control-label col-form-label"> Customer Address <span class="text-danger"> *</span></label>
                        <textarea type="text" name="address" cols="30" class="form-control" rows="2" required >{{ $editData->address }}</textarea>
                        <small class="form-control-feedback">
                        @error('address')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </small>
                    </div>
                </div>
            </div>
            <div class="p-3">
                <div class="action-form">
                    <div class="mb-3 mb-0 text-end">
                        <button type="submit" class="btn btn-danger rounded-pill px-4 waves-effect waves-light">Update Customer </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                name: {
                    required : true,
                },
                mobile_no: {
                    required : true,
                },
                email: {
                    required : true,
                },
                address: {
                    required : true,
                },
            },
            messages :{
                name: {
                    required : 'Please Enter Your Name',
                },
                mobile_no: {
                    required : 'Please Enter Your Mobile Number',
                },
                email: {
                    required : 'Please Enter Your Email',
                },
                address: {
                    required : 'Please Enter Your Address',
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
<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection
