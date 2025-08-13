@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="page-content">
<div class="container-fluid">

  
	<div class="row">
	<div class="col-lg-12">
	<div class="row">
	<div class="col-12">
	<div class="card">
	<div class="card-body">
 
	    <h4 class="card-title">Edit Information Page</h4><br>


	    <form method="post" action="{{route('information.update')}}" id="myForm" >
	    	@csrf

            <input type="hidden" name="id" value="{{$informations->id}}">
	    <div class="row mb-3">
	        <label for="example-text-input" class="col-sm-2 col-form-label">About </label>
	        <div class="form-group col-sm-10">
	            <input name="about" class="form-control" value="{{ $informations->about }}" type="about">
	        </div>
	    </div>
        <!-- end col -->

        <div class="row mb-3">
	        <label for="example-text-input" class="col-sm-2 col-form-label">Refund </label>
	        <div class="form-group col-sm-10">
	            <input name="refund" class="form-control" value="{{ $informations->refund }}" type="refund">
	        </div>
	    </div>
        <!-- end col -->

        <div class="row mb-3">
	        <label for="example-text-input" class="col-sm-2 col-form-label">Terms </label>
	        <div class="form-group col-sm-10">
	            <input name="terms" class="form-control" value="{{ $informations->terms }}" type="terms">
	        </div>
	    </div>
        <!-- end col -->

        <div class="row mb-3">
	        <label for="example-text-input" class="col-sm-2 col-form-label">Privacy </label>
	        <div class="form-group col-sm-10">
	            <input name="privacy" class="form-control" value="{{ $informations->privacy }}" type="privacy">
	        </div>
	    </div>
        <!-- end col -->
         
	       
         <input type="submit" class="btn btn-info btn-rounded waves-effect waves-light"
         value="Update Information">

        </form>
    </div>
	    	</div>
	</div>
</div>


		</div>
		</div>

		<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
               about: {
                    required : true,
                },
                refund: {
                    required : true,
                }, 
               terms: {
                    required : true,
                },
                privacy: {
                    required : true,
                },
                
            },
            messages :{
                about: {
                    required : 'Please Enter Your About',
                },
                refund: {
                    required : 'Please Enter Your Refund',
                },
                terms: {
                    required : 'Please Enter Terms',
                },
                privacy: {
                    required : 'Please Enter Your privacy',
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