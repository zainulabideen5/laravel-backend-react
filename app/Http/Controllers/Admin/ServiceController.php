<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;
use Illuminate\Support\Carbon;
use Image;

class ServiceController extends Controller
{
    public function ServiceAll(){
        $services = Services :: get();
        return view('backend.service.service_all',compact('services'));
    }

    public function ServiceAdd(){
        return view('backend.service.service_add');
    }

    public function ServiceStore(Request $request) {
        $image = $request->file('service_logo');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
          // 343434.png
        Image::make($image)->resize(200,200)->save('upload/service/'.$name_gen);
       $save_url = 'upload/service/'.$name_gen;

       Services::insert([
         'service_name' => $request->service_name,
         'service_description' => $request->service_description,
         'service_logo' => $save_url,
         'created_at' => Carbon::now(),
        ]);
         $notification = array(
       'message' => 'Service Inserted Successfully',
       'alert-type' => 'success'
      );

       return redirect()->route('service.all')->with($notification);
   }

   public function ServiceEdit($id) {
    $services =  Services::findOrFail($id);
    return view('backend.service.service_edit', compact('services'));
}

public function ServiceUpdate(Request $request){
  $services_id = $request->id;
  if ($request->file('service_logo')) {

   $image = $request->file('service_logo');
       $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
         // 343434.png
       Image::make($image)->resize(200,200)->save('upload/service/'.$name_gen);
      $save_url = 'upload/service/'.$name_gen;

      Services::findOrFail( $services_id)->update([
         'service_name' => $request->service_name,
         'service_description' => $request->service_description,
         'service_logo' => $save_url,
         'created_at' => Carbon::now(),
       ]);
        $notification = array(
      'message' => 'Services Update with Image Successfully',
      'alert-type' => 'success'
     ); 

      return redirect()->route('service.all')->with($notification);
          } else{ 
            Services::findOrFail( $services_id)->update([
              'service_name' => $request->service_name,
              'service_description' => $request->service_description,
              'created_at' => Carbon::now(),
                ]);
                $notification = array(
              'message' => 'Services Update without Image Successfully',
              'alert-type' => 'success'
            );
      return redirect()->route('service.all')->with($notification);
       }	 	
    }

    public function ServiceDelete($id){
         $services = Services::findOrFail($id);
         $img = $services->service_logo;
         Services::findOrFail($id)->delete();
         $notification = array(
           'message' => 'Service Deleted  Successfully',
           'alert-type' => 'success'
          );
           return redirect()->back()->with($notification);
        }


   




    public function ServiceView()
    {
    	$services = Services::latest()->get();
    	return $services;
    }
}
