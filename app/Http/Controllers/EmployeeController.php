<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Session;
class EmployeeController extends Controller
{
    public function dash() { 
        if(Session::has('username')) {
            return redirect()->back()->with('msg','Log Out First to get back to Dashboard!');
        }
        return view('dashboard');
    }
    public function login() { 
        if(Session::has('username')) {
            return redirect()->back();
        }
        return view('auth.pages.login');
    }
    public function index() {
        $employees = Employee::all(); // alternative to -> select * from employees
        //dd($data); //break statement
        return view('crud.pages.employees',compact('employees'));
    }
    public function insert() { 
        return view('crud.pages.insert');
    }
    public function store(Request $request) { //insert data into DB tables
        // $name = $request->name;
        // $email = $request->email;
        // $address = $request->address;
        // $age = $request->age;
        // echo $name.'<br>'.$email.'<br>'.$address.'<br>'.$age;
        $obj = new Employee();
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->password = $request->password;
        $obj->gender = $request->gender;
        $obj->is_active = $request->is_active;
        $obj->date_of_birth = $request->date_of_birth;
        $obj->role = $request->role;
        if($obj->save()) {
            return redirect()->to('employees');
        }
    }
    public function edit($id){ //show aviewfor specific employee
        // $employee = Employee::where('id','=',$id)->get(); //return array
        $employee = Employee::find($id); //return obj
        return view('crud.pages.edit',compact('employee'));
    }
    public function update(Request $request,$id){ 
        $obj = Employee::find($id);
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->password = $request->password;
        $obj->gender = $request->gender;
        $obj->is_active = $request->is_active;
        $obj->date_of_birth = $request->date_of_birth;
        $obj->role = $request->role;
        if($obj->save()) {
            return redirect()->to('employees');
        }
        
    }
    public function delete($id){ //show aviewfor specific employee
        // $employee = Employee::where('id','=',$id)->get(); //return array
        $obj = Employee::find($id); //return obj
        if($obj->delete()){
            return redirect()->to('employees');
        }
    }
}
