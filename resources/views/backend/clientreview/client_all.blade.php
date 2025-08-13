@extends('admin.admin_master')
@section('admin')


<div class="page-content">
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Client All</h4>

                 

            </div>
        </div>
    </div>
    <!-- end page title -->
    
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">

    <a href="{{ route ('client.add') }}" class="btn btn-dark btn-rounded waves-effect waves-light" 
    style="float:right;"><i class="fas fa-plus-circle"> Add Client </i></a><br><br>

<h4 class="card-title">Client All Data </h4>


<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%; table-layout: fixed;">
    <thead>
    <tr>
        <th width="20%">Sl</th>
        <th width="20%">ClientTitle</th>
        <th width="20%">ClientImage</th> 
        <th width="20%">Client Description</th>  
        <th width="20%">Action</th> 
        
    </thead>


    <tbody>
    	 
    	@foreach($clients as $key => $item)
    <tr>
        <td> {{ $key+1}} </td>
        <td> {{ $item->client_title }} </td> 
        <td> <img src="{{asset( $item->client_img) }}" style="width: 60px; height: 50px"> </td> 
        <td> {{ $item->client_description }} </td> 
        
         
        
        <td>
<a href="{{ route ('client.edit',$item->id) }}" class="btn btn-info sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>

<a href="{{ route ('client.delete',$item->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>

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