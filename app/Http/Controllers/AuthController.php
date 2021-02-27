<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Session;
class AuthController extends Controller
{
    public function storeLogin(Request $r){
        $email =$r->email;
        $password =$r->password;
        $user = Employee::where('email','=',$email)->where('password','=',$password)->first();
        if($user) {
            // echo 'login succeed---'.$email.' ';
            Session::put('username',$user->name);
            Session::put('userrole',$user->role);
            if($user->role=='admin') {
                return redirect()->to('adminhome');
            }
            else {
                return redirect()->to('employeehome');
            }
        }
        else {
            // echo 'login failed <br>';
            return redirect()->back()->with('err_msg','Invalid Email or Password');
        }
    }
    public function logout() {
        Session::forget(['username','userrole']);
        return redirect()->to('login');
    }
    public function adminhome() {
        return view('auth.pages.adminhome');
    }
    public function employeehome() {
        return view('auth.pages.employeehome');
    }
}
