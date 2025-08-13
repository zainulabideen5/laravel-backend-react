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
 
	    <h4 class="card-title">Edit Chart Page</h4><br>


	    <form method="post" action="{{ route('chart.update')}}" id="myForm" >
	    	@csrf

            <input type="hidden" name="id" value="{{$chart->id}}">
	    <div class="row mb-3">
	        <label for="example-text-input" class="col-sm-2 col-form-label">Techonology </label>
	        <div class="form-group col-sm-10">
	            <input name="Techonology" class="form-control" value="{{ $chart->Techonology }}" type="text">
	        </div>
	    </div>
        <!-- end col -->
         <div class="row mb-3">
	        <label for="example-text-input" class="col-sm-2 col-form-label">Projects </label>
	        <div class="form-group col-sm-10">
	            <input name="Projects" class="form-control"value="{{ $chart->Projects }}" type="text">
	        </div>
	    </div>
        <!-- end col -->
        
	       
         <input type="submit" class="btn btn-info btn-rounded waves-effect waves-light"
         value="Update Chart">

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
                Techonology: {
                    required : true,
                },
                Projects: {
                    required : true,
                }, 
            },
            messages :{
                Techonology: {
                    required : 'Please Enter Your Techonology',
                },
                Projects: {
                    required : 'Please Enter Your Projects',
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