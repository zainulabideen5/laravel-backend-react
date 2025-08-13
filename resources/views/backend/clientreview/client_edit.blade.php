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
 
	    <h4 class="card-title">Edit Client Page</h4><br>


	    <form method="post" action="{{ route ('client.update') }}" id="myForm" enctype="multipart/form-data">
	    	@csrf
            <input type="hidden" name="id" value="{{ $clients->id }}" >
	    <div class="row mb-3">
	        <label for="example-text-input" class="col-sm-2 col-form-label">Client Title </label>
	        <div class="form-group col-sm-10">
	            <input name="client_title" value="{{ $clients->client_title }}" class="form-control" type="text">
	        </div>
	    </div>
        <!-- end col -->
         <div class="row mb-3">
	        <label for="example-text-input" class="col-sm-2 col-form-label">Client Description  </label>
	        <div class="form-group col-sm-10">
	            <input name="client_description" value="{{ $clients->client_description }}" class="form-control" type="text">
	        </div>
	    </div>
        <!-- end col -->
         <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Client Image</label>
            <div class=" form-group col-sm-10">
                <input name="client_img"  class="form-control" type="file" id="image">
            </div>
        </div>
        <!-- end col -->

           <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <img id="showImage" class="rounded avatar-xl" src="{{ asset($clients->client_img) }}" alt="Card image cap">
            </div>
        </div>
        
	       
         <input type="submit" class="btn btn-info btn-rounded waves-effect waves-light"
         value="Update Client">

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
                client_title: {
                    required : true,
                },
                client_description: {
                    required : true,
                }, 
                
                 },
            messages :{
                client_title: {
                    required : 'Please Enter Your Title',
                },
                client_description: {
                    required : 'Please Enter Your Description',
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