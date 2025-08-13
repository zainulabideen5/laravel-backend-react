<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Footer;
use Illuminate\Support\Carbon;

class FooterController extends Controller
{

    public function FooterAll(){
		$footers = Footer::get();
		 return view('backend.footers.footer_all',compact('footers'));
	 } // End Method

     public function FooterAdd(){
		return view('backend.footers.footer_add');
	}

    public function FooterStore(Request $request){
      
		Footer::insert([
		   'email' => $request->email,
		   'phone' => $request->phone,
		   'facebook' => $request->facebook,
		   'youtube' => $request->youtube,
		   'twitter' => $request->twitter,
		   'footer_credit' => $request->footer_credit,
		   'address' => $request->address,
		   'created_at' => Carbon::now(),
			  ]);
		
		   $notification = array(
		   'message' => 'Footer Inserted Successfully',
		   'alert-type' => 'success'
	 );
  
		   return redirect()->route('footer.all')->with($notification);
		
	 }

     public function FooterEdit($id){
		$footers = Footer::findOrFail($id);
		return view('backend.footers.footer_edit', compact('footers'));
   }

   public function FooterUpdate(Request $request){
         
	$footer_id = $request->id;
	Footer::findOrFail($footer_id)->update([
	  'email' => $request->email,
        'phone' => $request->phone,
        'facebook' => $request->facebook,
        'youtube' => $request->youtube,
        'twitter' => $request->twitter,
        'footer_credit' => $request->footer_credit,
        'address' => $request->address,
	     'updated_at' => Carbon::now(),
		  ]);
	
	   $notification = array(
	   'message' => 'Footer Updated Successfully',
	   'alert-type' => 'success'
 );

	   return redirect()->route('footer.all')->with($notification);
	
 }
  
 public function FooterDelete($id){
	Footer::findOrFail($id)->delete();
	$notification = array(
	   'message' => 'Footer Deleted Successfully',
	   'alert-type' => 'success'
  );

	   return redirect()->back()->with($notification);    
 
 } 






    public function onAllSelect()
    {
    	$result = Footer::all();
    	return $result;
    }
}
