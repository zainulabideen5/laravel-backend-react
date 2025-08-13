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
 
	    <h4 class="card-title">Add Project Page</h4><br>


	    <form method="post" action="{{route('project.store')}}" id="myForm" enctype="multipart/form-data">
	    	@csrf
	    <div class="row mb-3">
	        <label for="example-text-input" class="col-sm-2 col-form-label">Project Name </label>
	        <div class="form-group col-sm-10">
	            <input name="project_name" class="form-control" type="text">
	        </div>
	    </div>
        <!-- end col -->
         <div class="row mb-3">
	        <label for="example-text-input" class="col-sm-2 col-form-label">Project Description </label>
	        <div class="form-group col-sm-10">
	            <input name="project_description" class="form-control" type="text">
	        </div>
	    </div>
        <!-- end col -->
        <div class="row mb-3">
	        <label for="example-text-input" class="col-sm-2 col-form-label">Project Features </label>
	        <div class="form-group col-sm-10">
	            <input name="project_features" class="form-control" type="text">
	        </div>
	    </div>
        <!-- end col -->
        
        <div class="row mb-3">
	        <label for="example-text-input" class="col-sm-2 col-form-label">Live Preview </label>
	        <div class="form-group col-sm-10">
	            <input name="live_preview" class="form-control" type="link">
	        </div>
	    </div>
       
        <!-- end col -->
         <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Image One</label>
            <div class=" form-group col-sm-10">
                <input name="img_one" class="form-control" type="file" id="image">
            </div>
        </div>
        <!-- end col -->

           <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <img id="showImage" class="rounded avatar-xl" src="{{ url('upload/no_image.jpg') }}" alt="Card image cap">
            </div>
        </div>

         <!-- end col -->
         <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Image Two</label>
            <div class=" form-group col-sm-10">
                <input name="img_two" class="form-control" type="file" id="images">
            </div>
        </div>
        <!-- end col -->
        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <img id="showImages" class="rounded avatar-xl" src="{{ url('upload/no_image.jpg') }}" alt="Card image cap">
            </div>
        </div>
        
        
	       
         <input type="submit" class="btn btn-info btn-rounded waves-effect waves-light"
         value="Add Projects">

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
                project_name: {
                    required : true,
                },
                project_description: {
                    required : true,
                }, 
                project_features: {
                    required : true,
                },
                live_preview: {
                    required : true,
                },
                img_one: {
                    required : true,
                },
                img_two: {
                    required : true,
                },
                
            },
            messages :{
                project_name: {
                    required : 'Please Enter Your Project Name',
                },
               project_description: {
                    required : 'Please Enter Your Project Description',
                },
                project_features: {
                    required : 'Please Enter Your Project Feature',
                },
               live_preview: {
                    required : 'Please Enter Your Live Preview',
                },
                img_one: {
                    required : 'Please Enter Your Image One',
                },
                img_two: {
                    required : 'Please Enter Your Image Two',
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

    $(document).ready(function(){
        $('#images').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImages').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']); 
        });
    });

</script>

@endsection