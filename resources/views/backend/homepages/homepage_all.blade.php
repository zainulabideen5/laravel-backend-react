@extends('admin.admin_master')
@section('admin')


<div class="page-content">
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">HomePageEtc All</h4>

                 

            </div>
        </div>
    </div>
    <!-- end page title -->
    
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">

    <a href="{{route('homepage.add')}}" class="btn btn-dark btn-rounded waves-effect waves-light" 
    style="float:right;"><i class="fas fa-plus-circle"> Add HomePageEtc </i></a><br><br>

<h4 class="card-title">HomePageEtc All Data </h4>


<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%; table-layout: fixed;">
    <thead>
    <tr >
        <th width="10%">Sl</th>
        <th width="20%">HomeTitle</th>
        <th width="25%">HomeSubTitle</th>
        <th width="25%">Tech Description</th>
        <th width="20%">TotalStudent</th>
        <th width="20%">TotalCourse</th>
        <th width="20%">TotalReview</th>
        <th width="25%">Video Description</th>
        <th width="25%">VideoURL</th>
        <th width="20%">Action</th> 
        
    </thead>


    <tbody>
    	 
    	@foreach($homepages as $key => $item)
    <tr>
        <td> {{ $key+1}} </td>
        <td > {{ $item->home_title }} </td> 
        <td> {{ $item->home_subtitle }} </td> 
        <td> {{ $item->tech_description }} </td> 
        <td> {{ $item->total_student }} </td> 
        <td> {{ $item->total_course }} </td> 
        <td> {{ $item->total_review }} </td> 
        <td> {{ $item->video_description }} </td> 
        <td> {{ $item->video_url }} </td> 
         
        
        <td>
<a href="{{route('homepage.edit',$item->id)}}" class="btn btn-info sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>

<a href="{{route('homepage.delete',$item->id)}}" class="btn btn-danger sm" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>

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