<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class SignUpController extends Controller
{
    function guest(Request $request){
        $guest = new Guest();

        $request->validate([
            'guestid'=>'required',
            'firstName'=>'required|string',
            'middleName'=>'required|string',
            'surName'=>'required|string',
            'emailGuest'=>'required|string',
            'passwordGuest'=>'required|string',
        ]);
        $guest->firstname = $request->input('firstName');
        $guest->middlename = $request->input('middleName');
        $guest->surname = $request->input('surName');
        $guest->email = $request->input('emailGuest');
        $guest->password = md5($request->input('passwordGuest'));
        $guest->save();
        return redirect('/');
    }
}
