<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassSubjectModel;
use App\Models\SubjectModel;
use App\Models\ClassModel;
use Auth;

class ClassSubjectController extends Controller
{
    public function list(){
        $data['getRecord'] = ClassSubjectModel::getRecord();
        $data['header_title'] = 'Subject Assign List';
        return view('admin.assign_subject.list',$data);
    }
    
    // public function list()
    // {
    //     $getRecord = ClassModel::paginate(1); // Adjust the number of items per page as needed
    // return view('admin.class.list', compact('getRecord'));
    // }

    public function add(Request $request){
        $data['getClass'] = ClassModel::getClass();
        $data['getSubject'] = SubjectModel::getSubject();
        $data['header_title'] = 'Add Assign Subject';
        return view('admin.assign_subject.add',$data);
    }

    public function insert(Request $request){
       if(!empty($request->subject_id))
       {
           foreach($request->subject_id as $subject_id)
           {
            $getAlreadyFirst = ClassSubjectModel::getAlreadyFirst($request->class_id, $subject_id);
            if(!empty($getAlreadyFirst))
            {
                $getAlreadyFirst->status = $request->status; 
                $getAlreadyFirst->save();
            }
            else
            {
                $save = new ClassSubjectModel;
              $save->class_id = $request->class_id;
              $save->subject_id = $subject_id; // Corrected assignment
              $save->status = $request->status; // Corrected typo
              $save->created_by = Auth::user()->id;
              $save->save();
            }
             
              
           }
           return redirect()->route('admin.assign_subject.list')->with('success', 'Subject successfully Assign to Class.');

       }
       else
       {
        return redirect()->back()->with('error', 'Due to some error please try again.');
       }
    }

    public function edit($id)
    {
        $getRecord = ClassSubjectModel::getSingle($id);
        if(!empty($getRecord))
        {
            $data['getRecord'] = $getRecord;
            $data['getAssignSubjectID'] = ClassSubjectModel::getAssignSubjectID($getRecord->class_id);
            $data['getClass'] = ClassModel::getClass();
            $data['getSubject'] = SubjectModel::getSubject();
            $data['header_title'] = 'Edit Assign Subject';
            return view('admin.assign_subject.edit',$data);
        }
        else 
        {
            abort(404);
        }
       
    }

    public function update(Request $request){
        ClassSubjectModel::deleteSubject($request->class_id);

        if(!empty($request->subject_id))
        {
            foreach($request->subject_id as $subject_id)
            {
             $getAlreadyFirst = ClassSubjectModel::getAlreadyFirst($request->class_id, $subject_id);
             if(!empty($getAlreadyFirst))
             {
                 $getAlreadyFirst->status = $request->status; 
                 $getAlreadyFirst->save();
             }
             else
             {
                 $save = new ClassSubjectModel;
               $save->class_id = $request->class_id;
               $save->subject_id = $subject_id; // Corrected assignment
               $save->status = $request->status; // Corrected typo
               $save->created_by = Auth::user()->id;
               $save->save();
             }
              
               
            }
           
        }
        return redirect()->route('admin.assign_subject.list')->with('success', 'Subject successfully Assign to Class.');
 

    }

   public function delete($id)
{
    $record = ClassSubjectModel::getSingle($id);
    
    if ($record) {
        $record->is_delete = 1;
        $record->save();
        return redirect()->back()->with('success', 'Record successfully deleted.');
    } else {
        return redirect()->back()->with('error', 'Record not found.');
    }
}

public function edit_single($id)
{

    $getRecord = ClassSubjectModel::getSingle($id);
    if(!empty($getRecord))
    {
        $data['getRecord'] = $getRecord;
        $data['getClass'] = ClassModel::getClass();
        $data['getSubject'] = SubjectModel::getSubject();
        $data['header_title'] = 'Edit Assign Subject';
        return view('admin.assign_subject.edit_single',$data);
    }
    else 
    {
        abort(404);
    }

}

public function update_single($id, Request $request)
{
 
         $getAlreadyFirst = ClassSubjectModel::getAlreadyFirst($request->class_id, $request->subject_id);
         if(!empty($getAlreadyFirst))
         {
             $getAlreadyFirst->status = $request->status; 
             $getAlreadyFirst->save();
             return redirect()->route('admin.assign_subject.list')->with('success', 'Status successfully Updated.');
         }
         else
         {
             $save =  ClassSubjectModel::getSingle($id);
           $save->class_id = $request->class_id;
           $save->subject_id = $request->subject_id; // Corrected assignment
           $save->status = $request->status; // Corrected typo
           $save->save();
           return redirect()->route('admin.assign_subject.list')->with('success', 'Subject successfully Assign to Class.');
         }
          
    
   
}



}
