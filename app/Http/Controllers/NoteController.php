<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Setsubject;
use App\Models\Note;
use Auth;

//concernsevery thing that has to do with creating and editinf notes
class NoteController extends Controller
{





    function updateNotes(Request $request)
    {
        $notesn = session()->get('notesn');
        $val = Validator::make($request->all(), [
            'note' => 'required|min:5'
        ])->validate();

        $up = Note::where('id', $notesn)->update(['note' => $val['note'],]);

        session()->forget('notesn');

        return back()->with('success','Note created sucessfully updated');
    }


    function getNotesn(Request $request)
    {
        session()->put('notesn', $request['notesn']);
        return back();
    }



    function addNotes(Request $request)
    {
        $note = session()->get('note');
        $class = note($note,'classid');
        $subject = note($note,'sid');
        $val = Validator::make($request->all(), [
            'week' => 'required|max:3',
            'note' => 'required|min:5',
            'learn' => 'required|min:5'
        ])->validate();

        $ck = Note::where('week', $val['week'])->where('class',$class)->where('subject',$subject)->get();
        if(count($ck)> 0){
            session()->put('notevalue',$val['note']);
            session()->put('notelearn',$val['learn']);
            return back()->with('error','selected week already has contect in it, Edit');
        }

        Note::create([
            'class' => $class,
            'subject' => $subject,
            'week' => $val['week'],
            'des' => $val['learn'],
            'note' => addslashes(trim($val['note'])),
            'rep' => adminId(),
            'rep2' => adminId(),
            'ctime' => time(),
        ]);

        if(session()->has('notevalue')) { session()->forget('notevalue'); session()->forget('notelearn'); }

        return back()->with('success','Note created sucessfulyl');


    }

    function getNotes(Request $request)
    {
        session()->put('note', $request['note']);
        return redirect('addnotes');
    }
    

        //delete set subject

        public function deletesetsubject(Request $request)
        {
          $id = $request['id'];
          Setsubject::where('id', $id)->delete();
          return back()->with('success','Subject Deleted');
        }
    
    
        //set subject to users
        function setSubject(Request $request)
        {
    
            $val = Validator::make($request->all(), [
                'subject' => 'required|max:20',
                'class' => 'required|max:4',
                'teacher' => 'required|max:4',
            ])->validate();
    
    
            //return response($val['teacher']);
    
            $ck = Setsubject::where('uid',$val['teacher'])->where('sid',$val['subject'])->where('classid',$val['class'])->get();
            if(count($ck) > 0){
                return back()->with('error','This subject already been assigned to this teacher');
            }
            Setsubject::create([
                'uid' => $val['teacher'],
                'sid' => $val['subject'],
                'classid' => $val['class'],
            ]);
    
            return back()->with('success','Subject sucessfully assigned to teaceher');
    
            return;
        }
        
        
    public function uploadNote(Request $request){
        $note = session()->get('note');
        $class = note($note,'classid');
        $subject = note($note,'sid');
        $val = Validator::make($request->all(), [
            'week' => 'required|max:3',
            'learn' => 'required|max:50',
            'note' => 'required|max:1999|mimes:doc,docx,pdf'
        ])->validate();
        
        
        $ck = Note::where('week', $val['week'])->where('class',$class)->where('subject',$subject)->get();
        if(count($ck)> 0){
            session()->put('notevalue',$val['note']);
            session()->put('notelearn',$val['learn']);
            return back()->with('error','selected week already has context in it');
        }
        if($request->hasFile('note')){
            $filenameWithExt = $request->file('note')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('note')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('note')->storeAs('assets/notes', $fileNameToStore);
        }
        
        
        $sql = Note::create([
            'class' => $class,
            'subject' => $subject,
            'week' => $val['week'],
            'des' => $val['learn'],
            'note' => $fileNameToStore,
            'rep' => adminId(),
            'rep2' => adminId(),
            'ctime' => time(),
            ]);
           
            if(session()->has('notevalue')) { session()->forget('notevalue'); session()->forget('notelearn'); }
            return back()->with('success',"Note Successfully Uploaded");
            
                return back()->with('error',"An error occurred with the file upload"); 
    }


    
    



}
