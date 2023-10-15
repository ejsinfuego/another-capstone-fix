<?php

namespace App\Http\Controllers;

use App\Models\Time;
use Illuminate\Http\Request;

   class TimeControlller extends Controller
{
    function addTime(Request $req){
        $req->validate([
            "fromtime"=>"required",
            "totime"=>"required",
            "limit"=>"required",
        ]);


        $time =new Time();
        $time->from = $req->input('fromtime');
        $time->to = $req->input('totime');
        $time->limit = $req->input('limit');
        $time->save();
        return view('time',['active'=>'','red'=>'time','time'=>$time->all()]);


    }

    function deleteTime($id){
        $time = new Time();

        $time->find($id)->delete();
        return view('time',['active'=>'','red'=>'time','time'=>$time->all()]);

    }
}
