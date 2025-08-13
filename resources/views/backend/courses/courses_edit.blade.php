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
 
	    <h4 class="card-title">Edit Courses Page</h4><br>


	    <form method="post" action="{{route('courses.update')}}" id="myForm" enctype="multipart/form-data">
	    	@csrf
            <input type="hidden" name="id" value="{{$courses->id}}">

	    <div class="row mb-3">
	        <label for="example-text-input" class="col-sm-2 col-form-label">Long Title </label>
	        <div class="form-group col-sm-10">
	            <input name="long_title" class="form-control" value="{{$courses->long_title}}" type="text">
	        </div>
	    </div>
        <!-- end col -->
         <div class="row mb-3">
	        <label for="example-text-input" class="col-sm-2 col-form-label">short Title </label>
	        <div class="form-group col-sm-10">
	            <input name="short_title" class="form-control"value="{{$courses->short_title}}" type="text">
	        </div>
	    </div>
        <!-- end col -->
        <div class="row mb-3">
	        <label for="example-text-input" class="col-sm-2 col-form-label">Long Description </label>
	        <div class="form-group col-sm-10">
	            <input name="long_description" class="form-control" value="{{$courses->long_description}}" type="text">
	        </div>
	    </div>
        <!-- end col -->
        
        <div class="row mb-3">
	        <label for="example-text-input" class="col-sm-2 col-form-label">Short Description </label>
	        <div class="form-group col-sm-10">
	            <input name="short_description" class="form-control" value="{{$courses->short_description}}"  type="text">
	        </div>
	    </div>
        <!-- end col -->
        <div class="row mb-3">
	        <label for="example-text-input" class="col-sm-2 col-form-label">Total Duration </label>
	        <div class="form-group col-sm-10">
	            <input name="total_duration" class="form-control" value="{{$courses->total_duration}}" type="text">
	        </div>
	    </div>
        <!-- end col -->
        <div class="row mb-3">
	        <label for="example-text-input" class="col-sm-2 col-form-label">Total Lecture </label>
	        <div class="form-group col-sm-10">
	            <input name="total_lecture" class="form-control" value="{{$courses->total_lecture}}" type="text">
	        </div>
	    </div>
         <!-- end col -->
         <div class="row mb-3">
	        <label for="example-text-input" class="col-sm-2 col-form-label">Total Student </label>
	        <div class="form-group col-sm-10">
	            <input name="total_student" class="form-control" value="{{$courses->total_student}}" type="text">
	        </div>
	    </div>
        <!-- end col -->
        <div class="row mb-3">
	        <label for="example-text-input" class="col-sm-2 col-form-label">Skill All </label>
	        <div class="form-group col-sm-10">
	            <input name="skill_all" class="form-control" value="{{$courses->skill_all}}" type="text">
	        </div>
	    </div>
        <!-- end col -->
        <div class="row mb-3">
	        <label for="example-text-input" class="col-sm-2 col-form-label">Video URL </label>
	        <div class="form-group col-sm-10">
	            <input name="video_url" class="form-control" value="{{$courses->video_url}}" type="url">
	        </div>
	    </div>
        <!-- end col -->
         <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Small Image</label>
            <div class=" form-group col-sm-10">
                <input name="small_img" class="form-control" type="file" id="image">
            </div>
        </div>
        <!-- end col -->

           <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <img id="showImage" class="rounded avatar-xl" src="{{ asset($courses->small_img) }}" alt="Card image cap">
            </div>
        </div>
	       
         <input type="submit" class="btn btn-info btn-rounded waves-effect waves-light"
         value="Update Courses">

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
            long_title: {
                    required : true,
                },
                short_title: {
                    required : true,
                }, 
                long_description: {
                    required : true,
                },
                short_description: {
                    required : true,
                },
                total_duration: {
                    required : true,
                },
                total_lecture: {
                    required : true,
                },
                total_student: {
                    required : true,
                },
                skill_all: {
                    required : true,
                },
                video_url: {
                    required : true,
                },
               
            },
            messages :{
                long_title: {
                    required : 'Please Enter Your Long Title',
                },
                short_title: {
                    required : 'Please Enter Your Short Title',
                },
                long_description: {
                    required : 'Please Enter Your Long Description',
                },
                short_description: {
                    required : 'Please Enter Your Short Description',
                },
                total_duration: {
                    required : 'Please Enter Your Total Duration',
                },
                total_lecture: {
                    required : 'Please Enter Your Total Lecture',
                },
                total_student: {
                    required : 'Please Select One Total Student',
                },
                skill_all: {
                    required : 'Please Select One Skill All',
                },
                video_url: {
                    required : 'Please Select One Video URL',
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