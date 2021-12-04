<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    //login reutrn view
    public function loginIndex(){
        return view('student.login');
    }

    public function loginstudent(Request $request)
    {
        //validatiing passed information
        $loginData = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $me = User::where('email', $loginData['email'])->get()->first();
        // checks number of logs
        if($me != ''){
            //verify password
            if(password_verify($loginData['password'], $me->password)){
                //create session and redirect
                session()->put('student_idx',$me->studentid);
                return redirect('student/myprofile')->with(['success' => 'Welcome Back']);
            }else{ return back()->with('error', 'incorrect password'); }
        }else{ return back()->with('error', 'Invalid email address'); }
        //return response($me->firstname);
    }




}
