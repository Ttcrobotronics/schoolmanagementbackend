<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
use Str;

class TeacherController extends Controller
{
    //
    public function list()
    {
        $data['getRecord'] = User::getTeacher();
        $data['header_title'] = "Teacher List";
         return view('admin.teacher.list',$data);
    }

    // public function list()
    // {
    //     $getRecord = User::paginate(5); // Adjust the number of items per page as needed
    // return view('admin.admin.list', compact('getRecord'));
    // }

    public function add(){
        $data['header_title'] = 'Add New Teacher';
        return view('admin.teacher.add',$data);
    }

    public function insert(Request $request)
    {
        $request->validate([
          
            'email' => 'required|email|unique:users',
            'mobile_number' => 'max:15|min:8',
            'marital_status' => 'max:50'
           
        ]);

        $teacher = new User;
        $teacher->name = trim($request->name);
        $teacher->last_name = trim($request->last_name);
        $teacher->gender = trim($request->gender);
          if(!empty($request->date_of_birth))
          {
            $teacher->date_of_birth = trim($request->date_of_birth);
          }
      
       
        if(!empty($request->admission_date))
        {
            $teacher->admission_date = trim($request->admission_date);
        }
       
        $teacher->marital_status = trim($request->marital_status);
        $teacher->mobile_number = trim($request->mobile_number);
        $teacher->address = trim($request->address);
        $teacher->permanent_address = trim($request->permanent_address);
        $teacher->qualification = trim($request->qualification);
        $teacher->work_experience = trim($request->work_experience);
        $teacher->note = trim($request->note);
        $teacher->email = trim($request->email);
        $teacher->password = Hash::make($request->password);
        $teacher->status = trim($request->status);
        $teacher->usertype = 'teacher';
        
        if ($request->hasFile('profile_image')) {
            $profileImage = $request->file('profile_image');
            $profileImageName = time() . '.' . $profileImage->getClientOriginalExtension();
            $profileImage->move(public_path('images/profile'), $profileImageName);
            $teacher->profile_image = $profileImageName;
        }
        
       
        $teacher->save();
    
        return redirect('admin/teacher/list')->with('success', 'Teacher successfully created');
    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if(!empty( $data['getRecord']))
        {
        $data['header_title'] = "Edit Teacher";
        return view('admin.teacher.edit',$data); 
        }
        else 
        {
            abort(404);
        }
    }

    public function update($id,Request $request)
    {
        $request->validate([
        
            'email' => 'required|email|unique:users,email,'.$id,
            'mobile_number' => 'max:15|min:8',
            'marital_status' => 'max:50'
           
        ]);

        $teacher =  User::getSingle($id);
        $teacher->name = trim($request->name);
        $teacher->last_name = trim($request->last_name);
        $teacher->gender = trim($request->gender);
          if(!empty($request->date_of_birth))
          {
            $teacher->date_of_birth = trim($request->date_of_birth);
          }
          if(!empty($request->admission_date))
          {
            $teacher->admission_date = trim($request->admission_date);
          }
     
       
        
        if ($request->hasFile('profile_image')) {
            // Delete the old image if a new one is uploaded
            if ($teacher->profile_image && file_exists(public_path('images/profile/' . $teacher->profile_image))) {
                unlink(public_path('images/profile/' . $teacher->profile_image));
            }
    
            $profileImage = $request->file('profile_image');
            $profileImageName = time() . '.' . $profileImage->getClientOriginalExtension();
            $profileImage->move(public_path('images/profile'), $profileImageName);
            $teacher->profile_image = $profileImageName;
        }
        $teacher->marital_status = trim($request->marital_status);
        $teacher->address = trim($request->address);
        $teacher->permanent_address = trim($request->permanent_address);
        $teacher->qualification = trim($request->qualification);
        $teacher->work_experience = trim($request->work_experience);
        $teacher->note = trim($request->note);
        $teacher->mobile_number = trim($request->mobile_number);
        $teacher->status = trim($request->status);
        $teacher->email = trim($request->email);
         
        if(!empty($request->password))
        {
            $teacher->password = Hash::make($request->password);
        }
        
       
        $teacher->save();
    
        return redirect('admin/teacher/list')->with('success', 'Teacher successfully updated');

    }

    public function delete($id)
    {
        $getRecord = User::find($id);
        if($getRecord) {
            $getRecord->is_delete = 1;
            $getRecord->save();
            return redirect()->back()->with('success', 'Teacher successfully deleted');
        } else {
            return abort(404);
        }
    }
    

}
