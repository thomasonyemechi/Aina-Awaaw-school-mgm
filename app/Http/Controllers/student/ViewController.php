<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    //dashboard
    public function dashboardView()
    {
        return view('student.dashboard');
    }



    public function createClassView()
    {
        return view('admin.createclass');
    }

    public function SubjectIndex()
    {
        return view('admin.createsubject');
    }
    
    public function ViewProspectiveStudents()
    {
        return view('admin.allprospectivestudents');
    }
    
    


    public function ExamTypeIndex()
    {
        return view('admin.createtype');
    }

    public function CreateExamIndex()
    {
        return view('admin.createexam');
    }

    public function addQuestionIndex()
    {
        return view('admin.addquestion');
    }


    public function viewExam()
    {
        return view('admin.allexam');
    }


    public function studentExams()
    {
        return view('student.exams');
    }


    public function assignSubject()
    {
        return view('admin.assignsubject');
    }

    public function mySubject()
    {
        return view('admin.mysubjects');
    }



    public function addNotes()
    {
        return view('admin.addnotes');
    }


    function answerQuestion()
    {
        return view('student.answerquestion');
    }

    function viewNotes()
    {
        return view('student.notes');
    }

    function readNote(Request $request, $note,$mal)
    {
        return view('student.readnote',['note' => $note ,'mal' => $mal]);
    }


    function testHistory()
    {
        return view('student.testhistory');
    }


    function viewStaff()
    {
        return view('admin.viewstaff');
    }


    function addstaffView()
    {
        return view('admin.addstaff');
    }


    function studentprofile()
    {
        return view('admin.studentprofile');
    }


    function classProfile($cla)
    {
        return view('admin.class',['class' => $cla]);
    }



    function myProfile()
    {
        return view('student.profile');
    }



    function cbtLogs()
    {
        return view('admin.cbtlogs');
    }



    function cbtLogs2($stu)
    {
        return view('admin.cbtlogs2',['student' => $stu]);
    }


    function staffProfile()
    {
        return view('admin.staffprofile');
    }



    function permission()
    {
        return view('admin.permission');
    }

    
    function review()
    {
        return view('admin.review');
    }


    function reviewNote($note, $mal)
    {
        return view('admin.review2',['note'=> $note, 'mal' => $mal]);
    }

    function createProspectiveQuestionIndeex($class)
    {
        $question = \App\Models\Proquestion::where('class', $class)->paginate(100);
        return view('admin.proquestion',['question'=> $question, 'class' => $class]);
    }

    function addProspevtiveStudentIndex()
    {
        return view('admin.prostudent');
    }


    function  tracker()
    {
        return view('prospective.tracker');
    }


    function  proDashboard()
    {
        $data = \App\Models\Prostudent::where('id', session()->get('prospective'))->first();
        return view('prospective.dashboard',['pro' => $data]);
    }


    function  answerProQuestion($subject, $question)
    {
        $data = \App\Models\Prostudent::where('id', session()->get('prospective'))->first();
        return view('prospective.answer',['pro' => $data, 'subject' => $subject, 'question' => $question]);
    }

    function proResult()
    {
        return view('prospective.result');
    }


    function displayExamlistPro()
    {
        return view('admin.prosexamlist');
    }





    
   
    



}
