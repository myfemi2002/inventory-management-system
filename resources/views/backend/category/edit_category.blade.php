@extends('admin.admin_master')
@section('title', 'Edit Category')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="card w-100">
    <div class="card-body border-top">
        <form id="myForm" class="form" method="POST" action="{{ route('category.update',$editData->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="mb-3 form-group">
                        <label for="inputfname" class="control-label col-form-label"> Category Name <span class="text-danger"> *</span></label>
                        <input type="text" name="name" class="form-control" value="{{ $editData->name }}"  placeholder="Name" >
                        <small class="form-control-feedback">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </small>
                    </div>
                </div>
            </div>
            <div class="p-3">
                <div class="action-form">
                    <div class="mb-3 mb-0 text-end">
                        <button type="submit" class="btn btn-info rounded-pill px-4 waves-effect waves-light">Save </button>
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
            },
            messages :{
                name: {
                    required : 'Please Enter Unit Name',
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
