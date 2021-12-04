<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classe;
use DB;
use App\Models\Subject;
use Illuminate\Support\Facades\Validator;

//this controller Controlls the creation of class and subjects
class ClasseController extends Controller
{
  
    function lastCindex(){
      $sql = Classe::orderby('classindex','DESC')->first();// DB::select("SELECT * FROM class WHERE bid='$bid' ORDER BY classindex DESC LIMIT 1");
        return $sql->classindex;
    }
  
    function firstCindex(){
      $sql =  Classe::orderby('classindex','ASC')->first();
      return $sql->classindex; 
    }
  
  
    public function createclass(Request $request)
    {
      $class = $request['class'];
      $classindex=(int)($this->lastCindex()+10000);
      //validating form inputs
      $validate = Validator::make($request->all(), [
        'class' => 'required|string|max:10',
      ])->validate();
      //checking if input exist
      $sql = Classe::where('class', $class)->get()->first();
      if($sql != ''){
        $log = 'Class Already Exist '.$class;
        return redirect('createclass')->with('error', $log);
      }
      //creating the Category
      Classe::create([
       'class' => $class,
       'classindex'=> $classindex,
       'rep' => adminId()
     ]);
     $log = 'Class Created Sucessfully '.$class;
     return redirect('createclass')->with('success', $log);
    }
    
    function DeleteClass(Request $request){
        
            $class = $request['deleteclass'];
           $set = count(DB::table('setsubject')->where('classid', $class)->get());
           $stud = count(DB::table('users')->where('class', $class)->get());
            if($set > 0 OR $stud > 0){
              return back()->with('error','Cannot Remove this class');
            }else{
                $sql = Classe::where('id', $class)->delete();
                if($sql){
                     return back()->with('success', 'class removed sucessfully');
                }else{
                     return back()->with('error', 'An error occured');
                }
            }
    }
    






//subject Controller


public function createsubject(Request $request)
{
  $subject = $request['subject'];
  //validating form inputs
  $validate = Validator::make($request->all(), [
    'subject' => 'required|string|max:100',
  ])->validate();
  //checking if input exist
  $sql = Subject::where('subject',$subject)->get()->first();

    //return response($sql);

  if($sql != ''){
    $log = 'Subject Already Exist '.$subject;
    return redirect('subject')->with('error', $log);
  }
  //creating the Category
  Subject::create([
   'subject' => $subject,
   'rep' => adminId(),
 ]);
 $log = 'Subject Created Sucessfully '.$subject;
 //adding logs
 return redirect('subject')->with('success', $log);
}

    public function deleteSubject(Request $request)
    {
      $id = $request['deletesubject'];
       $set = count(DB::table('setsubject')->where('sid', $id)->get());
        if($set > 0){
          return back()->with('error','Cannot Remove this Subject');
        }else{
             $sql = DB::table('subject')
                    ->where('id', $id)
                    ->delete();
             
            $log = 'Subject Deleted Sucessfully ';
            //adding logs
            //$this->addlog($log,1);
            return back()->with('success', $log);
        }
    }


  
  }