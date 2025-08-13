<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courses;
use Illuminate\Support\Carbon;
use Image;

class CoursesController extends Controller
{
    public function CoursesAll(){
		$courses = Courses::get();
		 return view('backend.courses.courses_all',compact('courses'));
	 } // End Method

     public function CoursesAdd(){
		return view('backend.courses.courses_add');
	}

    public function CoursesStore(Request $request) {
        $image = $request->file('small_img');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
          // 343434.png
        Image::make($image)->resize(200,200)->save('upload/courses/'.$name_gen);
       $save_url = 'upload/courses/'.$name_gen;

       Courses::insert([
         'long_title' => $request->long_title,
         'short_title' => $request->short_title,
         'long_description' => $request->long_description,
         'short_description' => $request->short_description,
         'total_duration' => $request->total_duration,
         'total_lecture' => $request->total_lecture,
         'total_student' => $request->total_student,
         'skill_all' => $request->skill_all,
         'video_url' => $request->video_url,
         'small_img' => $save_url,
         'created_at' => Carbon::now(),
        ]);
         $notification = array(
       'message' => 'Courses Inserted Successfully',
       'alert-type' => 'success'
      );

       return redirect()->route('courses.all')->with($notification);
   }
    
   public function CoursesEdit($id) {
    $courses = Courses::findOrFail($id);
    return view('backend.courses.courses_edit', compact('courses'));
}
 
public function CoursesUpdate(Request $request){
  $course_id = $request->id;
  if ($request->file('small_img')) {

   $image = $request->file('small_img');
       $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
         // 343434.png
       Image::make($image)->resize(200,200)->save('upload/courses/'.$name_gen);
      $save_url = 'upload/courses/'.$name_gen;

      Courses::findOrFail( $course_id)->update([
         'long_title' => $request->long_title,
         'short_title' => $request->short_title,
         'long_description' => $request->long_description,
         'short_description' => $request->short_description,
         'total_duration' => $request->total_duration,
         'total_lecture' => $request->total_lecture,
         'total_student' => $request->total_student,
         'skill_all' => $request->skill_all,
         'video_url' => $request->video_url,
         'small_img' => $save_url,
         'created_at' => Carbon::now(),
       ]);
        $notification = array(
      'message' => 'Courses Update with Image Successfully',
      'alert-type' => 'success'
     ); 

      return redirect()->route('courses.all')->with($notification);
          } else{ 
            Courses::findOrFail( $course_id)->update([
         'long_title' => $request->long_title,
         'short_title' => $request->short_title,
         'long_description' => $request->long_description,
         'short_description' => $request->short_description,
         'total_duration' => $request->total_duration,
         'total_lecture' => $request->total_lecture,
         'total_student' => $request->total_student,
         'skill_all' => $request->skill_all,
         'video_url' => $request->video_url,
       'created_at' => Carbon::now(),
         ]);
        $notification = array(
      'message' => 'Courses Update without Image Successfully',
      'alert-type' => 'success'
     );
      return redirect()->route('courses.all')->with($notification);
       }	 	
  }

  public function CoursesDelete($id){
    $courses = Courses::findOrFail($id);
    $img = $courses->client_img;
   

    Courses::findOrFail($id)->delete();
    $notification = array(
      'message' => 'Courses Deleted  Successfully',
      'alert-type' => 'success'
     );
      return redirect()->back()->with($notification);
   }





     









    public function onSelectFour()
    {
    	$result = Courses::limit(4)->get();
    	return $result;
    }

    public function onAllSelect()
    {
    	$result = Courses::all();
    	return $result;
    }

    public function onSelectDetails($courseId)
    {
    	$id = $courseId;
    	$result = Courses::where('id', $id)->first();
    	return $result;
    }
}
