@extends('layouts.app')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">


      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>My Student</h1>
          </div>

      

          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Simple Tables</li>
            </ol>
          </div> -->
        </div>
      </div>
      <!-- /.container-fluid -->
            </section>
        <section class="content-header">
        <div class="container-fluid">
   
                      </div>
                      </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          
          <!-- /.col -->
          <div class="col-md-12">
          @include('_message')
            <!-- /.card -->


            <div class="card">
              <div class="card-header">
                <h3 class="card-title">My Student</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0" style="overflow:auto;">
              <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Profile Image</th>
                      <th>Student Name</th>
                      <th>Email</th>
                      <th>Class Name</th>
                      <th>Mobile Number</th>
                      <th>Addmission Number</th>
                      <th>Roll Number</th>
                      <th>Gender</th>
                      <th>Birth of Date</th>
                      <th>User Type</th>
                      <th>Created Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                
                  @foreach($getRecord as $value)
                    <tr>
                      <td>
                                    @if ($value->profile_image != "")
                                        <img width="30" src="{{ asset('images/profile/'.$value->profile_image) }}" alt="">
                                    @endif
                     </td>
                      <td>{{$value->name}} {{ $value->last_name }}</td>
                      <td>{{$value->email}}</td>
                      <td>{{$value->class_name}}</td>
                      <td>{{$value->mobile_number}}</td>
                      <td>{{$value->admission_number}}</td>
                      <td>{{$value->roll_number}}</td>
                      <td>{{$value->gender}}</td>
                      @if(!empty($value->date_of_birth))
                      <td>{{date('d-m-Y ', strtotime($value->date_of_birth)) }}</td>
                      @endif
                      <td>{{$value->usertype}}</td>
                   
                      <!-- <td>{{ \Carbon\Carbon::parse($value->created_at)->format('d M, Y') }}</td> -->
                       <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                       <td style="min-width:350px">
                        <a class="btn btn-success"  href="{{ route('parent.my_student.subject',$value->id) }}">Subject</a>
                        <a class="btn btn-primary"  href="{{ route('parent.my_student.exam_timetable',$value->id) }}">Exam Timetable</a>
                        <a class="btn btn-warning"  href="{{ route('parent.my_student.calendar',$value->id) }}">Calendar</a>
                       </td>    
                       </tr>
                  @endforeach
                  </tbody>
                </table>
                <div style="padding:10px; float:right;">
                </div>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- /.col -->
        </div>
       
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 

  @endsection