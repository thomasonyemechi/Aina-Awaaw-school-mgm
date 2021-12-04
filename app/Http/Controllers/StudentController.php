<?php

namespace App\Http\Controllers;
use App\Models\User;
use DB;
use App\Models\Classe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class StudentController extends Controller
{


    





    public function updateStudentImg(Request $request){
        $id = $request['studentid'];
        $loc = $_FILES['photo']['tmp_name'];
        $type = $_FILES['photo']['type'];

        $ext = explode('/', $type);
            $ext = strtolower(end($ext));
            if ($new_name = imagetype($ext)) {
                $new_name = $id .time(). '.' . $ext;
                User::where('studentid', $id)->update(['image' => $new_name]);
                move_uploaded_file($loc,'assets/images/'.$new_name);
                return back()->with('success',"Picture Successfully Updated");
            } else {
                return redirect('generalsetup')->with('error',"Image Must Be in Jpeg,Jpg or Png Format"); }
    }






    public function updateStudent(Request $request){
        $request->validate([
            'email' => 'required|email',
            'fatheremail' => 'email',
            'motheremail' => 'email',
            'guardianemail' => 'email',
            'username' => 'required',
            'firstname' => 'required',
            'address' => 'required',
            'middlename' => 'required|',
            'lastname' => 'required',
        ]);
        User::where('studentid',$request['studentid'])->update([
            'firstname'=> $request['firstname'],
            'middlename'=> $request['middlename'],
            'lastname'=> $request['lastname'],
            'email' => $request->input('email'),
            'dob'=> strtotime($request['dob']),
            'username'=> $request['username'],
            'gender'=>$request['gender'],
            'address'=>$request['address'],
            'country'=>$request['country'],
            'city'=> $request['city'],
            'fathername'=> $request['fathername'],
            'fatheremail'=> $request['fatheremail'],
            'fatherphone'=> $request['fatherphone'],
            'mothername'=> $request['mothername'],
            'motherphone'=> $request['motherphone'],
            'motheremail'=> $request['motheremail'],
            'guardianname'=> $request['guardianname'],
            'guardianphone'=> $request['guardianphone'],
            'guardianemail'=> $request['guardianemail'],
        ]);
        return back()->with('success', 'Student Profile Updated Sucessfully');


    } 




    public function dashboard(){
        return view('admin/studentdashboard');
    }

    public function addstudent(){
        return view('admin/addstudent');
    }

    public function submitstudent(Request $request){
        $request->validate([
            'email' => 'required|email|unique:users',
            'fatheremail' => 'email',
            'motheremail' => 'email',
            'guardianemail' => 'email',
            'username' => 'required|unique:users',
            'firstname' => 'required',
            'address' => 'required',
            'middlename' => 'required|',
            'lastname' => 'required',
        ]);
        User::create([
            'studentid'=> $this->win_hashs(5),
            'firstname'=> $request['firstname'],
            'middlename'=> $request['middlename'],
            'lastname'=> $request['lastname'],
            'email' => $request->input('email'),
            'dob'=> strtotime($request['dob']),
            'username'=> $request['username'],
            'gender'=>$request['gender'],
            'address'=>$request['address'],
            'country'=>$request['country'],
            'city'=> $request['city'],
            'class'=> $request['class'],
            'fathername'=> $request['fathername'],
            'fatheremail'=> $request['fatheremail'],
            'fatherphone'=> $request['fatherphone'],
            'mothername'=> $request['mothername'],
            'motherphone'=> $request['motherphone'],
            'motheremail'=> $request['motheremail'],
            'guardianname'=> $request['guardianname'],
            'guardianphone'=> $request['guardianphone'],
            'guardianemail'=> $request['guardianemail'],
            'status'=> 1,
            'password' => bcrypt(1234567),
        ]);
        return back()->with('success', 'Operation Successful');


    } 

    public function viewstudents(){
        $allstudent = User::paginate(100);
        return view('admin/allstudents')->with('students',$allstudent);
    }
    
    public function selectclass(Request $request){
        $class = $request['class'];
        $allstudent = User::where('class',$class)->paginate(100);
        session()->put('allstudent',$allstudent);
        return redirect('viewstudents');
    }

    public function studentprofile(Request $request){
        $id = $request['studentpro'];
        session()->put('studentid', $id);
        return redirect('studentprofile');
    }


    function getFormRes(Request $request)
    {
        if($request['promote']){
            $id = $request['promote'];
            $this->promoteStudent($id);
            return back()->with('success', 'Student Promoted Sucessfully');
        }elseif($request['demote']){
            $id = $request['demote'];
            $this->deomoteStudent($id);
            return back()->with('success', 'Student Demoted Sucessfully');
        }else{
            $id = $request['status'];
            $this->status($id);
            return back()->with('success', 'Updated Sucessfully');
        }
    }



    function status($id)
    {
        $status = student($id,'status');
        $ns = ($status == 0) ? 1 : 0 ;
        User::where('studentid',$id)->update(['status' => $ns]);
        return;
    }


    
   public function promoteStudent($id)
  { 
    $class =  student($id,'class');     $classindex = classe($class,'classindex');
    $sql = Classe::where('classindex','>', $classindex)->orderby('classindex', 'ASC')->first();
    $newclass = $sql->id;
    if($class == 'graduate'){}
    elseif(!$sql == '') {
        User::where('studentid',$id)->update(['class' => $newclass]);
    }else{
      User::where('studentid',$id)->update(['class' => 'Graduated']);
    }
    return;
  }


  public function deomoteStudent($id)
  { 
    $class =  student($id,'class');     $classindex = classe($class,'classindex');
    $sql = Classe::where('classindex','<', $classindex)->orderby('classindex', 'DESC')->first();
    $newclass = $sql->id;
    if($class == 'graduate'){}
    elseif(!$sql == '') {
        User::where('studentid',$id)->update(['class' => $newclass]);
    }else{
      User::where('studentid',$id)->update(['class' => 'Graduated']);
    }
    return;
  }


  function toGet(Request $request)
  {
    if($request['promote']){
        $request->validate([ 'id' => 'required' ]);
        foreach($request['id'] as $id){ $this->promoteStudent($id); }
        return back()->with('success', 'Students Promoted Sucessfully');
    }elseif($request['demote']){
        $request->validate([ 'id' => 'required' ]);
        foreach($request['id'] as $id){ $this->deomoteStudent($id); }
        return back()->with('success', 'Students Demoted Sucessfully');
    }
  }


  function getClass(Request $request)
  {
      session()->put('classid', $request['class']);
      return back();
  }
  
  
    public function DeleteType(Request $request){
        $sn = $request['deletetype'];
        
        $query = DB::table('type')->where('sn', $sn)->delete();
        if($query){
            return back()->with('success', 'Operation Successful');
        }
        return back()->with('error', 'Operation Failed');
    }


    public function EditType(Request $request){
        $examtype = $request['examtype'];
        $sn = $request['typesn'];
        
        if(empty($examtype)){
            return back()->with('error', 'Exam Type Cannot Be Empty');
        }
        $query = DB::table('type')
                    ->where('sn', $sn)
                    ->update(['examtype' => $examtype ]);
                    
        if($query){
            return back()->with('success', 'Update Successful');
        }
        return back()->with('error', 'Update Failed');
    }



}
