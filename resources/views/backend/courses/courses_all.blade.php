@extends('admin.admin_master')
@section('admin')


<div class="page-content">
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Courses All</h4>

                 

            </div>
        </div>
    </div>
    <!-- end page title -->
    
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">

    <a href="{{route('courses.add')}}" class="btn btn-dark btn-rounded waves-effect waves-light" 
    style="float:right;"><i class="fas fa-plus-circle"> Add Courses </i></a><br><br>

<h4 class="card-title">Courses All Data </h4>


<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%; table-layout: fixed;">
    <thead>
    <tr >
        <th width="5%">Sl</th>
        <th width="20%">Long Title</th>
        <th width="20%">short Title</th>
        <th width="20%">Long Description</th>
        <th width="20%">Short Description</th>
        <th width="20%">Total Duration</th>
        <th width="20%">Total Lacture</th>
        <th width="20%">Total Student</th>
        <th width="20%">Skill All</th>
        <th width="20%">Video URL</th>
        <th width="20%">Small Image</th>
          
        <th  width="20%">Action</th> 
        
    </thead>


    <tbody>
    	 
    	@foreach($courses as $key => $item)
    <tr>
        <td> {{ $key+1}} </td>
        <td> {{ $item->long_title }} </td> 
        <td> {{ $item->short_title }} </td> 
        <td> {{ $item->long_description }} </td> 
        <td> {{ $item->short_description }} </td> 
        <td> {{ $item->total_duration }} </td> 
        <td> {{ $item->total_lecture }} </td> 
        <td> {{ $item->total_student }} </td> 
        <td> {{ $item->skill_all }} </td> 
        <td> {{ $item->video_url }} </td> 
        <td> <img src="{{asset( $item->small_img) }}" style="width: 40px; height: 30px"> </td> 
 
        
         
        
        <td>
<a href="{{ route('courses.edit',$item->id) }}" class="btn btn-info sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>

<a href="{{ route('courses.delete',$item->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>

        </td>
       
    </tr>
    @endforeach
    
    </tbody>
</table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

 
        
        </div> <!-- container-fluid -->
        </div>


@endsection