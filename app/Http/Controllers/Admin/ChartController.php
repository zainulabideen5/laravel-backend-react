<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chart;
use Auth;
use Illuminate\Support\Carbon;

class ChartController extends Controller
{
   public function ChartAll(){
      $charts = Chart::get();
       return view('backend.chart.chart_all',compact('charts'));
   } // End Method

   public function ChartAdd(){
      return view('backend.chart.chart_add');
  }
   public function ChartStore(Request $request){
      
      Chart::insert([
         'Techonology' => $request->Techonology,
         'Projects' => $request->Projects,
         'created_at' => Carbon::now(),
            ]);
      
         $notification = array(
         'message' => 'Charts Inserted Successfully',
         'alert-type' => 'success'
   );

         return redirect()->route('chart.all')->with($notification);
      
   }

   public function ChartEdit($id){
      $chart = Chart::findOrFail($id);
      return view('backend.chart.chart_edit', compact('chart'));
 }
     
   public function ChartUpdate(Request $request){
         
      $chart_id = $request->id;
    	Chart::findOrFail($chart_id)->update([
         'Techonology' => $request->Techonology,
         'Projects' => $request->Projects,
         'updated_at' => Carbon::now(),
            ]);
      
         $notification = array(
         'message' => 'Charts Updated Successfully',
         'alert-type' => 'success'
   );

         return redirect()->route('chart.all')->with($notification);
      
   }
    
   public function ChartDelete($id){
      Chart::findOrFail($id)->delete();
      $notification = array(
         'message' => 'Chart Deleted Successfully',
         'alert-type' => 'success'
    );
 
         return redirect()->back()->with($notification);    
   
   } 



     public function onAllSelect(){
        $result = Chart::all();
        return $result;
     }
}
