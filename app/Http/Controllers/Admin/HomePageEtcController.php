<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomePageEtc;
use Illuminate\Support\Carbon;

class HomePageEtcController extends Controller
{
    public function HomePageAll(){
		$homepages = HomePageEtc::get();
		 return view('backend.homepages.homepage_all',compact('homepages'));
	 } // End Method

     public function HomePageAdd(){
		return view('backend.homepages.homepage_add');
	}

    public function HomePageStore(Request $request){
      
		HomePageEtc::insert([
		   'home_title' => $request->home_title,
		   'home_subtitle' => $request->home_subtitle,
		   'tech_description' => $request->tech_description,
		   'total_student' => $request->total_student,
		   'total_course' => $request->total_course,
		   'total_review' => $request->total_review,
		   'video_description' => $request->video_description,
		   'video_url' => $request->video_url,
		   'created_at' => Carbon::now(),
			  ]);
		
		   $notification = array(
		   'message' => 'HomePageETC Inserted Successfully',
		   'alert-type' => 'success'
	 );
  
		   return redirect()->route('homepage.all')->with($notification);
		
	 }

     public function HomePageEdit($id){
		$homepages = HomePageEtc::findOrFail($id);
		return view('backend.homepages.homepage_edit', compact('homepages'));
   }
    
   public function HomePageUpdate(Request $request){
         
	$homepage_id = $request->id;
	HomePageEtc::findOrFail($homepage_id)->update([
        'home_title' => $request->home_title,
        'home_subtitle' => $request->home_subtitle,
        'tech_description' => $request->tech_description,
        'total_student' => $request->total_student,
        'total_course' => $request->total_course,
        'total_review' => $request->total_review,
        'video_description' => $request->video_description,
        'video_url' => $request->video_url,
	     'updated_at' => Carbon::now(),
		  ]);
	
	   $notification = array(
	   'message' => 'HomePageETC Updated Successfully',
	   'alert-type' => 'success'
 );

	   return redirect()->route('homepage.all')->with($notification);
	
 }
 public function HomePageDelete($id){
	HomePageEtc::findOrFail($id)->delete();
	$notification = array(
	   'message' => 'HomePageETC Deleted Successfully',
	   'alert-type' => 'success'
  );

	   return redirect()->back()->with($notification);    
 
 } 


 



    public function SelectVideo()
    {
    	$result = HomePageEtc::select('video_description', 'video_url')->get();
    	return $result;
    }

    public function SelectTotalHome()
    {
    	$result = HomePageEtc::select('total_student', 'total_course', 'total_review')->get();
    	return $result;
    }

    public function SelectTechHome()
    {
    	$result = HomePageEtc::select('tech_description')->get();
    	return $result;
    }

    public function SelectHomeTitle()
    {
    	$result = HomePageEtc::select('home_title', 'home_subtitle')->get();
    	return $result;
    }
}
