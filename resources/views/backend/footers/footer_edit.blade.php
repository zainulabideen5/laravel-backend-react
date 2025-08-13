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
 
	    <h4 class="card-title">Edit Footer Page</h4><br>


	    <form method="post" action="{{route('footer.update')}}" id="myForm" >
	    	@csrf

            <input type="hidden" name="id" value="{{$footers->id}}">
	    <div class="row mb-3">
	        <label for="example-text-input" class="col-sm-2 col-form-label">Email </label>
	        <div class="form-group col-sm-10">
	            <input name="email" class="form-control" value="{{ $footers->email }}" type="email">
	        </div>
	    </div>
        <!-- end col -->
         <div class="row mb-3">
	        <label for="example-text-input" class="col-sm-2 col-form-label">Phone </label>
	        <div class="form-group col-sm-10">
	            <input name="phone" class="form-control"value="{{ $footers->phone }}" type="text">
	        </div>
	    </div>
        <!-- end col -->
        <div class="row mb-3">
	        <label for="example-text-input" class="col-sm-2 col-form-label">FaceBook </label>
	        <div class="form-group col-sm-10">
	            <input name="facebook" class="form-control"value="{{ $footers->facebook }}" type="link">
	        </div>
	    </div>
        <!-- end col -->
        <div class="row mb-3">
	        <label for="example-text-input" class="col-sm-2 col-form-label">Youtube </label>
	        <div class="form-group col-sm-10">
	            <input name="youtube" class="form-control"value="{{ $footers->youtube }}" type="link">
	        </div>
	    </div>
        <!-- end col -->
        <div class="row mb-3">
	        <label for="example-text-input" class="col-sm-2 col-form-label">Twitter </label>
	        <div class="form-group col-sm-10">
	            <input name="twitter" class="form-control"value="{{ $footers->twitter }}" type="link">
	        </div>
	    </div>
        <!-- end col -->
        <div class="row mb-3">
	        <label for="example-text-input" class="col-sm-2 col-form-label">Footer Credit </label>
	        <div class="form-group col-sm-10">
	            <input name="footer_credit" class="form-control"value="{{ $footers->footer_credit }}" type="text">
	        </div>
	    </div>
        <!-- end col -->
         <!-- end col -->
        <div class="row mb-3">
	        <label for="example-text-input" class="col-sm-2 col-form-label">Address </label>
	        <div class="form-group col-sm-10">
	            <input name="address" class="form-control"value="{{ $footers->address }}" type="text">
	        </div>
	    </div>
        <!-- end col -->
	       
         <input type="submit" class="btn btn-info btn-rounded waves-effect waves-light"
         value="Update Footer">

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
                email: {
                    required : true,
                },
                phone: {
                    required : true,
                }, 
                facebook: {
                    required : true,
                },
                youtube: {
                    required : true,
                },
                twitter: {
                    required : true,
                },
                footer_credit: {
                    required : true,
                },
                address: {
                    required : true,
                },
            },
            messages :{
                email: {
                    required : 'Please Enter Your Email',
                },
                phone: {
                    required : 'Please Enter Your Phone Number',
                },
                facebook: {
                    required : 'Please Enter Your Facebook',
                },
                youtube: {
                    required : 'Please Enter Your Youtube',
                },
                twitter: {
                    required : 'Please Enter Your Twitter',
                },
                footer_credit: {
                    required : 'Please Enter Your Footer Credit',
                },
                address: {
                    required : 'Please Select One Address',
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