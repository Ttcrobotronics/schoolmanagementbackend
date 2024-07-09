<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
use Str;

class ParentController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getParent();
        $data['header_title'] = "Parent List";
         return view('admin.parent.list',$data);
    }

    // public function list()
    // {
    //     $getRecord = User::paginate(5); // Adjust the number of items per page as needed
    // return view('admin.admin.list', compact('getRecord'));
    // }

    public function add()
    {
      
        $data['header_title'] = "Add New Parent";
        return view('admin.parent.add',$data);
    }

    public function insert(Request $request)
    {
        $request->validate([
          
            'email' => 'required|email|unique:users',
            'mobile_number' => 'max:15|min:8',
            'occupation' => 'max:255',
            'address' => 'max:255',
        ]);

        $student = new User;
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->gender = trim($request->gender);
        $student->mobile_number = trim($request->mobile_number);
        $student->status = trim($request->status);
        $student->email = trim($request->email);
        $student->password = Hash::make($request->password);
        $student->usertype = 'parent';
        $student->occupation = trim($request->occupation);
        $student->address = trim($request->address);
        if ($request->hasFile('profile_image')) {
            $profileImage = $request->file('profile_image');
            $profileImageName = time() . '.' . $profileImage->getClientOriginalExtension();
            $profileImage->move(public_path('images/profile'), $profileImageName);
            $student->profile_image = $profileImageName;
        }
        
       
        $student->save();
    
        return redirect('admin/parent/list')->with('success', 'Parent successfully created');
    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if(!empty( $data['getRecord']))
        {
       
        $data['header_title'] = "Edit Parent";
        return view('admin.parent.edit',$data); 
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
            'occupation' => 'max:255',
            'address' => 'max:255',
        ]);

        $student =  User::getSingle($id);
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->gender = trim($request->gender);
        $student->mobile_number = trim($request->mobile_number);
        $student->status = trim($request->status);
        $student->email = trim($request->email);
        if(!empty($request->password))
        {
            $student->password = Hash::make($request->password);
        }
        $student->usertype = 'parent';
        $student->occupation = trim($request->occupation);
        $student->address = trim($request->address);

        // $student->status = trim($request->status);
        // if(!empty($request->password))
        // {
        //     $student->password = Hash::make($request->password);
        // }
       
        
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
    
        return redirect('admin/parent/list')->with('success', 'Parent successfully updated');
    }

    public function delete($id)
    {
        $getRecord = User::getSingle($id);
        if(!empty($getRecord))
        {
            $getRecord->is_delete = 1;
            $getRecord->save();
            return redirect()->back()->with('success', 'Parent successfully deleted');
        }
        else
        {
           abort(404);
        }

    }

    public function myStudent($id)
    {
        $data['getParent'] = User::getSingle($id);
        $data['parent_id'] = $id;
        $data['getSearchStudent'] = User::getSearchStudent();
        $data['getRecord'] = User::getMyStudent($id);
        $data['header_title'] = "Parent Student List";
         return view('admin.parent.my_student',$data);
    }

    public function assignStudentParent($student_id,$parent_id)
    {
    $student = User::getSingle($student_id);
    $student->parent_id = $parent_id;
    $student->save();
    return redirect()->back()->with('success', 'Student successfully Assign.');
    }

    public function assignStudentParentDelete($student_id)
    {
    $student = User::getSingle($student_id);
    $student->parent_id = null;
    $student->save();
    return redirect()->back()->with('success', 'Student successfully Assign Deleted.');
    }


    public function myStudentParent()
    {
        $id = Auth::user()->id;
        $data['getRecord'] = User::getMyStudent($id);
        $data['header_title'] = "My Student";
         return view('parent.my_student',$data);
    }

}
