<?php

use App\Models\Guest;
use App\Models\Program;
use App\Models\Student;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\TimeControlller;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\WindowController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\settingsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AppointmentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $guestId = new Guest();
    $program = new Program();
 
    $id = $guestId->orderBy('id','DESC')->first();
    $student = new Student();
    $students = $student->orderBy('studentId','DESC')->first();
    $stuno = $students ? $students->studentId+1 : 1;
    $ids = $id ? $id-> guestId+ 1 : 1;
     return view('main',['prog'=>$program->all(),
     'studentId'=>$stuno,
     'active'=>'dashboard',
     'id'=>$ids,
     'popups'=>false,'msg'=>''
    ]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/{studentid}', [HomeController::class, 'studentProfile'])->name('guesthome');

Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
Route::get('/settings',[DashboardController::class,'settings'])->name('settings');
Route::get('/history',[DashboardController::class,'history'])->name('history');

Route::get('/guest',[SignUpController::class,'guest'])->name('guest');
Route::get('/student',[StudentController::class,'student'])->name('student');

Route::get('/settings/program',[settingsController::class,'program'])->name('programmanagement');
Route::get('/settings/time',[settingsController::class,'time'])->name('timemanagement');
Route::get('/settings/schedule',[settingsController::class,'schedule'])->name('schedulemanagement');
Route::get('/settings/window',[settingsController::class,'window'])->name('windowmanagement');

//Add Program
Route::get('/addProgram',[settingsController::class,'addProgram'])->name('addProgram');

//View Program
Route::get('/Program',[settingsController::class,'select'])->name('selectProgram');


//DELETE PROGRAM
Route::get('/Program/{id}',[settingsController::class,'delete'])->name('deleteProgram');

//ADD TIME
Route::get('/addTime',[TimeControlller::class,'addTime'])->name('addTime');



Route::get('/addSched',[ScheduleController::class,'addSched'])->name('addSched');
Route::get('/Times/{id}',[ScheduleController::class,'deleteSched'])->name('deletesched');


//WINDOW
Route::get('/addWindow',[WindowController::class,'addWindow'])->name('addWindow');
Route::get('/window/{id}',[WindowController::class,'deleteWindow'])->name('deleteWindow');


//LOGIN GUEST
Route::get('/login/guest',[GuestController::class,'login'])->name('guestLogin');

//STUDENT LOGIN
Route::get('/login/student',[StudentController::class,'login'])->name('studentLogin')->middleware(['auth','verified']); 



//EMPLOYEE
Route::get('/employee',[EmployeeController::class,'employee'])->name('employee');
Route::post('/newemployee',[EmployeeController::class,'addemployee'])->name('addEmployee');
Route::get('/deleteEmploye/{id}',[EmployeeController::class,'deleteemployee'])->name('deleteEmployee');
Route::get('/viewEmploye/{id}',[EmployeeController::class,'viewemployee'])->name('viewEmployee');
Route::get('/editEmploye/{id}',[EmployeeController::class,'editemployee'])->name('editEmployee');
Route::post('/saveEmploye',[EmployeeController::class,'saveemployee'])->name('saveEmployee');

Route::get('/appointment/{Studentid}',[AppointmentController::class,'index'])->name('index');
Route::get('/guestappointment/{id}',[AppointmentController::class,'indexs'])->name('indexs');
Route::get('/tor/{Studentid}',[AppointmentController::class,'tor'])->name('tor');


//DELETE TIME
Route::get('/Time/{id}',[TimeControlller::class,'deleteTime'])->name('deleteTimes');

Route::get('/transact/{studentid}/{window}',[AppointmentController::class,'transactStudent'])->name('request');
Route::get('/guesttransact/{id}/{window}',[AppointmentController::class,'transactGuest'])->name('requests');
Route::get('/setTransact',[AppointmentController::class,'transacts'])->name('setTransact');
Route::get('/setTransacts',[AppointmentController::class,'guesttransacts'])->name('setTransacts');
Route::get('/approveTransacts/{id}',[AppointmentController::class,'approvetransacts'])->name('approve');
Route::get('/denyTransacts/{id}',[AppointmentController::class,'denytransact'])->name('deny');

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});