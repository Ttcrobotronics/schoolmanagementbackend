<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassSubjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AssignClassTeacherController;
use App\Http\Controllers\ClassTimetableController;
use App\Http\Controllers\ExaminationsController;
use App\Http\Controllers\CalendarController;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[AuthController::class, 'login']);
Route::post('login',[AuthController::class, 'AuthLogin']);
Route::get('logout',[AuthController::class, 'logout']);
Route::get('forgot-password',[AuthController::class, 'forgotpassword']);
Route::post('forgot-password',[AuthController::class, 'PostForgotPassword']);
Route::get('reset/{token}',[AuthController::class, 'reset']);
Route::post('reset/{token}',[AuthController::class, 'PostReset']);



// Route::get('admin/admin/list', function () {
//     return view('admin.admin.list');
// });

Route::group(['middleware' => 'admin'], function (){
    Route::get('admin/dashboard',[DashboardController::class, 'dashboard']);
    Route::get('admin/admin/list',[AdminController::class, 'list'])->name('admin.admin.list');
    Route::get('admin/admin/add',[AdminController::class, 'add']);
    Route::post('admin/admin/add', [AdminController::class, 'insert'])->name('admin.admin.insert');
    Route::get('admin/admin/edit{id}', [AdminController::class,'edit'])->name('admin.admin.edit');
    Route::post('admin/admin/edit{id}', [AdminController::class,'update'])->name('admin.admin.update');
    Route::delete('admin/admin/{id}', [AdminController::class, 'destroy'])->name('admin.admin.destroy');

    // teacher

    Route::get('admin/teacher/list',[TeacherController::class, 'list'])->name('admin.teacher.list');
    Route::get('admin/teacher/add',[TeacherController::class, 'add']);
    Route::post('admin/teacher/add', [TeacherController::class, 'insert'])->name('admin.teacher.insert');
    Route::get('admin/teacher/edit{id}', [TeacherController::class,'edit'])->name('admin.teacher.edit');
    Route::post('admin/teacher/edit{id}', [TeacherController::class,'update'])->name('admin.teacher.update');
    Route::delete('admin/teacher/{id}', [TeacherController::class, 'delete'])->name('admin.teacher.delete');


    // student

Route::get('admin/student/list',[StudentController::class, 'list'])->name('admin.student.list');
Route::get('admin/student/add',[StudentController::class, 'add']);
Route::post('admin/student/add', [StudentController::class, 'insert'])->name('admin.student.insert');
Route::get('admin/student/edit/{id}',[StudentController::class, 'edit'])->name('admin.student.edit');
Route::post('admin/student/edit/{id}', [StudentController::class, 'update'])->name('admin.student.update');
Route::get('admin/student/delete/{id}', [StudentController::class, 'delete'])->name('admin.student.delete');

//parent

Route::get('admin/parent/list',[ParentController::class, 'list'])->name('admin.parent.list');
Route::get('admin/parent/add',[ParentController::class, 'add']);
Route::post('admin/parent/add', [ParentController::class, 'insert'])->name('admin.parent.insert');
Route::get('admin/parent/edit/{id}',[ParentController::class, 'edit'])->name('admin.parent.edit');
Route::post('admin/parent/edit/{id}', [ParentController::class, 'update'])->name('admin.parent.update');
Route::get('admin/parent/delete/{id}', [ParentController::class, 'delete'])->name('admin.parent.delete');
Route::get('admin/parent/my-student/{id}', [ParentController::class, 'myStudent'])->name('admin.parent.my_student');
Route::get('/admin/parent/assign_student_parent/{student_id}/{parent_id}', [ParentController::class, 'assignStudentParent'])->name('admin.parent.assign_student_parent');
Route::get('/admin/parent/assign_student_parent_delete/{student_id}', [ParentController::class, 'assignStudentParentDelete'])->name('admin.parent.assign_student_parent_delete');

// class route

Route::get('admin/class/list',[ClassController::class, 'list'])->name('admin.class.list');
Route::get('admin/class/add',[ClassController::class, 'add']);
Route::post('admin/class/add', [ClassController::class, 'insert'])->name('admin.class.insert');
Route::get('admin/class/edit{id}', [ClassController::class,'edit'])->name('admin.class.edit');
Route::post('admin/class/edit{id}', [ClassController::class,'update'])->name('admin.class.update');
Route::delete('admin/class/{id}', [ClassController::class, 'destroy'])->name('admin.class.destroy');
    

// subject route

Route::get('admin/subject/list',[SubjectController::class, 'list'])->name('admin.subject.list');
Route::get('admin/subject/add',[SubjectController::class, 'add']);
 Route::post('admin/subject/add', [SubjectController::class, 'insert'])->name('admin.subject.insert');
Route::get('admin/subject/edit{id}', [SubjectController::class,'edit'])->name('admin.subject.edit');
Route::post('admin/subject/edit{id}', [SubjectController::class,'update'])->name('admin.subject.update');
Route::delete('admin/subject/{id}', [SubjectController::class, 'destroy'])->name('admin.subject.destroy');
   


// assign_subject
Route::get('admin/assign_subject/list',[ClassSubjectController::class, 'list'])->name('admin.assign_subject.list');
Route::get('admin/assign_subject/add',[ClassSubjectController::class, 'add']);
 Route::post('admin/assign_subject/add', [ClassSubjectController::class, 'insert'])->name('admin.assign_subject.insert');
Route::get('admin/assign_subject/edit/{id}', [ClassSubjectController::class,'edit'])->name('admin.assign_subject.edit');
Route::post('admin/assign_subject/edit/{id}', [ClassSubjectController::class,'update'])->name('admin.assign_subject.update');
Route::get('admin/assign_subject/delete/{id}', [ClassSubjectController::class, 'delete'])->name('admin.assign_subject.delete');

Route::get('admin/assign_subject/edit_single/{id}', [ClassSubjectController::class,'edit_single'])->name('admin.assign_subject.edit_single');
Route::post('admin/assign_subject/edit_single/{id}', [ClassSubjectController::class,'update_single'])->name('admin.assign_subject.update_single');  

// class timetable
Route::get('admin/class_timetable/list',[ClassTimetableController::class, 'list'])->name('admin.class_timetable.list');
Route::post('admin/class_timetable/get_subject',[ClassTimetableController::class, 'get_subject'])->name('admin.class_timetable.get_subject');
Route::post('admin/class_timetable/add',[ClassTimetableController::class, 'insert_update'])->name('admin.class_timetable.insert_update');
// Route::get('admin/class_timetable/add',[ClassTimetableController::class, 'add']);

//admin change password

Route::get('admin/change_password',[UserController::class, 'change_password']);
Route::post('admin/change_password', [UserController::class, 'update_change_password'])->name('admin.change_password');
Route::get('admin/account',[UserController::class, 'MyAccount'])->name('admin.account');
Route::post('admin/account',[UserController::class, 'UpdateMyAccountAdmin'])->name('admin.account');

Route::get('admin/assign_class_teacher/list',[AssignClassTeacherController::class, 'list'])->name('admin.assign_class_teacher.list');
Route::get('admin/assign_class_teacher/add',[AssignClassTeacherController::class, 'add'])->name('admin.assign_class_teacher.add');
Route::post('admin/assign_class_teacher/add', [AssignClassTeacherController::class, 'insert'])->name('admin.assign_class_teacher.insert');
Route::get('admin/assign_class_teacher/edit/{id}', [AssignClassTeacherController::class,'edit'])->name('admin.assign_class_teacher.edit');
Route::post('admin/assign_class_teacher/edit/{id}', [AssignClassTeacherController::class,'update'])->name('admin.assign_class_teacher.update');
Route::get('admin/assign_class_teacher/edit_single/{id}', [AssignClassTeacherController::class,'edit_single'])->name('admin.assign_class_teacher.edit_single');
Route::post('admin/assign_class_teacher/edit_single/{id}', [AssignClassTeacherController::class,'update_single'])->name('admin.assign_class_teacher.update_single');
Route::get('admin/assign_class_teacher/delete/{id}', [AssignClassTeacherController::class, 'delete'])->name('admin.assign_class_teacher.delete');

// examination section routes


    Route::get('admin/examinations/exam/list',[ExaminationsController::class, 'exam_list'])->name('admin.examinations.exam.list');
    Route::get('admin/examinations/exam/add', [ExaminationsController::class, 'exam_add'])->name('admin.examinations.exam.add');

    Route::post('admin/examinations/exam/add', [ExaminationsController::class, 'exam_insert'])->name('admin.examinations.exam.insert');
    Route::get('admin/examinations/exam/edit{id}', [ExaminationsController::class,'exam_edit'])->name('admin.examinations.exam.edit');
    Route::post('admin/examinations/exam/edit{id}', [ExaminationsController::class,'exam_update'])->name('admin.examinations.exam.update');
    Route::get('admin/examinations/exam/delete/{id}', [ExaminationsController::class, 'exam_delete'])->name('admin.examinations.exam.delete');

    Route::get('admin/examinations/exam_schedule', [ExaminationsController::class, 'exam_schedule'])->name('admin.examinations.exam_schedule');
    Route::post('admin/examinations/exam_schedule_insert', [ExaminationsController::class, 'exam_schedule_insert'])->name('admin.examinations.exam_schedule_insert');
    Route::get('admin/examinations/marks_register', [ExaminationsController::class, 'marks_register'])->name('admin.examinations.marks_register');
    Route::post('admin/examinations/submit_marks_register', [ExaminationsController::class, 'submit_marks_register'])->name('admin.examinations.submit_marks_register');

    Route::post('admin/examinations/single_submit_marks_register', [ExaminationsController::class, 'single_submit_marks_register'])->name('admin.examinations.single_submit_marks_register');


    // Route::get('admin/dashboard', function () {
    //     return view('admin.dashboard');
    // });

});

Route::group(['middleware' => 'teacher'], function (){ 
    Route::get('teacher/dashboard',[DashboardController::class, 'dashboard']);

    Route::get('teacher/change_password',[UserController::class, 'change_password']);
    Route::post('teacher/change_password', [UserController::class, 'update_change_password'])->name('teacher.change_password');

    Route::get('teacher/account',[UserController::class, 'MyAccount'])->name('teacher.account');
    Route::post('teacher/account',[UserController::class, 'UpdateMyAccount'])->name('teacher.account');
    Route::get('teacher/my_class_subject',[AssignClassTeacherController::class, 'MyClassSubject'])->name('teacher.my_class_subject');
    Route::get('teacher/my_student',[StudentController::class, 'MyStudent'])->name('teacher.my_student');
    Route::get('teacher/my_class_subject/class_timetable/{class_id}/{subject_id}',[ClassTimetableController::class, 'MyTimetableTeacher'])->name('teacher.my_class_subject.class_timetable');
    Route::get('teacher/my_exam_timetable',[ExaminationsController::class, 'MyExamTimetableTeacher']);
    Route::get('teacher/my_calendar', [CalendarController::class, 'MyCalendarTeacher'])->name('teacher.my_calendar');
    Route::get('teacher/marks_register', [ExaminationsController::class, 'marks_register_teacher'])->name('teacher.marks_register');
   
    Route::post('teacher/submit_marks_register', [ExaminationsController::class, 'submit_marks_register'])->name('teacher.submit_marks_register');

    Route::post('teacher/single_submit_marks_register', [ExaminationsController::class, 'single_submit_marks_register'])->name('teacher.single_submit_marks_register');

   
    // Route::get('teacher/dashboard', function () {
    //     return view('admin.dashboard');
    // });

});

Route::group(['middleware' => 'student'], function (){
    Route::get('student/dashboard',[DashboardController::class, 'dashboard']);

    Route::get('student/change_password',[UserController::class, 'change_password']);
    Route::post('student/change_password', [UserController::class, 'update_change_password'])->name('student.change_password');
    Route::get('student/account',[UserController::class, 'MyAccount'])->name('student.account');
    Route::post('student/account',[UserController::class, 'UpdateMyAccountStudent'])->name('student.account');
    Route::get('student/my_subject',[SubjectController::class, 'MySubject']);
    Route::get('student/my_timetable',[ClassTimetableController::class, 'MyTimetable']);
    Route::get('student/my_exam_timetable',[ExaminationsController::class, 'MyExamTimetable']);
    Route::get('student/my_calendar', [CalendarController::class, 'MyCalendar'])->name('student.my_calendar');

    // Route::get('student/dashboard', function () {
    //     return view('admin.dashboard');
    // });
    
});

Route::group(['middleware' => 'parent'], function (){
    Route::get('parent/dashboard',[DashboardController::class, 'dashboard']);

    Route::get('parent/change_password',[UserController::class, 'change_password']);
    Route::post('parent/change_password', [UserController::class, 'update_change_password'])->name('parent.change_password');
    Route::get('parent/account',[UserController::class, 'MyAccount'])->name('parent.account');
    Route::post('parent/account',[UserController::class, 'UpdateMyAccountParent'])->name('parent.account');

    Route::get('parent/my_student',[ParentController::class, 'myStudentParent']);
    Route::get('parent/my_student/subject/{student_id}',[SubjectController::class, 'ParentStudentSubject'])->name('parent.my_student.subject');
    Route::get('parent/my_student/subject/class_timetable/{class_id}/{subject_id}/{student_id}',[ClassTimetableController::class, 'MyTimetableParent'])->name('parent.my_student.subject.class_timetable');
    

    Route::get('parent/my_student/exam_timetable/{student_id}',[ExaminationsController::class, 'ParentMyExamTimetable'])->name('parent.my_student.exam_timetable');
    Route::get('parent/my_student/calendar/{student_id}', [CalendarController::class, 'MyCalendarParent'])->name('parent.my_student.calendar');

    // Route::get('parent/dashboard', function () {
    //     return view('admin.dashboard');
    // });

});