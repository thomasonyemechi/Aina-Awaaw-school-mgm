<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proquestion;
use App\Models\Prostudent;
use Illuminate\Support\Facades\Validator;

class ProspectiveController extends Controller
{


    function prospectiveLogin(Request $request)
    {

        $val = Validator::make($request->all(), [
            'id' => 'required|string|min:10|max:20'
        ])->validate(); 

        

        $data = Prostudent::where('id', $request['id'])->first();

        if($data == ''){ return back()->with('error', 'Invalid ID please try again'); }
        //return response($data);
        session()->put('prospective', $data->id);

        return redirect('prospective/dashboard')->with('success', 'Welcome');
        
    }



    function massaprove($time, $date, $student)
    {
        Prostudent::where('sn', $student)->update([
            'approved' => 1,
            'etime' => strtotime($time),
            'edate' => strtotime($date),
        ]);
    }



    function approveApplication(Request $request)
    {


        $val = Validator::make($request->all(), [
            'time' => 'required',
            'date' => 'required'
        ])->validate(); 
        
        if(strtotime($request['date']) < time() OR strtotime($request['time']) < time()){
            return back()->with('error', 'Invalid date and time');
        }

        //return response(strtotime($request['time']));

        $studentId  = $request['sn'];
        $ck = Prostudent::where('sn', $studentId)->first();
        if($ck->subjects == ''){
            return back()->with('error', 'select subject to student before approving');
        }

        $this->massaprove($request['time'], $request['date'], $studentId);

        return back()->with('success', 'application approved , test code available '.$ck->tcode );
    }




        //for add exam question
    function submitQuestion(Request $request)
    {
        $esn = session()->get('esn');
        $validate = Validator::make($request->all(), [
            'a' => 'required|max:5000',
            'b' => 'required|max:5000',
            'c' => 'required|max:5000',
            'd' => 'required|max:5000',
            'ca' => 'required|max:2',
            'subject' => 'required',
            'question' => 'required|max:20000',
        ])->validate();

        // return response($request);

        Proquestion::create([
            'class'=> $request['class'],
            'subject'=> $request['subject'],
            'rep'=> adminId(),
            'qn'=>$this->proQNumber($request['class'], $request['subject']),
            'a'=>addslashes(trim($request['a'])),
            'b'=>addslashes(trim($request['b'])),
            'c'=>addslashes(trim($request['c'])),
            'd'=>addslashes(trim($request['d'])),
            'ca'=>addslashes(trim($request['ca'])),
            'ctime' => time(),
            'question'=>addslashes(trim($request['question'])),
        ]);

        return back()->with('success','Question added Sucessfully');
    }

    function proQNumber($class, $subject){
        $sql=Proquestion::where('class',$class)->where('subject', $subject)->get();
        return count($sql)+1;
    }
    
    
    

    function addStudentSelfReg(Request $request)
    {
        //return response($request);
        $val = Validator::make($request->all(), [
            'firstname' => 'required|max:50',
            'lastname' => 'required|max:50',
            'dob' => 'required|max:20',
            'gender' => 'required',
            'address' => 'required|min:5',
            'phone' => 'numeric|min:10',
            'class' => 'numeric',
        ])->validate();  


        // return response($request);


        $tcode = $this->win_hash(10);
        $id = $this->win_hash(15);
        

        Prostudent::create([
            'lastname' => $val['lastname'],
            'firstname' => $val['firstname'],
            'dob' => $val['dob'],
            'gender' => $val['gender'],
            'address' => $val['address'],
            'phone' => $val['phone'],
            'class' => $val['class'],
            'tcode' => $tcode,
            'ctime' => time(),
            'rep' => 0,
            'id' => $id,
        ]);

        session()->put('prospective', $id);

        return redirect('/prospective/dashboard')->with('success', 'sucessfully registered');
    }



    function addStudent(Request $request)
    {
        $val = Validator::make($request->all(), [
            'firstname' => 'required|max:50',
            'lastname' => 'required|max:50',
            'dob' => 'required|max:20',
            'gender' => 'required',
            'address' => 'required|min:5',
            'phone' => 'numeric|min:10',
            'class' => 'numeric',
        ])->validate();  


        // return response($request);


        $tcode = $this->win_hash(10);

        Prostudent::create([
            'lastname' => $val['lastname'],
            'firstname' => $val['firstname'],
            'dob' => $val['dob'],
            'gender' => $val['gender'],
            'address' => $val['address'],
            'phone' => $val['phone'],
            'class' => $val['class'],
            'tcode' => $tcode,
            'ctime' => time(),
            'rep' => adminId(),
            'id' => $this->win_hashs(15),
        ]);

        return back()->with('success', 'Prospective student added, continue to add subjects');
    }



    function selectSubject(Request $request)
    {
        // return response($request);

        $up = Prostudent::where('sn', $request['sn'])->update([
            'subjects' => json_encode($request['subjects'])
        ]);

        return back()->with('success', 'Subject modified');
    }





}
