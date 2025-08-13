<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Information;
use Illuminate\Support\Carbon;

class InformationController extends Controller
{
     
    public function InformationAll(){
        $informations = Information :: get();
        return view('backend.information.information_all',compact('informations'));
    }

    public function InformationAdd(){
        return view('backend.information.information_add');
    }

    public function InformationStore(Request $request){
      
		Information::insert([
		   'about' => $request->about,
		   'refund' => $request->refund,
		   'terms' => $request->terms,
		   'privacy' => $request->privacy,
		   'created_at' => Carbon::now(),
			  ]);
		
		   $notification = array(
		   'message' => 'Information Inserted Successfully',
		   'alert-type' => 'success'
	 );
  
		   return redirect()->route('information.all')->with($notification);
		
	 }

     public function InformationEdit($id){
		$informations = Information::findOrFail($id);
		return view('backend.information.information_edit', compact('informations'));
   }

   public function InformationUpdate(Request $request){
         
	$information_id = $request->id;
	Information::findOrFail($information_id)->update([
	    'about' => $request->about,
        'refund' => $request->refund,
        'terms' => $request->terms,
        'privacy' => $request->privacy,
        'updated_at' => Carbon::now(),
		  ]);
	
	   $notification = array(
	   'message' => 'Information Updated Successfully',
	   'alert-type' => 'success'
 );

	   return redirect()->route('information.all')->with($notification);
	
 }

    public function InformationDelete($id){
	Information::findOrFail($id)->delete();
	$notification = array(
	   'message' => 'Information Deleted Successfully',
	   'alert-type' => 'success'
  );

	   return redirect()->back()->with($notification);    
 
 } 

 


    public function onAllSelect()
    {
    	$result = Information::all();
    	return $result;
    }
}
