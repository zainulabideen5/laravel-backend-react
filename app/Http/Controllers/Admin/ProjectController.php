<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projects;
use Illuminate\Support\Carbon;
use Image;
class ProjectController extends Controller
{
     
    public function ProjectAll(){
        $projects = Projects :: get();
        return view('backend.project.project_all',compact('projects'));
    }

    public function ProjectAdd(){
        return view('backend.project.project_add');
    }

    public function ProjectStore(Request $request) {
        $image = $request->file('img_one');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(200,200)->save('upload/project/img one/'.$name_gen);
        $save_url_img1 = 'upload/project/img one/'.$name_gen;  // Changed variable name
        
        $images = $request->file('img_two');
        $name_gen2 = hexdec(uniqid()).'.'.$images->getClientOriginalExtension();  // Changed variable name
        Image::make($images)->resize(200,200)->save('upload/project/img two/'.$name_gen2);
        $save_url_img2 = 'upload/project/img two/'.$name_gen2;  // Changed variable name
        
        Projects::insert([
            'project_name' => $request->project_name,
            'project_description' => $request->project_description,
            'project_features' => $request->project_features,
            'live_preview' => $request->live_preview,
            'img_one' => $save_url_img1,  // Use first image URL
            'img_two' => $save_url_img2,  // Use second image URL
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Projects Inserted Successfully',
            'alert-type' => 'success'
           );

       return redirect()->route('project.all')->with($notification);
   }

   public function ProjectEdit($id){
    $projects = Projects::findOrFail($id);
    return view('backend.project.project_edit', compact('projects'));
}

public function ProjectUpdate(Request $request){
    $project_id = $request->id;
    if ($request->file('img_one')) {

     $image = $request->file('img_one');
         $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
           // 343434.png
         Image::make($image)->resize(200,200)->save('upload/project/img one/'.$name_gen);
        $save_url_img1 = 'upload/project/img one/'.$name_gen;
    }
    if ($request->file('img_two')) {

        $image = $request->file('img_two');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
              // 343434.png
            Image::make($image)->resize(200,200)->save('upload/project/img two/'.$name_gen);
           $save_url_img2 = 'upload/project/img two/'.$name_gen;
       
        Projects::findOrFail( $project_id)->update([
         'project_name' => $request->project_name,
        'project_description' => $request->project_description,
        'project_features' => $request->project_features,
        'live_preview' => $request->live_preview,
        'img_one' => $save_url_img1,  // Use first image URL
        'img_two' => $save_url_img2,  // Use first image URL
        'created_at' => Carbon::now(),
           ]);
          $notification = array(
        'message' => 'Project Update with Image Successfully',
        'alert-type' => 'success'
       ); 

        return redirect()->route('project.all')->with($notification);
            } else{ 
         Projects::findOrFail( $project_id)->update([
         'project_name' => $request->project_name,
        'project_description' => $request->project_description,
        'project_features' => $request->project_features,
        'live_preview' => $request->live_preview,
         'created_at' => Carbon::now(),
           ]);
          $notification = array(
        'message' => 'Project Update without Image Successfully',
        'alert-type' => 'success'
       );
        return redirect()->route('project.all')->with($notification);
         }	 	
    }

     public function ProjectDelete($id){
        Projects::findOrFail($id)->delete();
        $notification = array(
           'message' => 'Project Deleted Successfully',
           'alert-type' => 'success'
      );
    
           return redirect()->back()->with($notification);    
     
     } 



    
    

    
  
     


   





    public function onSelectThree()
    {
    	$result = Projects::limit(3)->get();
    	return $result;
    }

    public function onAllSelect()
    {
    	$result = Projects::all();
    	return $result;
    }

    public function ProjectDetails($projectId)
    {
    	$id = $projectId;
    	$result = Projects::where('id', $id)->first();
    	return $result;
    }
}
