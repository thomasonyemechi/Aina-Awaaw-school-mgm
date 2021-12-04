<?php 
function getAdmin($sn, $val='') {
    $admin = \App\Models\Admin::where('sn', $sn)->first();
    $vall = ($val == '')? ucfirst($admin->firstname).' '.ucfirst($admin->lastname) : $admin->$val;
    return $vall;
}


function adminId(){ return session()->get('sn'); }



function studentId(){ return session()->get('student_idx'); }

function student($id,$col='')
{
    $student = \App\Models\User::where('studentid', $id)->first();
    return $student->$col;
}

function subject($subject, $col='subject'){
    $sub = \App\Models\Subject::where('id', $subject)->first();
    return $sub->$col;
}

function classe($class, $col='class'){
    $sub = \App\Models\Classe::where('id', $class)->first();
    return $sub->$col ?? '';
}



function type($type, $col='examtype'){
    $sub = \App\Models\Type::where('sn', $type)->first();
    return @$sub->$col;
}

function esn($esn, $col=''){
    $exm = \App\Models\Exam::where('sn', $esn)->first();
    $name = ucfirst(''.classe($exm->class).', '.subject($exm->subject).', '.type($exm->examtype).' ('.ucfirst(term($exm->term)).' Term)');
    $val = ($col == '')? $name : $exm->$col;
    return $val;
}


function Result($tcode, $col=''){
    $exm = \App\Models\student\Result::where('tcode', $tcode)->first();
    return $exm->$col;
}


function question($sn,$col='question'){
    $q = \App\Models\Question::where('sn', $sn)->first();
    return $q->$col;
}

function countques($esn,$t='active'){
    $q = count(\App\Models\Question::where('esn', $esn)->get());
    $q2 = count(\App\Models\Question::where('esn', $esn)->where('status',1)->get());
    $val = ($t == 'active')? $q2 : $q;
    return $val;
}

//for prospective student
function countquesPro($subject, $class,$t='active'){
    $q = count(\App\Models\Proquestion::where('subject', $subject)->where('class', $class)->get());
    $q2 = count(\App\Models\Proquestion::where('subject', $subject)->where('class', $class)->where('status',1)->get());
    $val = ($t == 'active')? $q2 : $q;
    return $val;
}


function term($term){
    if($term == 1){ $t = 'first'; }
    elseif($term == 2){ $t = 'second'; }
    elseif($term == 3){ $t = 'third'; }
    return $t;
}



function note($note, $col=''){
    $nt = \App\Models\Setsubject::where('id', $note)->first();
    $name = ucfirst(''.classe($nt->classid).', '.subject($nt->sid).'');
    $val = ($col == '')? $name : $nt->$col;
    return $val;
}


function mal($sub,$week, $col=''){
    $nt = \App\Models\Note::where('week', $week)->where('subject', $sub)->first();
    $name = ucfirst(''.$nt->des.' ('.classe($nt->class).')');
    $val = ($col == '')? $name : $nt->$col;
    return $val;
}


function role($role)
{
    $t = '.';
    if($role == 10){$t = 'Super Administrator';}
    elseif($role == 9){$t = 'Administrator';}
    elseif($role == 5){$t = 'Teacher';}
    elseif($role == 2){$t = 'CBT Manager';}
    return $t;
}

// function markAnswer($esn,$qn,$opt)
// {
//     $res = \App\Models\Question::where('esn', $esn)->where('qn', $qn)->first();
//     $val = ($opt == $res->ca) ? 'Selected' : '';
//     return $val;
// }


function pickAnswer($tcode,$esn,$qn,$opt='')
{
    $res = \App\Models\student\Result2::where('tcode', $tcode)->where('esn', $esn)->where('qn', $qn)->first();
    return @$res->$opt;
}


function pickAnswerPor($tcode,$subject,$class,$qn,$opt='')
{
    $res = \App\Models\Proresult2::where('tcode', $tcode)->where('subject', $subject)->where('class', $class)->where('qn', $qn)->first();
    return @$res->$opt;
}


function comp($myans, $opt){
    $val = '';
    if($myans == $opt){ $val = 'checked'; }
    return $val;
}


function imagetype($ext){
    $array = array('jpg','jpeg','png');
    if(in_array($ext,$array)) { return true;}
    else { return false; }
}


function getExamInfo($tcode,$opt){
    if($opt == 'total'){
        $res = \App\Models\student\Result::where('tcode', $tcode)->first();
        return $res->ques;
    }elseif($opt == 'ans'){
        $res = \App\Models\student\Result2::where('tcode', $tcode)->get(); $i = 0;
        foreach($res as  $r){ if($r->myoption == '') { $i++; } }
        $ac = getExamInfo($tcode,'total')-$i;
        return $ac;
    }elseif($opt == 'correct'){
        $res = count(\App\Models\student\Result2::where('tcode', $tcode)->where('score', 1)->get());
        return $res;
    }    
}


function calExamPer($tcode){
    $per = number_format((getExamInfo($tcode,'correct')/getExamInfo($tcode,'total'))*100,2);
    return $per;
}

function pCheck($vak){
    $ck = ($vak==1)?'checked':'';
    return $ck;
} 

function coutProQuestion($class, $subject,$ac=''){
    $val = ($ac == 'Active')? count(\App\Models\Proquestion::where('class', $class)->where('subject', $subject)->where('status', 1)->get()) : count(\App\Models\Proquestion::where('class', $class)->where('subject', $subject)->get());
    return $val;
}

function getPro($id, $col='')
{
    $data = \App\Models\Prostudent::where('id', $id)->first();
    $val = ($col=='') ? ''.$data->lastname.' '.$data->firstname.'' : $data->$col;
    return $val;
}



function ProGetExamInfo($tcode,$subject,$opt){
    if($opt == 'total'){
        $res = \App\Models\Proresult::where('tcode', $tcode)->where('subject', $subject)->first();
        return @$res->ques;
    }elseif($opt == 'ans'){
        $res = \App\Models\Proresult2::where('subject', $subject)->where('tcode', $tcode)->get(); $i = 0;
        foreach($res as  $r){ if($r->myoption == '') { $i++; } }
        $ac = ProGetExamInfo($tcode,$subject,'total')-$i;
        return $ac;
    }elseif($opt == 'correct'){
        $res = count(\App\Models\Proresult2::where('subject', $subject)->where('tcode', $tcode)->where('score', 1)->get());
        return $res;
    }    
}



















?>