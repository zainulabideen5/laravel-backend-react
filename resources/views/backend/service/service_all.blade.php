@extends('admin.admin_master')
@section('admin')


<div class="page-content">
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Service All</h4>

                 

            </div>
        </div>
    </div>
    <!-- end page title -->
    
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">

    <a href="{{route('service.add')}}" class="btn btn-dark btn-rounded waves-effect waves-light" 
    style="float:right;"><i class="fas fa-plus-circle"> Add Service</i></a><br><br>

<h4 class="card-title">Service All Data </h4>


<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%; table-layout: fixed;">
    <thead>
    <tr >
        <th width="15%">Sl</th>
        <th width="20%">Service Name</th>
        <th width="25%">Service Description</th>
        <th width="20%">Service Logo</th>
        <th width="20%">Action</th> 
        
    </thead>


    <tbody>
    	 
    	@foreach($services as $key => $item)
    <tr>
        <td> {{ $key+1}} </td>
        <td > {{ $item->service_name }} </td> 
        <td> {{ $item->service_description }} </td>  
        <td> <img src="{{asset( $item->service_logo) }}" style="width: 55px; height: 50px"> </td>   
        
        <td>
<a href="{{route('service.edit',$item->id)}}" class="btn btn-info sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>

<a href="{{route('service.delete',$item->id)}}" class="btn btn-danger sm" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>

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