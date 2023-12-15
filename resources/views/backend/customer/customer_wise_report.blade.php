@extends('admin.admin_master')
@section('title', 'PDF Customer Report')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="card w-100">
    <div class="card-body border-top">
        <div class="row mb-5">
            <div class="col-md-12 text-center">
                <strong> Customer Wise Credit Report </strong>
                <input type="radio" name="customer_wise_report" value="customer_wise_credit" class="search_value"> &nbsp;&nbsp;
                <strong> Customer Wise Paid Report </strong>
                <input type="radio" name="customer_wise_report" value="customer_wise_paid" class="search_value">
            </div>
        </div>
        <!-- // end row  -->
        <!--  /// Customer Credit Wise  -->
        <div class="show_credit" style="display:none">
            <form method="GET" action="{{ route('customer.wise.credit.report') }}" id="myForm" target="_blank" >
                <div class="row ">

                    <div class="col-md-4 mb-3 form-group">
                        <label for="inputfname" class="control-label col-form-label"> Customer Name <span class="text-danger"> *</span></label>
                        <select name="customer_id" class="select2 form-control custom-select" style="width: 100%; height: 40px" required>
                            <option value="" selected="" disabled="">Choose ...</option>
                            @foreach($customers as $cus)
                            <option value="{{ $cus->id }}">{{ $cus->name }}</option>
                            @endforeach
                        </select>
                        <small class="form-control-feedback">
                        @error('customer_id')
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
        <!--  /// End Customer Credit Wise  -->

        <!--  /// show_paid -->
        <div class="show_paid" style="display:none; ">
            <form method="GET" action="{{ route('customer.wise.paid.report') }}" id="myForm" target="_blank" >
                <div class="row">
                    <div class="col-md-4 mb-3 form-group">
                        <label for="inputfname" class="control-label col-form-label"> Customer Name <span class="text-danger"> *</span></label>
                        <select name="customer_id" class="select2 form-control custom-select" id="customer_id" style="width: 100%; height: 36px" required>
                            <option value="" selected="" disabled="">Choose ...</option>
                            @foreach($customers as $cus)
                            <option value="{{ $cus->id }}">{{ $cus->name }}</option>
                            @endforeach
                        </select>
                        <small class="form-control-feedback">
                        @error('customer_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </small>
                    </div>


                    <div class="col-sm-4"  style="padding-top: 35px;">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>
        </div>
        <!--  /// End show_paid  -->
    </div>
</div><script type="text/javascript">
    $(document).on('change','.search_value', function(){
        var search_value = $(this).val();
        if (search_value == 'customer_wise_credit') {
            $('.show_credit').show();
        }else{
            $('.show_credit').hide();
        }
    });
</script>


<script type="text/javascript">
    $(document).on('change','.search_value', function(){
        var search_value = $(this).val();
        if (search_value == 'customer_wise_paid') {
            $('.show_paid').show();
        }else{
            $('.show_paid').hide();
        }
    });
</script>
@endsection
