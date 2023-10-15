<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class EmployeeController extends Controller
{
    //
    function employee(){
        $employee = new Employee();
        $datas = ['active'=>'employee','employee'=>$employee->all(),'shows'=>'none','success'=>'','show'=>'close','image'=>'',
        'firstname'=>'','middlename'=>'','lastname'=>'','position'=>'',
        'age'=>'','gender'=>'','contact'=>'','address'=>'','id'=>''];

        return view('employee',$datas);
    }

    function addemployee(Request $request){
        $request->validate([
            "image"=>"required",
            "fname"=>"required",
            "mname"=>"required",
            "sname"=>"required",
            "age"=>"required",
            "gender"=>"required",
            "position"=>"required",
            "contact"=>"required",
            "address"=>"required",
        ]);
        $employee = new Employee();

        $fileName = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('images',$fileName,'public');
        $mainPath = '/storage/'.$path;
        
        $employee->firstname= $request->input('fname');
        $employee->middlename=$request->input('mname');
        $employee->lastname=$request->input('sname');
        $employee->position=$request->input('position');
        $employee->age=$request->input('age');
        $employee->gender=$request->input('gender');
        $employee->contact=$request->input('contact');
        $employee->address=$request->input('address');
        $employee->image=$mainPath;
        $employee->save();
     
        $datas = ['active'=>'employee','employee'=>$employee->all(),'shows'=>'none','success'=>'Employee Added Succesfully!','show'=>'close','image'=>'',
                'firstname'=>'','middlename'=>'','lastname'=>'','position'=>'',
                'age'=>'','gender'=>'','contact'=>'','address'=>'','id'=>''];

        return redirect()->route('employee')->with($datas);

    }

    function deleteemployee($id){
        $employee = new Employee();
        $employee->where('employeeNo',$id)->delete();
        $datas = ['active'=>'employee','employee'=>$employee->all(),'shows'=>'none','success'=>'Employee Delete Succesfully!','show'=>'close','image'=>'',
        'firstname'=>'','middlename'=>'','lastname'=>'','position'=>'',
        'age'=>'','gender'=>'','contact'=>'','address'=>'','id'=>''];
        return redirect()->route('employee')->with($datas);

    }

    function viewemployee($id){
        $employee  = new Employee();
        $data = $employee->where('employeeNo',$id)->first();
        $datas = ['active'=>'employee','employee'=>$employee->all(),'success'=>'','show'=>'show','shows'=>'none','image'=>$data->image,
        'firstname'=>$data->firstname,'middlename'=>$data->middlename,'lastname'=>$data->lastname,'position'=>$data->position,
        'age'=>$data->age,'gender'=>$data->gender,'contact'=>$data->contact,'address'=>$data->address ,'id'=>''];
        return view('employee',$datas);

    }

    function editemployee(Request $request,$id){
       
        $employee = new Employee();

        $data = $employee->where('employeeNo',$id)->first();
        $datas = ['active'=>'employee','employee'=>$employee->all(),'success'=>'','show'=>'close','shows'=>'show','image'=>$data->image,
        'firstname'=>$data->firstname,'middlename'=>$data->middlename,'lastname'=>$data->lastname,'position'=>$data->position,
        'age'=>$data->age,'gender'=>$data->gender,'contact'=>$data->contact,'address'=>$data->address,'id'=>$id];
        return view('employee',$datas);

    }

    function saveemployee(Request $request){
        $request->validate([
            "id"=>"required",
            "uimage"=>"required",
            "ufname"=>"required",
            "umname"=>"required",
            "usname"=>"required",
            "uage"=>"required",
            "ugender"=>"required",
            "uposition"=>"required",
            "ucontact"=>"required",
            "uaddress"=>"required",
        ]);
              $employee = new Employee();

        $fileName = $request->file('uimage')->getClientOriginalName();
        $path = $request->file('uimage')->storeAs('images',$fileName,'public');
        $mainPath = '/storage/'.$path;
        $dat = $employee->where('employeeNo',$request->input('id'))->first();
        $dat->firstname= $request->input('ufname');
        $dat->middlename=$request->input('umname');
        $dat->lastname=$request->input('usname');
        $dat->position=$request->input('uposition');
        $dat->age=$request->input('uage');
        $dat->gender=$request->input('ugender');
        $dat->contact=$request->input('ucontact');
        $dat->address=$request->input('uaddress');
        $dat->image=$mainPath;
        
        $dat->save();


        return redirect()->route('employee');

    }
}
