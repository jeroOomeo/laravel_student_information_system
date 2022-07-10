<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\College;
use App\Models\Program;
use App\Models\Course;
use App\Models\Admin;
use App\Models\Enrollee;


class EnrolleeController extends Controller
{
    
    public function index(){

        $enrollees = Enrollee::join('colleges', 'colleges.id', '=', 'enrollees.college_id')
                            ->join('programs','programs.id', '=', 'enrollees.program_id')
                            ->join('courses','courses.id' ,'=',  'enrollees.course_id')
                            ->get(['enrollees.id', 'enrollees.id_number', 'enrollees.first_name', 'enrollees.last_name',
                                    'colleges.acronym', 'programs.abbreviation', 'courses.code', 'courses.name', 'enrollees.created_at']);
    

        return view('enrollee.index', compact('enrollees'));
    }

    public function show($id){        
        $enrollee = Enrollee::join('colleges', 'colleges.id', '=', 'enrollees.college_id')
                            ->join('programs','programs.id', '=', 'enrollees.program_id')
                            ->join('courses','courses.id' ,'=',  'enrollees.course_id')
                            ->where('enrollees.id', $id)
                            ->first(['enrollees.id', 'enrollees.id_number', 'enrollees.first_name', 'enrollees.last_name',
                                    'colleges.acronym', 'programs.abbreviation', 'courses.code', 'courses.name', 'enrollees.created_at']);
        
        return view('enrollee.show', compact('enrollee')); 
    }
    public function create(){

        $colleges['data'] = College::orderby("name","asc")
        ->select('id','name')
        ->get();

        return view('enrollee.create',compact('colleges'));
    }

    public function store(Request $request){

        $input = $request->all();
        

        // ['first_name','last_name','id_number','college_id','program_id','course_id']
         $enrollee = new Enrollee();
         $enrollee->first_name = $request->input('fname');
         $enrollee->last_name = $request->input('lname');
         $enrollee->id_number = $request->input('student_no');
         $enrollee->college_id = $request->input('sel_col');
         $enrollee->program_id = $request->input('sel_pro');
         $enrollee->course_id = $request->input('sel_cor');
         
        $enrollee->save();
        return redirect('/enrollees')->with('mssg', 'The student successfully enrolled!');
         //return redirect('/enrollees')->with('mssg', 'The student');
    }

    public function destroy($id){
        $enrollee = Enrollee::findOrFail($id);
        $enrollee->delete();

        return redirect('/enrollees');
    }

    public function edit($id){
        $colleges['data'] = College::orderby("name","asc")
        ->select('id','name')
        ->get();

        $enrollee = Enrollee::find($id);
        return view('enrollee.edit',compact('colleges'),compact('enrollee'));
    }
    
    public function update(Request $request, $id){

        $input = $request->all();
        
        // ['first_name','last_name','id_number','college_id','program_id','course_id']
         $enrollee = Enrollee::find($id);
         $enrollee->first_name = $request->input('fname');
         $enrollee->last_name = $request->input('lname');
         $enrollee->id_number = $request->input('student_no');
         $enrollee->college_id = $request->input('sel_col');
         $enrollee->program_id = $request->input('sel_pro');
         $enrollee->course_id = $request->input('sel_cor');
         
        $enrollee->save();
        return redirect('/enrollees')->with('mssg', 'The student successfully enrolled!');
         //return redirect('/enrollees')->with('mssg', 'The student');
    }

    public function getColleges(){
        $colleges['data'] = College::orderby("id","asc")
        ->select('id','name','acronym')
        ->get();

        return view('enrollee.colleges',compact('colleges'));
    }   
    public function getPrograms(){
        $programs['data'] = Program::orderby("id","asc")
        ->select('id','name','abbreviation')
        ->get();

        return view('enrollee.programs',compact('programs'));
    } 
    public function getCourses(){
        $courses['data'] = Course::orderby("id","asc")
        ->select('id','name','code')
        ->get();

        return view('enrollee.courses',compact('courses'));
    }   

    public function login(){
        return view('auth.login');
    }
    public function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return view('auth.login');
        }else{
            return view('auth.login');
        }
      
    }


    public function check(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|max:12'
        ]);

        $userInfo = Admin::where('email', "=" , $request->email)->first();

        
        if(!$userInfo){
            return back()->with('fail', 'Email address does not recognized');
        }else{
            if($request->password === $userInfo->password){
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect('/enrollees');
            }else{
                return back()->with('fail', 'Incorrect password');
            }
        }
    }
}



