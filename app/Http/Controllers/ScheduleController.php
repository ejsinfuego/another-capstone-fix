<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    function addSched(Request $req){

        $req->validate([
            'desc'=>"required",
            'fromsched'=>"required",
            'tosched'=>"required",
        ]);
        $sched = new Schedule();
        $sched->description = $req->input('desc');
        $sched->from = $req->input('fromsched');
        $sched->to = $req->input('tosched');
        $sched->save();
        return view('schedule',['active'=>'','red'=>'sched','sched'=>$sched->all()]);
        
    }

    function deleteSched($id){
        $sched = new Schedule();
        $sched->find($id)->delete();
        return view('schedule',['active'=>'','red'=>'sched','sched'=>$sched->all()]);

    }
}
