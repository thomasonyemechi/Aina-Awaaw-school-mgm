<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    

    function getAdminStatus(Request $request){
        $id = $request['status'];
        $status = (getAdmin($id,'status') ==  1) ? 0 : 1;
        Admin::where('sn' , $id)->update([
            'status' => $status,
        ]);
        return back()->with('success', 'Sucessfully Updated');
    }


    function updatePermission(Request $request){
        //return response($request);
        $staff = Admin::where('level','<',10)->orderby('lastname','ASC')->paginate(100); $i=1;
        foreach($staff as $key){ $i++;
            Admin::where('sn' , $request['id'.$i])->update([
                'p1' => $request['admin'.$i],
                'p2' => $request['teach'.$i],
                'p3' => $request['cbt'.$i],
            ]);
        }

        return back()->with('success', 'Profile Sucessfully Updated');
    }



    function getStaffId(Request $request)
    {
        session()->put('staffid', $request['staffid']);
        //return response($request['staffid']);
        return redirect('staffprofile');
    }




    public function adminUpdate(Request $request){
        $this->validate($request, [
            'firstname'=> 'required',
            'lastname'=> 'required',
            'role'=> 'required',
            'address'=> 'required', 
            'city'=> 'required',
            'gender'=> 'required',
            'phone'=> 'required',
            'email'=> 'required|email',
        ]);

        Admin::where('sn', $request['staffid'])->update([
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'level' => $request['role'],
            'city' => $request['city'],
            'gender' => $request['gender'],
            'address' => $request['address'],
        ]);

        return back()->with('success', 'Staff Profile Updated Sucessfully');
       
    }



    public function updateStaffImg(Request $request){
        $id = $request['staffid'];
        $loc = $_FILES['photo']['tmp_name'];
        $type = $_FILES['photo']['type'];

        $ext = explode('/', $type);
            $ext = strtolower(end($ext));
            if ($new_name = imagetype($ext)) {
                $new_name = $id .time(). '.' . $ext;
                Admin::where('sn', $id)->update(['image' => $new_name]);
                
                move_uploaded_file($loc,'assets/images/'.$new_name);
                return back()->with('success',"Picture Successfully Updated");
            } else {
                return redirect('generalsetup')->with('error',"Image Must Be in Jpeg,Jpg or Png Format"); }
    }




    public function adminregistration(){
        return view('adminregister');
    }
    public function adminlogin(){
        return view('adminlogin');
    }
    public function admindashboard(){
        return view('admin/admindashboard');
    }


    public function adminstore(Request $request){
        $this->validate($request, [
            'firstname'=> 'required',
            'lastname'=> 'required',
            'role'=> 'required',
            'address'=> 'required', 
            'city'=> 'required',
            'gender'=> 'required',
            'phone'=> 'required',
            'email'=> 'required|email|unique:admin',
        ]);

        Admin::create([
            'id' => $this->win_hashs(5),
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'level' => $request['role'],
            'password' => bcrypt(12345678),
            'city' => $request['city'],
            'gender' => $request['gender'],
            'address' => $request['address'],
        ]);

        return back()->with('success', 'Created Successfully');
       
    }

    public function loginadmin(Request $request){

        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
         ]);
        $me = Admin::where('email', $loginData['email'])->get()->first();
        if($me != ''){
            //verify password
            if(password_verify($loginData['password'], $me->password)){
                //create session and redirect
                session()->put('sn',$me->sn);
                if($me->status == 1){
                    if($me->p1 == 1){
                        return redirect('admindashboard')->with(['success' => 'Welcome Back']);
                    }else{ return redirect('staffprofile')->with(['success' => 'Welcome Back']); }
                }else{ session()->flush();  return back()->with('error', 'You have been deactivated contact the admin');  }
            }else{ return back()->with('error', 'incorrect password'); }
        }else{ return back()->with('error', 'Invalid email address'); }




    }





    // public function loginadmin(Request $request){

    //     $loginData = $request->validate([
    //         'email' => 'email|required',
    //         'password' => 'required'
    //      ]);
    //         $email = 'teacher@gmail.com';
    //     $me = Admin::where('email', $email)->get();
    //     return response($me);
    //     if($me != ''){
    //         //verify password
    //         if(password_verify($loginData['password'], $me->password)){
    //             //create session and redirect
    //             session()->put('sn',$me->sn);
    //             return redirect('admindashboard')->with(['success' => 'Welcome Back']);
    //         }else{ return back()->with('error', 'incorrect password'); }
    //     }else{ return back()->with('error', 'Invalid email address'); }

    // }


    public function logout(Request $request) {
        Auth::logout();
        Session::flush();
        return redirect('/');
    }


}
