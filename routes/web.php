<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/gallery', function () {
    return view('gallery');
});

Route::get('/register', function () {
    return view('student.register');
});

Route::post('/newsletter', [\App\Http\Controllers\NewsLetterController::class, 'store'])->name('newsletter.store');
Route::post('/contact.us', [\App\Http\Controllers\ContactController::class, 'store'])->name('contact.us.store');

Route::get('/adminregistration', [\App\Http\Controllers\AuthController::class, 'adminregistration']);
Route::post('/adminstore', [\App\Http\Controllers\AuthController::class, 'adminstore']);
Route::get('/adminlogin', [\App\Http\Controllers\AuthController::class, 'adminlogin']);
Route::post('/loginadmin', [\App\Http\Controllers\AuthController::class, 'loginadmin']);
Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);

Route::middleware(['auth'])->group(function () {   

    Route::get('/admindashboard', [\App\Http\Controllers\AuthController::class, 'admindashboard']);
    Route::get('/assignsubject', [\App\Http\Controllers\student\ViewController::class, 'assignSubject']);
    Route::get('/students', [\App\Http\Controllers\StudentController::class, 'dashboard']); 
    Route::get('/addstudent', [\App\Http\Controllers\StudentController::class, 'addstudent']);

    Route::get('/viewstaff', [\App\Http\Controllers\student\ViewController::class, 'viewStaff']);
    Route::get('/addstaff', [\App\Http\Controllers\student\ViewController::class, 'addstaffView']);
    Route::post('/submitstudent', [\App\Http\Controllers\StudentController::class, 'submitstudent']);
    Route::post('/selectclass', [\App\Http\Controllers\StudentController::class, 'selectclass']);
    Route::post('/getStudent', [\App\Http\Controllers\StudentController::class, 'studentprofile']);
    Route::get('/studentprofile', [\App\Http\Controllers\student\ViewController::class, 'studentprofile']);
    Route::get('/class/{cla}', [\App\Http\Controllers\student\ViewController::class, 'classProfile']); 

    Route::get('/viewstudents', [\App\Http\Controllers\StudentController::class, 'viewstudents']);
    Route::get('/staffprofile', [\App\Http\Controllers\student\ViewController::class, 'staffProfile']);

    

    Route::get('/createclass', [\App\Http\Controllers\student\ViewController::class, 'createClassView']);
    Route::get('/subject', [\App\Http\Controllers\student\ViewController::class, 'SubjectIndex']); 
    Route::get('/createtype', [\App\Http\Controllers\student\ViewController::class, 'ExamTypeIndex']);
    
    Route::post('/edittype', [\App\Http\Controllers\StudentController::class, 'EditType']);
    Route::post('/deletetype', [\App\Http\Controllers\StudentController::class, 'DeleteType']);
    
    Route::get('/createexam', [\App\Http\Controllers\student\ViewController::class, 'CreateExamIndex']);
    Route::get('/allprospectivestudent', [\App\Http\Controllers\student\ViewController::class, 'ViewProspectiveStudents']);
    Route::get('/addquestion', [\App\Http\Controllers\student\ViewController::class, 'addQuestionIndex'])->middleware('esn');
    Route::get('/viewexam', [\App\Http\Controllers\student\ViewController::class, 'viewExam']);
    Route::get('/mysubject', [\App\Http\Controllers\student\ViewController::class, 'mySubject']); 
    Route::get('/addnotes', [\App\Http\Controllers\student\ViewController::class, 'addNotes']); 
    Route::get('/cbtlog', [\App\Http\Controllers\student\ViewController::class, 'cbtLogs']); 
    Route::get('/cbtlog/{std}', [\App\Http\Controllers\student\ViewController::class, 'cbtLogs2']); 
    Route::get('/permission', [\App\Http\Controllers\student\ViewController::class, 'permission']);
    Route::get('/review', [\App\Http\Controllers\student\ViewController::class, 'review']);
    Route::get('/review/{sub}/{week}', [\App\Http\Controllers\student\ViewController::class, 'reviewNote']);

    Route::post('/ClassCreate', [\App\Http\Controllers\ClasseController::class, 'createclass']);
    Route::post('/DeleteClass', [\App\Http\Controllers\ClasseController::class, 'DeleteClass']);
    
    Route::post('/createsubject', [\App\Http\Controllers\ClasseController::class, 'createsubject']);
    Route::post('/deleteSubject', [\App\Http\Controllers\ClasseController::class, 'deleteSubject']);
    
    Route::post('/addtype', [\App\Http\Controllers\CbtController::class, 'addtype']); 
    Route::post('/addexam', [\App\Http\Controllers\CbtController::class, 'addexam']); 
    Route::post('/getesn', [\App\Http\Controllers\CbtController::class, 'getesn']);
    Route::post('/getAction', [\App\Http\Controllers\CbtController::class, 'getAction']);
    Route::post('/getExamAction', [\App\Http\Controllers\CbtController::class, 'getExamAction']);
    Route::post('/submitQuestion', [\App\Http\Controllers\CbtController::class, 'submitQuestion']); 
    Route::post('/updatequestion', [\App\Http\Controllers\CbtController::class, 'updatequestion']);
    Route::post('/setSubject', [\App\Http\Controllers\NoteController::class, 'setSubject']); 
    Route::post('/deletesetsubject', [\App\Http\Controllers\NoteController::class, 'deletesetsubject']); 
   
    Route::post('/getNotes', [\App\Http\Controllers\NoteController::class, 'getNotes']); 
    Route::post('/uploadNote', [\App\Http\Controllers\NoteController::class, 'uploadNote']); 
    
    
    
    
    
    Route::post('/addNotes', [\App\Http\Controllers\NoteController::class, 'addNotes']); 
    Route::post('/getFormRes', [\App\Http\Controllers\StudentController::class, 'getFormRes']);  
    Route::post('/getNotesn', [\App\Http\Controllers\NoteController::class, 'getNotesn']);
    Route::post('/toGet', [\App\Http\Controllers\StudentController::class, 'toGet']);  
    Route::post('/getClass', [\App\Http\Controllers\StudentController::class, 'getClass']); 
    Route::post('/getStaffId', [\App\Http\Controllers\AuthController::class, 'getStaffId']); 
    Route::post('/updateStudent', [\App\Http\Controllers\StudentController::class, 'updateStudent']); 
    Route::post('/updateStudentImg', [\App\Http\Controllers\StudentController::class, 'updateStudentImg']); 
    Route::post('/updateStaffImg', [\App\Http\Controllers\AuthController::class, 'updateStaffImg']); 
    Route::post('/adminUpdate', [\App\Http\Controllers\AuthController::class, 'adminUpdate']); 
    Route::post('/updatePermission', [\App\Http\Controllers\AuthController::class, 'updatePermission']);
    Route::post('/getAdminStatus', [\App\Http\Controllers\AuthController::class, 'getAdminStatus']);

    //prosepective Student  
    Route::get('/question/prospective', [\App\Http\Controllers\student\ViewController::class, 'displayExamlistPro']);
    Route::get('/student/prospective', [\App\Http\Controllers\student\ViewController::class, 'addProspevtiveStudentIndex']);
    Route::get('/question/prospective/{class}', [\App\Http\Controllers\student\ViewController::class, 'createProspectiveQuestionIndeex']);
    Route::post('prospective/submitQuestion', [\App\Http\Controllers\ProspectiveController::class, 'submitQuestion']); 
    Route::post('prospective/updatequestion', [\App\Http\Controllers\ProspectiveController::class, 'updatequestion']); 
    Route::post('prospective/addStudent', [\App\Http\Controllers\ProspectiveController::class, 'addStudent']);
    Route::post('prospective/selectSubject', [\App\Http\Controllers\ProspectiveController::class, 'selectSubject']); 
    Route::post('prospective/approveApplication', [\App\Http\Controllers\ProspectiveController::class, 'approveApplication']);

    
});




//student route   

Route::get('/student/login', [\App\Http\Controllers\student\AuthController::class, 'loginIndex']);
Route::post('/student/loginstudent', [\App\Http\Controllers\student\AuthController::class, 'loginstudent']);


Route::middleware(['student'])->group(function () {
    Route::get('/student/dashboard', [\App\Http\Controllers\student\ViewController::class, 'dashboardView']);   
    Route::get('/student/exams', [\App\Http\Controllers\student\ViewController::class, 'studentExams']); 
    Route::get('/student/notes', [\App\Http\Controllers\student\ViewController::class, 'viewNotes']); 
    Route::get('/student/testhistory', [\App\Http\Controllers\student\ViewController::class, 'testHistory']);  
    Route::get('/student/readnote/{note}/{mal}', [\App\Http\Controllers\student\ViewController::class, 'readNote']);  
    Route::get('/student/myprofile', [\App\Http\Controllers\student\ViewController::class, 'myProfile']);  
    Route::get('/student/answerquestion', [\App\Http\Controllers\student\ViewController::class, 'answerQuestion'])->middleware('write'); 

    
    Route::post('/student/proceedToExam', [\App\Http\Controllers\ExamController::class, 'proceedToExam']); 
    Route::post('/student/saveanswer', [\App\Http\Controllers\ExamController::class, 'saveanswer']);
    Route::post('/student/answerSaver', [\App\Http\Controllers\ExamController::class, 'answerSaver']);
});


//pro student 

Route::get('/prospective/result', [\App\Http\Controllers\student\ViewController::class, 'proResult'])->middleware('prospective'); 
Route::post('/addStudentSelfReg', [\App\Http\Controllers\ProspectiveController::class, 'addStudentSelfReg']);   
Route::get('/prospective/tracker', [\App\Http\Controllers\student\ViewController::class, 'tracker']);   
Route::post('/prospective/proceedToExam', [\App\Http\Controllers\ProsExamController::class, 'proceedToExam']);   
Route::post('/prospective/saveAnswer', [\App\Http\Controllers\ProsExamController::class, 'answerSaver']);   
Route::get('/prospective/answerquestion/{subject}/{question}', [\App\Http\Controllers\student\ViewController::class, 'answerProQuestion'])
->middleware('prospective')->middleware('proans');
Route::get('/prospective/dashboard', [\App\Http\Controllers\student\ViewController::class, 'proDashboard'])->middleware('prospective');
Route::post('/prospective/login', [\App\Http\Controllers\ProspectiveController::class, 'prospectiveLogin']);




