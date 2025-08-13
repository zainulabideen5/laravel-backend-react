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
 
	    <h4 class="card-title">Add HomePageEtc Page</h4><br>


	    <form method="post" action="{{route('homepage.store')}}" id="myForm" enctype="multipart/form-data">
	    	@csrf
	    <div class="row mb-3">
	        <label for="example-text-input" class="col-sm-2 col-form-label">Home Title </label>
	        <div class="form-group col-sm-10">
	            <input name="home_title" class="form-control" type="text">
	        </div>
	    </div>
        <!-- end col -->
         <div class="row mb-3">
	        <label for="example-text-input" class="col-sm-2 col-form-label">Home SubTitle </label>
	        <div class="form-group col-sm-10">
	            <input name="home_subtitle" class="form-control" type="text">
	        </div>
	    </div>
        <!-- end col -->
        <div class="row mb-3">
	        <label for="example-text-input" class="col-sm-2 col-form-label">Tech Description </label>
	        <div class="form-group col-sm-10">
	            <input name="tech_description" class="form-control" type="text">
	        </div>
	    </div>
        <!-- end col -->
        <div class="row mb-3">
	        <label for="example-text-input" class="col-sm-2 col-form-label">Total Student </label>
	        <div class="form-group col-sm-10">
	            <input name="total_student" class="form-control" type="text">
	        </div>
	    </div>
         <!-- end col -->
         <div class="row mb-3">
	        <label for="example-text-input" class="col-sm-2 col-form-label">Total Course </label>
	        <div class="form-group col-sm-10">
	            <input name="total_course" class="form-control" type="text">
	        </div>
	    </div>
        <!-- end col -->
        <div class="row mb-3">
	        <label for="example-text-input" class="col-sm-2 col-form-label">Total Review </label>
	        <div class="form-group col-sm-10">
	            <input name="total_review" class="form-control" type="text">
	        </div>
	    </div>
        <!-- end col -->
        <div class="row mb-3">
	        <label for="example-text-input" class="col-sm-2 col-form-label">Video Description </label>
	        <div class="form-group col-sm-10">
	            <input name="video_description" class="form-control" type="text">
	        </div>
	    </div>
        <!-- end col -->
        <div class="row mb-3">
	        <label for="example-text-input" class="col-sm-2 col-form-label">Video URL </label>
	        <div class="form-group col-sm-10">
	            <input name="video_url" class="form-control" type="link">
	        </div>
	    </div>
        <!-- end col -->
	       
         <input type="submit" class="btn btn-info btn-rounded waves-effect waves-light"
         value="Add HomePageETC">

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
                home_title: {
                    required : true,
                },
                home_subtitle: {
                    required : true,
                }, 
                tech_description: {
                    required : true,
                },
                total_student: {
                    required : true,
                },
                total_course: {
                    required : true,
                },
                total_review: {
                    required : true,
                },
                video_description: {
                    required : true,
                },
                video_url: {
                    required : true,
                },
            },
            messages :{
                home_title: {
                    required : 'Please Enter Your HomeTitle',
                },
                home_subtitle: {
                    required : 'Please Enter Your HomeSubTitle',
                },
                tech_description: {
                    required : 'Please Enter Tech Description',
                },
                total_student: {
                    required : 'Please Enter Your Total Student',
                },
                total_course: {
                    required : 'Please Enter Total Courses',
                },
               total_review: {
                    required : 'Please Enter Your Total Review',
                },
                video_description: {
                    required : 'Please Select Video Description',
                },
                video_url: {
                    required : 'Please Select Video URL',
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