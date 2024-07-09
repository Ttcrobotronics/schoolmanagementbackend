@extends('layouts.app')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">


      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Student Subject <span style="color:blue;">({{$getUser->name}} {{$getUser->last_name}})</span></h1>
          </div>
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
                <h3 class="card-title">Student Subject</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Subject Name</th>
                      <th>Subject type</th>
                      <th>Action</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                  @if ($getRecord->isNotEmpty())
                 @foreach($getRecord as $value)

                            <tr>
                                <td>{{$value->subject_name}} </td>
                                <td>{{$value->subject_type}} </td>
                                <td>
                                <a href="{{ route('parent.my_student.subject.class_timetable', ['class_id' => $value->class_id, 'subject_id' => $value->subject_id, 'student_id' => $getUser->id]) }}" class="btn btn-primary">My Class Timetable</a>

                      </td>
                            </tr>

                 @endforeach
                 @else
                  <tr>
                      <td colspan="10">No records found.</td>
                  </tr>
              @endif
                  </tbody>
                </table>
               
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
       
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
 
  @endsection