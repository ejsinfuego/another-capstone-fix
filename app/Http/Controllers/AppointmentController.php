<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Guest;
use App\Models\Schedule;
use App\Models\Status;
use App\Models\Student;
use App\Models\Time;
use App\Models\Window;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class AppointmentController extends Controller
{
    
    function index($studentId){
      $login = new Student();
      $fname = $login->where('studentId',$studentId)->first();
      $win = new Window();
      $status = ["Approved","Pending","Denied"];
      $wins = Appointment::with(['times','wind','sched','status','guests'])->get();
      return view('setAppoint',[
      'status'=>Status::with('appointment')->get(),
      'apps'=>$wins,
      'name'=>$fname->studentId,
      'id'=>$fname->studentId,
      'window'=>$win->all()
    ]);
    }
    function indexs($Id){
      $login = new Guest();
      $fname = $login->where('id',$Id)->first();
      $win = new Window();
      $ffname = $fname->firstname;
      $mname = $fname->middlename;
      $sname = $fname->surname;
      $fullname = "Hello ".$ffname.' '.$sname; 
      $wins = Appointment::with(['times','wind','sched','status','guests'])->get();
      return view('guestsetAppoint',['status'=>Status::get(),'apps'=>$wins,'name'=>$fullname,'id'=>$fname->id,'window'=>$win->all()]);
    }



    function tor($id){
        return redirect()->route('index',$id);
    }


    function transactStudent($id,$window){
      $windows = new Window();
      $data = new Schedule();
      $time = new Time();
      $wins = Appointment::with(['times','wind','sched','status','guests'])->get();
      return view('appoint',['status'=>Status::get(),'apps'=>$wins,'date'=>$data->all(),'time'=>$time->all(),'name'=>$id,'id'=>$id,'window'=>$windows->where('id',$window)->first()]);
    }

    function transactGuest($id,$window){
     
      $windows = new Window();
      $data = new Schedule();
      $time = new Time();
     
      $fname = new Guest();
      $ffname = $fname->firstname;
              $mname = $fname->middlename;
              $sname = $fname->surname;
              $fullname = "Hello ".$ffname.' '.$sname; 
              $wins = Appointment::with(['times','wind','sched','status','guests'])->get();
      return view('appoints',['status'=>Status::get(),'apps'=>$wins,'date'=>$data->all(),'time'=>$time->all(),'name'=>$fullname,'id'=>$id,'window'=>$windows->where('id',$window)->first()]);
    }

    function transacts(Request $req){
      $req->validate([
        'id'=>'required',
        'windowid'=>'required',
        'date-selection'=>'required',
        'time-selection'=>'required',
      ]);
      $app = new Appointment();
      $status = new Status();
      $app->windowid=$req->input('windowid');
      $app->studentid=$req->input('id');
      $app->scheduleid=$req->input('date-selection');
      $app->timeid=$req->input('time-selection');
      $app->category = "student";
      $app->save();
      $apps = Appointment::orderBy('id', 'DESC');
      $id = $apps->first()->id;
      $status->appointment_id = $id;
      $status->save();
       return redirect()->route('index',$req->input('id'));

    }

    function guesttransacts(Request $req){
      $req->validate([
        'id'=>'required',
        'windowid'=>'required',
        'date-selection'=>'required',
        'time-selection'=>'required',
      ]);
      $app = new Appointment();

      $app->windowid=$req->input('windowid');
      $app->guestid=$req->input('id');
      $app->scheduleid=$req->input('date-selection');
      $app->timeid=$req->input('time-selection');
      $app->category = "guest";
      $app->save();

      $fname =new Guest();
      $ffname = $fname->firstname;
      $mname = $fname->middlename;
      $sname = $fname->surname;
      $fullname = "Hello ".$ffname.' '.$sname; 
      $win = new Window();
      $status = new Status();
      $apps = Appointment::orderBy('id', 'DESC');
      $id = $apps->first()->id;
      $status->appointment_id = $id;
      $status->save();
      $wins = Appointment::with(['times','wind','sched','status','guests'])->get();
      return redirect()->route('indexs',$req->input('id'));
    }

    function approvetransacts($id){
    
      $status = new Status();
      $data = $status->where('appointment_id',$id)->first();
      $data->status = 1;
      $data->save();
      $appa = new Appointment();
      $info = $appa->where('id',$id)->first();
      $info->isVisible=1;
      $info->save();
      return redirect()->route('home');

    }
    function denytransact($id){
      $status = new Status();
      $data = $status->where('appointment_id',$id)->first();
      $data->status = 2;
      $data->save();
      $appa = new Appointment();
      $info = $appa->where('id',$id)->first();
      $info->isVisible=1;
      $info->save();
      return redirect()->route('home');
    }
}
