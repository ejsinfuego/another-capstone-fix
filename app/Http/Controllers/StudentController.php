<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Program;
use App\Models\Status;
use App\Models\Student;
use App\Models\Window;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //SIGN UP OF STUDENT
    function student(Request $req){
        $req->validate([
            'studentid'=>'required',
            'firstName'=>'required|string',
            'middleName'=>'required|string',
            'surName'=>'required|string',
            'selection'=>'required|string',
            'yearLevel'=>'required',
            'password'=>'required',
        ]);
        $student = new Student();

        $student->firstname = $req->input('firstName');
        $student->middlename = $req->input('middleName');
        $student->surname = $req->input('surName');
        $student->program = $req->input('selection');
        $student->yearlevel = $req->input('yearLevel');
        $student->password = md5($req->input('password'));
        $student->save();
        return redirect('/');

    } 

    function login(Request $req){
        $req->validate([
            "studentid"=>"required",
            "studentpassword"=>"required",
        ]);
        $login = new Student();
        $pass = md5($req->input('studentpassword')); 
        
        if($login->where('studentId',$req->input('studentid'))->first()){
            if($login->where('password',$pass)->first()){
              //SUCCESS
              
              $fname = $login->where('studentId',$req->input('studentid'))->first();
              
                $win = new Window();
                $wins = Appointment::with(['times','wind','sched','status'])->get();
             
              return view('setAppoint',['status'=>Status::get(),'apps'=>$wins,'name'=>$fname->studentId,'id'=>$fname->studentId,'window'=>$win->all()]);
            }else{
              //ERROR
              $guestId = new Student();
              $student = new Student();
              $students = $student->orderBy('studentId','DESC')->first();
         
               return view('main',[
                'prog'=>Program::all(),
               'studentId'=>$students->studentId+1,
               'active'=>'dashboard',
               "msg"=>"Wrong Password"]);
            }
          
        }else{
            //WRONG EMAIL
            $guestId = new Student();
            $student = new Student();
            $students = $student->orderBy('studentId','DESC')->first();
              $id = $guestId->orderBy('id','DESC')->first();
               return view('main',['prog'=>Program::all(),'studentId'=>$students->studentId+1,'active'=>'dashboard','id'=>$id,'popups'=>true,"msg"=>"Wrong Student ID"]);
        }
    }
}
