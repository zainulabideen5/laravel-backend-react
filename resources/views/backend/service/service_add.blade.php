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
 
	    <h4 class="card-title">Add Service Page</h4><br>


	    <form method="post" action="{{route('service.store')}}" id="myForm" enctype="multipart/form-data">
	    	@csrf
	    <div class="row mb-3">
	        <label for="example-text-input" class="col-sm-2 col-form-label">Service Name </label>
	        <div class="form-group col-sm-10">
	            <input name="service_name" class="form-control" type="text">
	        </div>
	    </div>
        <!-- end col -->
         <div class="row mb-3">
	        <label for="example-text-input" class="col-sm-2 col-form-label">Service Description </label>
	        <div class="form-group col-sm-10">
	            <input name="service_description" class="form-control" type="text">
	        </div>
	    </div>
        <!-- end col -->
        
         <!-- end col -->
         <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Service Logo</label>
            <div class=" form-group col-sm-10">
                <input name="service_logo" class="form-control" type="file" id="image">
            </div>
        </div>
        <!-- end col -->
        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <img id="showImage" class="rounded avatar-xl" src="{{ url('upload/no_image.jpg') }}" alt="Card image cap">
            </div>
        </div>
        
        
	       
         <input type="submit" class="btn btn-info btn-rounded waves-effect waves-light"
         value="Add Services">

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
                service_name: {
                    required : true,
                },
                service_description: {
                    required : true,
                }, 
                service_logo: {
                    required : true,
                },
                
            },
            messages :{
                service_name: {
                    required : 'Please Enter Your Service Name',
                },
               service_description: {
                    required : 'Please Enter Your Service Description',
                },
                service_logo: {
                    required : 'Please Enter Your Service Logo',
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