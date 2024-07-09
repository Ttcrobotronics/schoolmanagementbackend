<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ClassModel;
use Hash;
use Auth;
use Str;

class StudentController extends Controller
{
    
    public function list()
    {
        $data['getRecord'] = User::getStudent();
        $data['header_title'] = "Student List";
         return view('admin.student.list',$data);
    }

    // public function list()
    // {
    //     $getRecord = User::paginate(5); // Adjust the number of items per page as needed
    // return view('admin.admin.list', compact('getRecord'));
    // }

    public function add()
    {
        $data['getClass'] = ClassModel::getClass();
        $data['header_title'] = "Add New Student";
        return view('admin.student.add',$data);
    }

    public function insert(Request $request)
    {
        $request->validate([
          
            'email' => 'required|email|unique:users',
            'height' => 'max:10',
            'blood_group' => 'max:10',
            'mobile_number' => 'max:15|min:8',
            'caste' => 'max:50',
            'religion' => 'max:50',
            'admission_number' => 'max:50',
            'roll_number' => 'max:50',
            'weight' => 'max:10'
           
        ]);

        $student = new User;
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->admission_number = trim($request->admission_number);
        $student->roll_number = trim($request->roll_number);
        $student->class_id = trim($request->class_id);
        $student->gender = trim($request->gender);
          if(!empty($request->date_of_birth))
          {
            $student->date_of_birth = trim($request->date_of_birth);
          }
        $student->caste = trim($request->caste);
        $student->religion = trim($request->religion);
        $student->mobile_number = trim($request->mobile_number);
        $student->blood_group = trim($request->blood_group);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->status = trim($request->status);
        if(!empty($request->admission_date))
        {
            $student->admission_date = trim($request->admission_date);
        }
       
        $student->state = trim($request->state);
        $student->city = trim($request->city);
        $student->country = trim($request->country);
        $student->email = trim($request->email);
        $student->password = Hash::make($request->password);
        $student->usertype = 'student';
        
        if ($request->hasFile('profile_image')) {
            $profileImage = $request->file('profile_image');
            $profileImageName = time() . '.' . $profileImage->getClientOriginalExtension();
            $profileImage->move(public_path('images/profile'), $profileImageName);
            $student->profile_image = $profileImageName;
        }
        
       
        $student->save();
    
        return redirect('admin/student/list')->with('success', 'Student successfully created');
    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if(!empty( $data['getRecord']))
        {
        $data['getClass'] = ClassModel::getClass();
        $data['header_title'] = "Edit Student";
        return view('admin.student.edit',$data); 
        }
        else 
        {
            abort(404);
        }
    }
    //    update function

    public function update($id,Request $request)
    {
        $request->validate([
          
            'email' => 'required|email|unique:users,email,'.$id,
            'height' => 'max:10',
            'blood_group' => 'max:10',
            'mobile_number' => 'max:15|min:8',
            'caste' => 'max:50',
            'religion' => 'max:50',
            'admission_number' => 'max:50',
            'roll_number' => 'max:50',
            'weight' => 'max:10'
           
        ]);

        $student =  User::getSingle($id);
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->admission_number = trim($request->admission_number);
        $student->roll_number = trim($request->roll_number);
        $student->class_id = trim($request->class_id);
        $student->gender = trim($request->gender);
          if(!empty($request->date_of_birth))
          {
            $student->date_of_birth = trim($request->date_of_birth);
          }
        $student->caste = trim($request->caste);
        $student->religion = trim($request->religion);
        $student->mobile_number = trim($request->mobile_number);
        $student->blood_group = trim($request->blood_group);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->status = trim($request->status);
        $student->admission_date = trim($request->admission_date);
        $student->state = trim($request->state);
        $student->city = trim($request->city);
        $student->country = trim($request->country);
        $student->email = trim($request->email);
        if(!empty($request->password))
        {
            $student->password = Hash::make($request->password);
        }
       
        
        if ($request->hasFile('profile_image')) {
            // Delete the old image if a new one is uploaded
            if ($student->profile_image && file_exists(public_path('images/profile/' . $student->profile_image))) {
                unlink(public_path('images/profile/' . $student->profile_image));
            }
    
            $profileImage = $request->file('profile_image');
            $profileImageName = time() . '.' . $profileImage->getClientOriginalExtension();
            $profileImage->move(public_path('images/profile'), $profileImageName);
            $student->profile_image = $profileImageName;
        }
        
       
        $student->save();
    
        return redirect('admin/student/list')->with('success', 'Student successfully updated');

    }

    public function delete($id)
    {
        $getRecord = User::getSingle($id);
        if(!empty($getRecord))
        {
            $getRecord->is_delete = 1;
            $getRecord->save();
            return redirect()->back()->with('success', 'Student successfully deleted');
        }
        else
        {
           abort(404);
        }

    }

    // teacher side work

    public function MyStudent()
    {
        $data['getRecord'] = User::getTeacherStudent(Auth::user()->id);
        $data['header_title'] = "My Student List";
         return view('teacher.my_student',$data);  
    }

   

}
