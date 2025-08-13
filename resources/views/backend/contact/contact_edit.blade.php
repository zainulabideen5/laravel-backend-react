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
 
	    <h4 class="card-title">Edit Contact Page</h4><br>


	    <form method="post" action="{{ route ('contact.update') }}" id="myForm" >
	    	@csrf

            <input type="hidden" name="id" value="{{$contact->id}}">
	    <div class="row mb-3">
	        <label for="example-text-input" class="col-sm-2 col-form-label">Name </label>
	        <div class="form-group col-sm-10">
	            <input name="name" class="form-control" value="{{ $contact->name }}" type="text">
	        </div>
	    </div>
        <!-- end col -->
         <div class="row mb-3">
	        <label for="example-text-input" class="col-sm-2 col-form-label">Email </label>
	        <div class="form-group col-sm-10">
	            <input name="email" class="form-control"value="{{ $contact->email }}" type="text">
	        </div>
	    </div>
        <!-- end col -->
        <div class="row mb-3">
	        <label for="example-text-input" class="col-sm-2 col-form-label">Message </label>
	        <div class="form-group col-sm-10">
	            <input name="message" class="form-control"value="{{ $contact->message }}" type="text">
	        </div>
	    </div>
        <!-- end col -->
	       
         <input type="submit" class="btn btn-info btn-rounded waves-effect waves-light"
         value="Update Contact">

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
                name: {
                    required : true,
                },
                email: {
                    required : true,
                }, 
                message: {
                    required : true,
                },
            },
            messages :{
               name: {
                    required : 'Please Enter Your Name',
                },
                email: {
                    required : 'Please Enter Your Email',
                },
                message: {
                    required : 'Please Enter Your Message',
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