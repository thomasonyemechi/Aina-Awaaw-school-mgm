<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Type;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Setsubject;


//controls everytihing on exam creation, questions type...
class CbtController extends Controller
{



    


    function getExamAction(Request $request)
    {

        
        if($request['status']){
            $esn = $request['status']; $status = (esn($esn, 'status') == 0) ? 1 : 0 ;
            Exam::where('sn', $esn)->update(['status'=> $status]); return back()->with('success','Sucessfully Updated'); 
        }elseif($request['esn']){
            $this->getesn($request);
            return redirect('addquestion');
        }else{
            $min = $request['min']; $esn = $request['submitMin'];
            Exam::where('sn', $esn)->update(['min'=> $min]); return back()->with('success','Minutes Sucessfully Updated');
        }
    }


    function updatequestion(Request $request)
    {
        $sn = session()->get('question');
        $validate = Validator::make($request->all(), [
            'a' => 'required|max:5000',
            'b' => 'required|max:5000',
            'c' => 'required|max:5000',
            'd' => 'required|max:5000',
            'ca' => 'required|max:2',
            'question' => 'required|max:20000',
        ])->validate();

        Question::where('sn', $sn)->update([
            'rep'=> adminId(),
            'a'=>addslashes(trim($request['a'])),
            'b'=>addslashes(trim($request['b'])),
            'c'=>addslashes(trim($request['c'])),
            'd'=>addslashes(trim($request['d'])),
            'ca'=>addslashes(trim($request['ca'])),
            'question'=>addslashes(trim($request['question'])),
        ]);
        session()->forget('question');
        return back()->with('success','Question Sucessfully Updated ');

    }






    function getAction(Request $request)
    {
        $action = $request['action'];
        if($action == 'activate'){ 
            Validator::make($request->all(), [ 'checkbox' => 'required|max:5000' ])->validate();
            $this->activateQuestion($request['checkbox']); return back()->with('success','Questions suecessfully activated'); 
        }elseif($action == 'deactivate'){
            Validator::make($request->all(), [ 'checkbox' => 'required|max:5000' ])->validate();
            $this->deactivateQuestion($request['checkbox']); return back()->with('success','Questions suecessfully dectivated'); 
        }else{
            $this->getQuestion($request['question']); return back()->with('success','Proceed to edit question');
        }
        
    }


    function activateQuestion($arr)
    {
        foreach($arr as $sn){
            Question::where('sn', $sn)->update(['status'=> 1]);
        }
    }


    function deactivateQuestion($arr)
    {
        foreach($arr as $sn){
            Question::where('sn', $sn)->update(['status'=> 0]);
        }
    }

    //select a particular exam
    function getQuestion($question){
        session()->put('question',$question);
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
            'question' => 'required|max:20000',
        ])->validate();

        Question::create([
            'esn'=>$esn,
            'rep'=> adminId(),
            'qn'=>$this->qNumber($esn),
            'a'=>addslashes(trim($request['a'])),
            'b'=>addslashes(trim($request['b'])),
            'c'=>addslashes(trim($request['c'])),
            'd'=>addslashes(trim($request['d'])),
            'ca'=>addslashes(trim($request['ca'])),
            'question'=>addslashes(trim($request['question'])),
        ]);

        return back()->with('success','Question added Sucessfully');
    }


    // for generating question number
    function qNumber($esn){
        $sql=Question::where('esn',$esn)->get();
        return count($sql)+1;
    }


    //select a particular exam
    function getesn(Request $request){
        session()->put('esn',$request['esn']);
        return redirect('addquestion');
    }

    
    //ading exam
    function addexam(Request $request)
    {
        //return response($request['type']);
        $val = Validator::make($request->all(), [
            'subject' => 'required|max:3',
            'type' => 'required|max:3',
            'term' => 'required|max:3',
            'class' => 'required|max:3',
        ])->validate();


        
        
        // creating a unique code for each exam by cocatenating subject + examtype + term + class
        $index = $val['subject'].$val['type'].$val['term'].$val['class'];
        
        //return response($index);
        if(count(Exam::where('eindex',$index)->get())>0){
            return back()->with('error', 'Exam Already Exits');
        }

        Exam::create([
            'examtype'=>$val['type'],
            'term'=>$val['term'],
            'code'=>$val['subject'],
            'class'=>$val['class'],
            'subject'=>$val['subject'],
            'eindex'=>$index,
            'rep'=>adminId()
        ]);
        
        return back()->with('success','Added Sucessfully Proceed To Add Questions');
    }







    //adding exam type
    function addtype(Request $request)
    {
        $type = $request['type'];
        Validator::make($request->all(), [
            'type' => 'required|max:200',
        ])->validate();
        
        if(count(Type::where('examtype',$type)->get())>0){
            return back()->with('error', 'Exam Type Already Exits');
        }

        Type::create([
            'examtype'=>$type,
            'rep'=> adminId(),
        ]);
        
        return back()->with('success','Exam Type Add');
    }




}
