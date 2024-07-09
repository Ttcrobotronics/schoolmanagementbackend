<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    //

public function dashboard(){

  $data['header_title'] = 'Dashboard';

    if(Auth::user()->usertype == "admin")
    {
      return view('admin.dashboard',$data);

    }

    else if(Auth::user()->usertype == "teacher")
    {
      return view('teacher.dashboard',$data);
      
    }

    else if(Auth::user()->usertype == "student")
    {
      return view('student.dashboard',$data);
      
    }

    else if(Auth::user()->usertype == "parent")
    {
      return view('parent.dashboard',$data);
      
    }



}

}
