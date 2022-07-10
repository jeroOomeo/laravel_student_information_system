<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\College;
use App\Models\Program;
use App\Models\Course;
use App\Models\Admin;

class CollegeController extends Controller {

   public function index(){
     // Fetch colleges
     $colleges['data'] = College::orderby("name","asc")
         ->select('id','name')
         ->get();

     // Load index view
     //return compact('colleges');
     return view('enrollee.create',compact('colleges'));
   }

   // Fetch records
   public function getPrograms($collegeid=0){

     // Fetch Employees by Departmentid
     $programData['data'] = Program::orderby("name","asc")
        ->select('id','name')
        ->where('college_id',$collegeid)
        ->get();

     return response()->json($programData);

   }

   public function getCourses($programid=0){

    $courseData['data'] = Course::orderby("name","asc")
    ->select('id','name')
    ->where('program_id',$programid)
    ->get();

    //return $courseData;
    return response()->json($courseData);
   }
}