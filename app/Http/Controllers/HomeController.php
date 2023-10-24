<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Guest;
use App\Models\Window;
use App\Models\Program;
use App\Models\Student;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $win = Appointment::with('wind')->get();
        $user = Auth::user()->window_id;
        $request = Appointment::with('student', 'guest', 'schedule', 'time', 'window')->where('windowid',$user)->get();
        $appointments = Appointment::With('student')->get();
        foreach($appointments as $appointment){
            $appointment->student;
        };
        return view('home',['active'=>
        'dashboard', 'app'=>$win,
        'user' => $user,
        //this code below determines the window of the user
        //the $user variable declared above gets the window_id (check the users table, i added wind-id column) and compares it to the window_id column in the appointments table. 
        // nag add ako ng window_id sa appointments table para ma compare ko sa window_id ng user.  
        'appointments'=> $request,
        'windows' =>Window::all(),
        

    ]);
    }   

    public function studentProfile(User $user, Student $student, Request $request){
        $student = $student->where('studentId',$request->studentid)->first();
        $user = Auth::user()->window_id;
        $appointments = Appointment::with('student', 'guest', 'schedule', 'time', 'window')->where('windowid',$user)->get();
        $win = Appointment::with('wind')->get();
        return view('home',['active'=>
        'dashboard', 'app'=>$win,
        //this code below determines the window of the user
        //the $user variable declared above gets the window_id (check the users table, i added wind-id column) and compares it to the window_id column in the appointments table
        'appointments'=> $appointments,
        'student'=>$student,
        'program' => Program::where('id',$student->program)->first(),

    ]);
    }
}
