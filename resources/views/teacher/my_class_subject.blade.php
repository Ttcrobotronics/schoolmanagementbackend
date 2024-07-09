@extends('layouts.app')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">


      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>My Class & Subject</h1>
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
                <h3 class="card-title">My Class & Subject</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                   
                      <th>Class Name</th>
                      <th>Subject Name</th>
                      <th>Subject Type</th>
                      <th>My Class Timetable</th>
                      <th>Created Date</th>
                      <th>Action</th>
                    
                    </tr>
                  </thead>
                  <tbody>
                 
                  @if ($getRecord->isNotEmpty())
                  @foreach($getRecord as $value)
                    <tr>
                    
                      <td>{{$value->class_name}}</td>
                      <td>{{$value->subject_name}}</td>
                      <td>{{$value->subject_type}}</td>
                     
                      <td>
                      @php
                      $ClassSubject = $value->getMyTimeTable($value->class_id, $value->subject_id);
                      @endphp

                      @if(!empty($ClassSubject))

         {{ date('h:i A',strtotime($ClassSubject->start_time))}} to  {{ date('h:i A',strtotime($ClassSubject->end_time))}}
           </br>   
           Room Number : {{$ClassSubject->room_number}}  
             
         @endif
                     
                      </td>
                      <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                      <td>
                      <a href="{{ route('teacher.my_class_subject.class_timetable', ['class_id' => $value->class_id, 'subject_id' => $value->subject_id]) }}" class="btn btn-primary">My Class Timetable</a>

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
                <div style="padding:10px; float:right;">
              
                </div>
                
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