<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;

class UserController extends Controller
{

    // account
    public function MyAccount()
    {
        $data['getRecord'] = User::getSingle(Auth::user()->id);
        $data['header_title'] = "My Account";
        if(Auth::user()->usertype == 'admin')
        {
            return view('admin.my_account', $data);
        }
        else if(Auth::user()->usertype == 'teacher')
        {
            return view('teacher.my_account', $data);
        }
        else if(Auth::user()->usertype == 'student')
        {
        return view('student.my_account', $data);
        }
        else if(Auth::user()->usertype == 'parent')
        {
        return view('parent.my_account', $data);
        }
    }
    public function UpdateMyAccount(Request $request)
    {
        $id = Auth::user()->id;
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
        $teacher->mobile_number = trim($request->mobile_number);
        $teacher->email = trim($request->email);
    
        $teacher->save();
    
        return redirect()->back()->with('success', 'Account successfully updated');
    }


    public function UpdateMyAccountStudent(Request $request)
    {
        $id = Auth::user()->id;
        $request->validate([
            'email' => 'required|email|unique:users,email,'.$id,
            'height' => 'max:10',
            'blood_group' => 'max:10',
            'mobile_number' => 'max:15|min:8',
            'caste' => 'max:50',
            'religion' => 'max:50',
            'weight' => 'max:10'
        ]);
            
        $student =  User::getSingle($id);
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
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
        $student->email = trim($request->email);
    
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
        
            return redirect()->back()->with('success', 'Account successfully updated');
    }

    // parent update profile
    public function UpdateMyAccountParent(Request $request)
    {
        $id = Auth::user()->id;
        $request->validate([
            'email' => 'required|email|unique:users,email,'.$id,
            'mobile_number' => 'max:15|min:8',
            'occupation' => 'max:255',
            'address' => 'max:255',
        ]);
            
        $parent =  User::getSingle($id);
        $parent->name = trim($request->name);
        $parent->last_name = trim($request->last_name);
        $parent->gender = trim($request->gender);
        $parent->mobile_number = trim($request->mobile_number);
        $parent->email = trim($request->email);
        $parent->usertype = 'parent';
        $parent->occupation = trim($request->occupation);
        $parent->address = trim($request->address);

        if ($request->hasFile('profile_image')) {
            // Delete the old image if a new one is uploaded
            if ($parent->profile_image && file_exists(public_path('images/profile/' . $parent->profile_image))) {
                unlink(public_path('images/profile/' . $parent->profile_image));
            }
    
            $profileImage = $request->file('profile_image');
            $profileImageName = time() . '.' . $profileImage->getClientOriginalExtension();
            $profileImage->move(public_path('images/profile'), $profileImageName);
            $parent->profile_image = $profileImageName;
        }
        
       
        $parent->save();
        
            return redirect()->back()->with('success', 'Account successfully updated');
    }

    //change password function
    public function change_password()
    {
        $data['header_title'] = "Change Password";
        return view('profile.change_password', $data);
    }

    public function update_change_password(Request $request)
    {
        $user = User::getSingle(Auth::user()->id);
        if(Hash::check($request->old_password,$user->password))
        {
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect()->back()->with('success',"Password successfully updated.");
        }
        else
        {
            return redirect()->back()->with('error',"Old Password is not Correct.");
        }
    }


    // admin edit profile

    public function UpdateMyAccountAdmin(Request $request)
    {
        $id = Auth::user()->id;
        $request->validate([
            'email' => 'required|email|unique:users,email,'.$id,
           
        ]);

        $admin =  User::getSingle($id);
        $admin->name = trim($request->name);
        $admin->last_name = trim($request->last_name);
        $admin->email = trim($request->email);
        $admin->save();
        return redirect()->back()->with('success', 'Account successfully updated');
    }
}
