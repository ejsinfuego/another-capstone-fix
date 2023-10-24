<?php

namespace App\Http\Controllers;

use App\Models\Window;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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

        //get the id of the new window


        foreach($req->input('requirements') as $requirement){
            DB::table('requirements')->insert([
                'requirement' => $requirement,
                'window_id' => $window->id,
            ]);
        }


        return redirect()->route('windowmanagement');

    }

    function deleteWindow($id){
        $window = new Window();
        $window->find($id)->delete();
        return redirect()->route('windowmanagement');
    }


    // add transaction
    function addTransaction(Window $window, Request $request){
        
        $validated =  $request->validate([
            'transaction' => 'required',
            'window_id' =>'required',

        ]);

        $transaction = DB::table('transaction')->insertGetId([
            'window_id' => $window->id,
            'name' => $validated['transaction'],
        ]);

         $i = 0; //number to map out across the window id input
        foreach($request->input('requirements') as $requirement){
                
                DB::table('requirements')->insert([
                    'requirement' => $requirement,
                    'window_id' => $request->window_id[$i],
                    'transaction_id' => $transaction,
                ]);
                $i = ++$i;
            }
        
        return redirect()->route('home');
        
        
    }
}
