<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubjectModel;
use App\Models\ClassSubjectModel;
use App\Models\User;
use Auth;

class SubjectController extends Controller
{
      //list function
      public function list(){
        $data['getRecord'] = SubjectModel::getRecord();
        $data['header_title'] = 'Subject List';
        return view('admin.subject.list',$data);
    }
    
    // public function list()
    // {
    //     $getRecord = ClassModel::paginate(1); // Adjust the number of items per page as needed
    // return view('admin.class.list', compact('getRecord'));
    // }

    public function add(){
      $data['header_title'] = 'Add New Subject';
      return view('admin.subject.add',$data);
  }

  public function insert(Request $request)
  {
      $request->validate([
          'name' => 'required|string|max:255',
          'status' => 'required|integer|in:0,1',

      ]);
  
      $save = new SubjectModel();
      $save->name = $request->name;
      $save->type = $request->type;
      $save->status = $request->status;
      $save->created_by = Auth::user()->id;
      $save->save();
  
      return redirect()->route('admin.subject.list')->with('success', 'Subject successfully created');
  }


  public function edit($id){
    $data['getRecord'] = SubjectModel::getSingle($id);
    if(!empty($data['getRecord']))
    {
        $data['header_title'] = "Edit  Subject";
        return view('admin.subject.edit',$data);
    }
    else{
        abort(404);
    }
   
}


public function update($id, Request $request){

  $save = SubjectModel::getSingle($id);
  $save->name = trim($request->name);
  $save->type = $request->type;
  $save->status = trim($request->status);
  $save->created_by = Auth::user()->id;
  $save->save();

  return redirect()->route('admin.subject.list')->with('success', 'Subject successfully updated');
}

public function destroy($id) {
  $user = SubjectModel::findOrFail($id);



 // delete product from database
 $user->delete();

 return redirect('admin/subject/list')->with('success', 'Subject successfully deleted');
}

// Subject side
public function MySubject()
{
  $data['getRecord'] = ClassSubjectModel::MySubject(Auth::user()->class_id);
  $data['header_title'] = 'My Subject';
  return view('student.my_subject',$data);
}

// parent Side
public function ParentStudentSubject($student_id)
{
  $user = User::getSingle($student_id);
 $data['getUser'] = $user;
  $data['getRecord'] = ClassSubjectModel::MySubject($user->class_id);
  $data['header_title'] = 'Student Subject';
  return view('parent.my_student_subject',$data);
}

}