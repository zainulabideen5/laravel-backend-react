@extends('admin.admin_master')
@section('admin')


<div class="page-content">
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Information All</h4>

                 

            </div>
        </div>
    </div>
    <!-- end page title -->
    
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">

    <a href="{{route ('information.add')}}" class="btn btn-dark btn-rounded waves-effect waves-light" 
    style="float:right;"><i class="fas fa-plus-circle"> Add Information </i></a><br><br>

<h4 class="card-title">Information All Data </h4>


<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%; table-layout: fixed;">
    <thead>
    <tr >
        <th width="10%">Sl</th>
        <th width="20%">About</th>
        <th width="25%">Refund</th>
        <th width="25%">Terms</th>
        <th width="20%">Privacy</th>
        <th width="20%">Action</th> 
        
    </thead>


    <tbody>
    	 
    	@foreach($informations as $key => $item)
    <tr>
        <td> {{ $key+1}} </td>
        <td > {{ $item->about }} </td> 
        <td> {{ $item->refund }} </td> 
        <td> {{ $item->terms }} </td> 
        <td> {{ $item->privacy }} </td> 
        
        <td>
<a href="{{route('information.edit',$item->id)}}" class="btn btn-info sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>

<a href="{{route('information.delete',$item->id)}}" class="btn btn-danger sm" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>

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