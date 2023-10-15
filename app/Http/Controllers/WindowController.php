<?php

namespace App\Http\Controllers;

use App\Models\Window;
use Illuminate\Http\Request;

class WindowController extends Controller
{
    
    function addWindow(Request $req ){
        $req->validate([
            'windowname'=>'required',
            'windowno'=>'required',
            'transactiondata'=>'required',
        ]);
        $window = new Window();
        $window->windowname= $req->input('windowname');
        $window->windowno= $req->input('windowno');
        $window->transaction= $req->input('transactiondata');
        $window->save();
        return redirect()->route('windowmanagement');

    }

    function deleteWindow($id){
        $window = new Window();
        $window->find($id)->delete();
        return redirect()->route('windowmanagement');
    }
}
