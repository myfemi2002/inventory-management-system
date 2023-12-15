@extends('admin.admin_master')
@section('title', 'PDF Stock Report')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="card w-100">
    <div class="card-body border-top">
        <div class="row mb-5">
            <div class="col-md-12 text-center">
                <strong> Supplier Wise Report </strong>
                <input type="radio" name="supplier_product_wise" value="supplier_wise" class="search_value"> &nbsp;&nbsp;
                <strong> Product Wise Report </strong>
                <input type="radio" name="supplier_product_wise" value="product_wise" class="search_value">
            </div>
        </div>
        <!-- // end row  -->
        <!--  /// Supplier Wise  -->
        <div class="show_supplier" style="display:none">
            <form method="GET" action="{{ route('supplier.wise.pdf') }}" id="myForm" target="_blank" >
                <div class="row ">
                    <div class="col-md-8 mb-3 form-group">
                        <label for="inputfname" class="control-label col-form-label"> Supplier Name <span class="text-danger"> *</span></label>
                        <select name="supplier_id" class="select2 form-control custom-select" id="supplier_id" style="width: 100%; height: 40px" required>
                            <option value="" selected="" disabled="">Choose ...</option>
                            @foreach($supppliers  as $supp)
                            <option value="{{ $supp->id }}">{{ $supp->name }}</option>
                            @endforeach
                        </select>
                        <small class="form-control-feedback">
                        @error('supplier_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </small>
                    </div>
                    <div class="col-sm-4" style="padding-top: 35px;">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>
        </div>
        <!--  /// End Supplier Wise  -->
        <!--  /// Product Wise  -->
        <div class="show_product" style="display:none; ">
            <form method="GET" action="{{ route('product.wise.pdf') }}" id="myForm" target="_blank" >
                <div class="row">
                    <div class="col-md-4 mb-3 form-group">
                        <label for="inputfname" class="control-label col-form-label"> Category Name <span class="text-danger"> *</span></label>
                        <select name="category_id" class="select2 form-control custom-select" id="category_id" style="width: 100%; height: 36px" required>
                            <option value="" selected="" disabled="">Choose ...</option>
                            @foreach($category as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                        <small class="form-control-feedback">
                        @error('category_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </small>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="mb-3  text-center form-group">
                            <label for="inputfname" class="control-label col-form-label"> Product Name <span class="text-danger"> *</span></label>
                            <select  name="product_id"  class="select2 form-control custom-select" id="product_id" style="width: 100%; height: 36px" required>
                                <option value="" selected="" disabled="">Choose ...</option>
                            </select>
                            <small class="form-control-feedback">
                            @error('product_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </small>
                        </div>
                    </div>
                    <div class="col-sm-4"  style="padding-top: 35px;">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>
        </div>
        <!--  /// End Product Wise  -->
    </div>
</div>
<script type="text/javascript">
    $(function(){
        $(document).on('change','#category_id',function(){
            var category_id = $(this).val();
            $.ajax({
                url:"{{ route('get-product') }}",
                type: "GET",
                data:{category_id:category_id},
                success:function(data){
                    var html = '<option value="">Select Category</option>';
                    $.each(data,function(key,v){
                        html += '<option value=" '+v.id+' "> '+v.name+'</option>';
                    });
                    $('#product_id').html(html);
                }
            })
        });
    });
</script>
<script type="text/javascript">
    $(document).on('change','.search_value', function(){
        var search_value = $(this).val();
        if (search_value == 'supplier_wise') {
            $('.show_supplier').show();
        }else{
            $('.show_supplier').hide();
        }
    });
</script>
<script type="text/javascript">
    $(document).on('change','.search_value', function(){
        var search_value = $(this).val();
        if (search_value == 'product_wise') {
            $('.show_product').show();
        }else{
            $('.show_product').hide();
        }
    });
</script>
<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                category_id : {
                    required : true,
                },
                product_id : {
                    required : true,
                },

            },
            messages :{
                category_id: {
                    required : 'Please Select category name ',
                },
                product_id: {
                    required : 'Please Select product name ',
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
