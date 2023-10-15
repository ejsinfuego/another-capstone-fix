<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Program;
use App\Models\Status;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    function dashboard(){
        return redirect()->route('home');
    }

    function settings(){
        $program = new Program();
        return view('settings',['active'=>'','red'=>'project','program'=>$program->orderBy('id','DESC')->get(),'selected'=>'']);
  
    }

    function history(){
        $wins = Appointment::with(['times','wind','sched','status','guests','students'])->get();
     
        return view('history',['active'=>'history','red'=>'history','apps'=>$wins,'status'=>Status::get()]);
  
    }
}
