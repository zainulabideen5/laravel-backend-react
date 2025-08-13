<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Carbon;

class ContactController extends Controller
{
    public function ContactAll(){
		$contacts = Contact::get();
		 return view('backend.contact.contact_all',compact('contacts'));
	 } // End Method
     
	 public function ContactAdd(){
		return view('backend.contact.contact_add');
	}

	public function ContactStore(Request $request){
      
		Contact::insert([
		   'name' => $request->name,
		   'email' => $request->email,
		   'message' => $request->message,
		   'created_at' => Carbon::now(),
			  ]);
		
		   $notification = array(
		   'message' => 'Contact Inserted Successfully',
		   'alert-type' => 'success'
	 );
  
		   return redirect()->route('contact.all')->with($notification);
		
	 }

	 public function ContactEdit($id){
		$contact = Contact::findOrFail($id);
		return view('backend.contact.contact_edit', compact('contact'));
   }

   public function ContactUpdate(Request $request){
         
	$contact_id = $request->id;
	Contact::findOrFail($contact_id)->update([
	   'name' => $request->name,
		'email' => $request->email,
		'message' => $request->message,
	   'updated_at' => Carbon::now(),
		  ]);
	
	   $notification = array(
	   'message' => 'Contact Updated Successfully',
	   'alert-type' => 'success'
 );

	   return redirect()->route('contact.all')->with($notification);
	
 }

 public function ContactDelete($id){
	Contact::findOrFail($id)->delete();
	$notification = array(
	   'message' => 'Contact Deleted Successfully',
	   'alert-type' => 'success'
  );

	   return redirect()->back()->with($notification);    
 
 } 
  
  
 
 


    public function onContactSend(Request $request)
    {
		$contactArray = json_decode($request->getContent(), true);
		$name = $contactArray['name'];
		$email = $contactArray['email'];
		$message = $contactArray['message'];
		
		$result = Contact::insert([
    		'name' => $name,
    		'email' => $email,
    		'message' => $message,
    	]);
    	if ($result == true) {
    		return 1;
    	} else {
    		return 0;
    	}
    }
}
