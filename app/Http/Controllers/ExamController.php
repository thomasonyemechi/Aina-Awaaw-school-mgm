<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student\Result;
use App\Models\student\Result2;
use App\Models\Exam;
use App\Models\Question;

class ExamController extends Controller
{
    //


    function answerSaver(Request $request)
    {
        $tcode = session()->get('tcode'); $esn = session()->get('esn');
        $qn = $request['qn']; $id = studentId(); $tp = esn($esn,'examtype');

        $opt = ucfirst($request['custom']);
        $ans = ucfirst($this->ans($esn,$qn));
        $score = ($ans == $opt)?1:0;
        Result2::updateOrInsert(
            [ 
                'id'=> $id,
                'type' => $tp,
                'qn' => $qn,
                'tcode'=> $tcode,
                'esn'=> $esn,
            ],
            [
                'score' => $score,
                'myoption' => $opt,
            ]
        );

        Result::where('tcode',$tcode)->where('id',$id)->update(['ctime2' => time(), 'total' => $this->total($tcode, $id) ]);

        if($request['previous']){
            $nx = Question::where('esn',$esn)->where('qn','<', $qn)->where('status', 1)->orderby('qn', 'ASC')->first(); $q = $nx->qn;
            return redirect('student/answerquestion?qn='.$q);
        }elseif($request['next']){
            $nx = Question::where('esn',$esn)->where('qn','>', $qn)->where('status', 1)->orderby('qn', 'ASC')->first(); 
            //return response($nx);
            if($nx == ''){ return back(); }else{ $q = $nx->qn;
            return redirect('student/answerquestion?qn='.$q); } 
        }else { 
            session()->forget('tcode');
            session()->forget('esn');
            return redirect('student/myprofile'); 
        } 


    }



    function saveanswer(Request $request){
        $esn = session()->get('esn'); $tcode = session()->get('tcode');
        $question = Question::where('esn', $esn)->where('status', 1)->orderby('sn','ASC')->get();
        $e = 0; $tp = Exam::find($esn)->examtype; $id = studentId();

        //return response($request);

        foreach ($question as $row) { $e++;
            $qn = $request['qn'.$e];
            $opt = ucfirst($request['custom'.$e]);
            $ans = ucfirst($this->ans($esn,$qn));
            $score = ($ans == $opt)?1:0;
            Result2::create([
                'id'=> $id,
                'type' => $tp,
                'qn' => $qn,
                'tcode'=> $tcode,
                'esn'=> $esn,
                'score' => $score,
                'myoption' => $opt,
            ]);      

        }

        $total = $this->total($tcode,$id);
        $t  = time();


        Result::where('tcode', $tcode)->update([
            'total' => $total,
            'ctime2' => $t,
        ]);
        session()->forget('tcode'); 
        session()->forget('esn'); 

        return redirect('afterexam');
    }



    function total($tcode, $id){
        $al = Result2::where('tcode',$tcode)->where('id',$id)->get();
        $s = 0;
        foreach($al as $rw){
            $s += $rw->score;
        }
        return $s;
    }

    

    function ans($esn,$qn){
        $sql = Question::where('esn',$esn)->where('qn',$qn)->get();
        foreach($sql as $row){
            return $row->ca;
        }
    }



    function proceedToExam(Request $request)
    {

        $esn = $request['esn'];
        $exam = Exam::find($esn);
        $tcode = $this->win_hash(10); session()->put('tcode', $tcode);
        session()->put('esn', $esn);
        Result::create([
            'id' => studentId(),
            'type' => $exam->examtype,
            'subject' => $exam->subject,
            'class' => $exam->class,
            'esn' => $esn,
            'tcode' => $tcode,
            'ctime' => time(),
            'term' => $exam->term,
            'ques' => countques($esn),
        ]);
        return redirect('student/answerquestion');
        //return response($exam);


    }
}
