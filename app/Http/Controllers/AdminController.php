<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    //
    // public function list()
    // {
    //     $data['getRecord'] = User::getAdmin();
    //     $data['header_title'] = "Admin List";
    //      return view('admin.admin.list',$data);
    // }

    public function list()
    {
        $getRecord = User::paginate(5); // Adjust the number of items per page as needed
    return view('admin.admin.list', compact('getRecord'));
    }

    public function add()
    {
        
        $data['header_title'] = "Add new Admin";
         return view('admin.admin.add',$data);
    }

    public function insert(Request $request){
        // Validate incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'usertype' => 'required|string|in:admin,student,teacher,parent',
        ]);
    
        // Create new User instance and save to database
        $user = new User;
        $user->name = trim($request->name);
       
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->usertype = trim($request->usertype);
        $user->save();
    
        return redirect('admin/admin/list')->with('success', 'Admin successfully created');
    }

     // This method will show edit product page
     public function edit($id) {
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title'] = "Edit  Admin";
            return view('admin.admin.edit',$data);
        }
        else{
            abort(404);
        }
       
    }

    public function update($id, Request $request)
    {
        $request->validate([
        'name' => 'required|string|max:255',
        'password' => 'nullable|string|min:6',
        'usertype' => 'required|string|in:admin,student,teacher,parent',
        ]);

        
    
        // Create new User instance and save to database
        $user =  User::getSingle($id);
        $user->name = trim($request->name);
        $user->email = trim($request->email);
       
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
       
        $user->usertype = trim($request->usertype);
        $user->save();
        return redirect('admin/admin/list')->with('success', 'Admin successfully updated');
    }


    public function destroy($id) {
        $user = User::findOrFail($id);

       // delete image
       File::delete(public_path('images/profile/'.$user->image));

       // delete product from database
       $user->delete();

       return redirect('admin/admin/list')->with('success', 'Admin successfully deleted');
    }
    
}
