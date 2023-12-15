@extends('admin.admin_master')
@section('title', 'Add Product')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="card w-100">
    <div class="card-body border-top">
        <form id="myForm" class="form" method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="mb-3 form-group">
                        <label for="inputfname" class="control-label col-form-label"> Product Name <span class="text-danger"> *</span></label>
                        <input type="text" name="name" class="form-control" placeholder="Name" required>
                        <small class="form-control-feedback">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </small>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="mb-3 form-group">
                        <label for="inputfname" class="control-label col-form-label"> Supplier Name <span class="text-danger"> *</span></label>
                        <select  name="supplier_id" class="form-select mr-sm-2" id="inlineFormCustomSelect" required>
                        <option value="" selected="" disabled="">Choose ...</option>
                        @foreach($supplier as $supp)
                        <option value="{{ $supp->id }}">{{ $supp->name }}</option>
                        @endforeach
                        </select>
                        <small class="form-control-feedback">
                        @error('supplier_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="mb-3 form-group">
                        <label for="inputfname" class="control-label col-form-label"> Unit Name <span class="text-danger"> *</span></label>
                        <select  name="unit_id" class="form-select mr-sm-2" id="inlineFormCustomSelect" required>
                        <option value="" selected="" disabled="">Choose ...</option>
                        @foreach($unit  as $uni)
                        <option value="{{ $uni->id }}">{{ $uni->name }}</option>
                        @endforeach
                        </select>
                        <small class="form-control-feedback">
                        @error('unit_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </small>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="mb-3 form-group">
                        <label for="inputfname" class="control-label col-form-label"> Category Name <span class="text-danger"> *</span></label>
                        <select  name="category_id" class="form-select mr-sm-2" id="inlineFormCustomSelect" required>
                            <option value="" selected="" disabled="">Choose ...</option>
                        @foreach($category  as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                        </select>
                        <small class="form-control-feedback">
                        @error('category_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </small>
                </div>
            </div>
        </div>
            <div class="p-3 ">
                <div class="action-form">
                    <div class="mb-3 mb-0 text-end">
                        <button type="submit" class="btn btn-info rounded-pill px-4 waves-effect waves-light"> Save</button>
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
                supplier_id: {
                    required : true,
                },
                unit_id: {
                    required : true,
                },
                category_id: {
                    required : true,
                },
            },
            messages :{
                name: {
                    required : 'Please Enter Your Product Name',
                },
                supplier_id: {
                    required : 'Please Select One Supplier',
                },
                unit_id: {
                    required : 'Please Select One Unit',
                },
                category_id: {
                    required : 'Please Select One Category',
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
