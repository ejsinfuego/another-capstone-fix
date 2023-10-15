<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Schedule;
use App\Models\Time;
use App\Models\Window;
use Illuminate\Http\Request;

class settingsController extends Controller
{
    
    function program(){
        $program = new Program();
        return view('settings',['active'=>'','red'=>'project','program'=>$program->orderBy('id','DESC')->get(),'selected'=>'']);
    }

    function time(){
        $time = new Time();
        return view('time',['active'=>'','red'=>'time','time'=>$time->all()]);
    }

    function schedule(){
        $sched = new Schedule();
        return view('schedule',['active'=>'','red'=>'sched','sched'=>$sched->all()]);
    }

    function window(){
        $window = new Window();
        return view('window',['active'=>'','red'=>'window','window'=>$window->all()]);
        
    }

    function addProgram(Request $req){
        $req->validate(['addPrograms'=>'required|string']);
        $program = new Program();
        $program->program_name = $req->input('addPrograms');
        $program->save();
        return redirect()->route('programmanagement');
    }

    function select(Request $req){
        $req->validate(['program'=>'required|string']);
        $program = new Program();

        $prgram= $program->find($req->input('program'));
         return view('settings',['active'=>'','red'=>'project','program'=>$program->orderBy('id','DESC')->get(),'selected'=>$prgram]);

    }

    function delete($id){
        $program = new Program();
        $program->find($id)->delete();
        return view('settings',['active'=>'','red'=>'project','program'=>$program->orderBy('id','DESC')->get(),'selected'=>'']);
    }
}
