<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\ClassModel;

class ClassController extends Controller
{
    //list function
    public function list(){
        $data['getRecord'] = ClassModel::getRecord();
        $data['header_title'] = 'Class List';
        return view('admin.class.list',$data);
    }
    
    // public function list()
    // {
    //     $getRecord = ClassModel::paginate(1); // Adjust the number of items per page as needed
    // return view('admin.class.list', compact('getRecord'));
    // }
    

    public function add(){
        $data['header_title'] = 'Add New Class';
        return view('admin.class.add',$data);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|integer|in:0,1',
        ]);
    
        $class = new ClassModel();
        $class->name = $request->name;
        $class->status = $request->status;
        $class->created_by = Auth::user()->id;
        $class->save();
    
        return redirect()->route('admin.class.list')->with('success', 'Class successfully created');
    }

    public function edit($id){
        $data['getRecord'] = ClassModel::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title'] = "Edit  Class";
            return view('admin.class.edit',$data);
        }
        else{
            abort(404);
        }
       
    }

    public function update($id, Request $request){

        $class = ClassModel::getSingle($id);
        $class->name = trim($request->name);
        $class->status = trim($request->status);
        $class->created_by = Auth::user()->id;
        $class->save();

        return redirect()->route('admin.class.list')->with('success', 'Class successfully updated');
    }

    public function destroy($id) {
        $user = ClassModel::findOrFail($id);

      

       // delete product from database
       $user->delete();

       return redirect('admin/class/list')->with('success', 'Class successfully deleted');
    }

    
}
