<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proresult2;
use App\Models\Proresult;
use App\Models\Proquestion;

class ProsExamController extends Controller
{


    function proId()
    {
        return session()->get('prospective');
    }


    function answerSaver(Request $request)
    {
        $tcode = $request['tcode'];
        $qn = $request['qn']; $id = $this->proId();
        $subject = $request['subject'];
        $class = $request['class'];
        $opt = ucfirst($request['custom']);
        $ans = ucfirst($this->ans($subject, $class, $qn));
        $score = ($ans == $opt)?1:0;


        //return response($score);

        Proresult2::updateOrInsert(
            [ 
                'id'=> $id,
                'qn' => $qn,
                'subject' => $subject,
                'class' => $class,
                'tcode'=> $tcode,
            ],
            [
                'score' => $score,
                'myoption' => $opt,
                'ctime' => time()
            ]
        );

        Proresult::where('tcode',$tcode)->where('subject',$subject)->where('id',$id)->update(['ctime2' => time(), 'total' => $this->total($tcode, $subject, $id) ]);

        if($request['previous']){
            $nx = Proquestion::where('subject',$subject)->where('class',$class)->where('qn','<', $qn)->where('status', 1)->orderby('qn', 'ASC')->first(); 
            $q = $nx->qn; 
            return redirect('/prospective/answerquestion/'.$subject.'/'.$q.'');
        }elseif($request['next']){
            $nx = Proquestion::where('subject',$subject)->where('class',$class)->where('qn','>', $qn)->where('status', 1)->orderby('qn', 'ASC')->first(); 
            if($nx == ''){ return back(); }else{ $q = $nx->qn;
            return redirect('/prospective/answerquestion/'.$subject.'/'.$q.''); } 
        }
        else { 
            session()->forget('tcode');
            return redirect('prospective/dashboard')->with('success', 'Exam completed check result'); 
        } 


    }



    function total($tcode,$subject,$id){
        $al = Proresult2::where('tcode',$tcode)->where('id',$id)->where('subject',$subject)->get();
        $s = 0;
        foreach($al as $rw){
            $s += $rw->score;
        }
        return $s;
    }

    

    function ans($subject,$class,$qn){
        $sql = Proquestion::where('subject',$subject)->where('class',$class)->where('qn',$qn)->get();
        foreach($sql as $row){
            return $row->ca;
        }
    }



    function proceedToExam(Request $request)
    {

        
        $id = $this->proId();
        $subjects = json_decode(getPro($id , 'subjects'));
        
        $date = getPro($id, 'edate');
        if(time() >= $date){
            foreach($subjects as $sub){
                $count = countquesPro($sub, getPro($id , 'class'));
                if($count > 0){
                    Proresult::create([
                        'id' => $this->proId(),
                        'subject' => $sub,
                        'class' => getPro($id , 'class'),
                        'tcode' => getPro($id , 'tcode'),
                        'ctime' => time(),
                        'ques' => $count,
                    ]);
                }
            }
        }else{
            return back()->with('error' , 'It is not yet your exam date');
        }

        session()->put('tcode', getPro($id , 'tcode'));
                
        return redirect('prospective/answerquestion/'.$sub.'/1');
        //return response($exam);


    }

}
