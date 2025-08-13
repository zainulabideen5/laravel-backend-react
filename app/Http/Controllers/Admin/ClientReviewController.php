<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClientReview;
use Illuminate\Support\Carbon;
use Image;

class ClientReviewController extends Controller
{
     public function ClientAll(){
          $clients = ClientReview::get();
           return view('backend.clientreview.client_all',compact('clients'));
       } // End Method
      
       public function ClientAdd() {
          return view('backend.clientreview.client_add');
     }
     
     public function ClientStore(Request $request) {
          $image = $request->file('client_img');
          $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            // 343434.png
          Image::make($image)->resize(200,200)->save('upload/client/'.$name_gen);
         $save_url = 'upload/client/'.$name_gen;
 
         ClientReview::insert([
           'client_title' => $request->client_title,
           'client_description' => $request->client_description,
           'client_img' => $save_url,
           'created_at' => Carbon::now(),
          ]);
           $notification = array(
         'message' => 'Client Inserted Successfully',
         'alert-type' => 'success'
        );
 
         return redirect()->route('client.all')->with($notification);
     }
      public function ClientEdit($id) {
          $clients = ClientReview::findOrFail($id);
          return view('backend.clientreview.client_edit', compact('clients'));
     }

     public function ClientUpdate(Request $request){
          $client_id = $request->id;
          if ($request->file('client_img')) {
      
           $image = $request->file('client_img');
               $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                 // 343434.png
               Image::make($image)->resize(200,200)->save('upload/client/'.$name_gen);
              $save_url = 'upload/client/'.$name_gen;
      
              ClientReview::findOrFail( $client_id)->update([
               'client_title' => $request->client_title,
               'client_description' => $request->client_description,
               'client_img' => $save_url,
               'created_at' => Carbon::now(),
               ]);
                $notification = array(
              'message' => 'Client Update with Image Successfully',
              'alert-type' => 'success'
             ); 
      
              return redirect()->route('client.all')->with($notification);
                  } else{ 
                ClientReview::findOrFail( $client_id)->update([
               'client_title' => $request->client_title,
               'client_description' => $request->client_description,
               'created_at' => Carbon::now(),
                 ]);
                $notification = array(
              'message' => 'Client Update without Image Successfully',
              'alert-type' => 'success'
             );
              return redirect()->route('client.all')->with($notification);
               }	 	
          }

          public function ClientDelete($id){
               $clients = ClientReview::findOrFail($id);
               $img = $clients->client_img;
              
         
               ClientReview::findOrFail($id)->delete();
               $notification = array(
                 'message' => 'Client Deleted  Successfully',
                 'alert-type' => 'success'
                );
                 return redirect()->back()->with($notification);
              }
      

         
 

     public function onAllSelect(){
        $result = ClientReview::all();
		return $result;
     }
}
