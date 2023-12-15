@extends('admin.admin_master')
@section('title', 'Daily Invoice Report')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="card w-100">
    <div class="card-body border-top">
        <form id="myForm" class="form" method="GET" action="{{ route('daily.invoice.pdf') }}" target="_blank">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div class="mb-3 form-group">
                        <label for="inputfname" class="control-label col-form-label"> Start Date <span class="text-danger"> *</span></label>
                        <input class="form-control example-date-input" name="start_date" type="date"  id="start_date" placeholder="YY-MM-DD">
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="mb-3 form-group">
                        <label for="inputfname" class="control-label col-form-label"> End Date <span class="text-danger"> *</span></label>
                        <input class="form-control example-date-input" name="end_date" type="date"  id="end_date" placeholder="YY-MM-DD">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="md-3 form-group">
                        <label for="example-text-input" class="form-label" style="margin-top:49px;"> </label>
                        <button type="submit" class="btn btn-info">Search</button>
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
                start_date: {
                    required : true,
                },
                 end_date: {
                    required : true,
                },

            },
            messages :{
                start_date: {
                    required : 'Please Select Start Date',
                },
                end_date: {
                    required : 'Please Select End Date',
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
