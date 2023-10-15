<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Guest;
use App\Models\Program;
use App\Models\Status;
use App\Models\Student;
use App\Models\Window;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    function login(Request $req){
        $req->validate([
            "emailguest"=>"required",
            "passwordguest"=>"required",
        ]);
        $login = new Guest();
        $pass = md5($req->input('passwordguest')); 
        
        if($login->where('email',$req->input('emailguest'))->first()){
            if($login->where('password',$pass)->first()){
              //SUCCESS
              
              $fname = $login->where('email',$req->input('emailguest'))->first();
              $ffname = $fname->firstname;
              $mname = $fname->middlename;
              $sname = $fname->surname;
              $fullname = "Hello ".$ffname.' '.$sname; 
              $win = new Window();
              $appointment = new Appointment();
              $wins = Appointment::with(['times','wind','sched','status','guests'])->get();
                // return $wins;
              return view('guestsetAppoint',['status'=>Status::get(),'name'=>$fullname,'id'=>$fname->id,'window'=>$win->all(),'apps'=>$wins]);
            }else{
              //ERROR
              $guestId = new Guest();
              $student = new Student();
              $students = $student->orderBy('studentId','DESC')->first();
              $id = $guestId->orderBy('id','DESC')->first();
               return view('main',['prog'=>Program::all(),'studentId'=>$students->studentId+1,'active'=>'dashboard','id'=>$id,'popups'=>true,"msg"=>"Wrong Password"]);
            }
          
        }else{
            //WRONG EMAIL
            $guestId = new Guest();
              $id = $guestId->orderBy('id','DESC')->first();
              $student = new Student();
              $students = $student->orderBy('studentId','DESC')->first();
               return view('main',['prog'=>Program::all(),'studentId'=>$students->studentId+1,'active'=>'dashboard','id'=>$id,'popups'=>true,"msg"=>"Wrong Email"]);
        }
    }
}
