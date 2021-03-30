<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Employee;
#To Communicate with VueJs 
class ApiController extends Controller
{
    public function employees(){
        $employees = DB::table('employees as e')
                        ->select('e.id','e.name', 'e.email', 'e.password', 'e.gender', 'e.is_active', 'e.date_of_birth', 'e.role')
                        ->get(); 
        // dd($products);
        if($employees){ 
            $error = false;
            $msg = "Data Retrived";
        }
        else{
            $error = true;
            $msg = "No Data Found";
        }
        return response()->json([
            'employees'=> $employees,
            'error'=> $error,
            'msg'=> $msg
        ]);
    }

    public function insert(Request $request) {
        $obj = new Employee();
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->password = $request->password;
        $obj->gender = $request->gender;
        $obj->is_active = $request->is_active;
        $obj->date_of_birth = $request->date_of_birth;
        $obj->role = $request->role;
        if($obj->save()) {
            return response()->json([
                'data'=> $obj,
                'msg'=> "Employee Information successfully Inserted"
            ]);
        }
    }

    public function edit($id){ //show aviewfor specific employee
        // $employee = Employee::where('id','=',$id)->get(); //return array
        $employee = Employee::find($id); //return obj
        return response()->json([
            'employee'=> $employee
        ]);
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
            return response()->json([
                'employee'=> $obj,
                'msg'=> "Information Updated"
            ]);
        }
    }
}
