@extends('layouts.app')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">


      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>My Student List </h1>
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
                <h3 class="card-title">My Student List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0" style="overflow:auto;">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Profile Image</th>
                      <th>Student Name</th>
                      <th>Email</th>
                      <th>Addmission Number</th>
                      <th>Roll Number</th>
                      <th>Class Name</th>
                      <th>Gender</th>
                      <th>Birth of Date</th>
                      <th>Caste</th>
                      <th>Religion</th>
                      <th>Mobile Number</th>
                      <th>Admission Date</th>
                      <th>Blood Group</th>
                      <th>Height</th>
                      <th>Weight</th>
                     <th>Created Date</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                  @if ($getRecord->isNotEmpty())
                  @foreach($getRecord as $value)
                    <tr>
                      <td>{{$value->id}}</td>
                      <td>
                      @if ($value->profile_image != "")
                          <img width="30" style="border-radius: 50%; width: 40px; height: 40px; object-fit: cover;" src="{{ asset('images/profile/'.$value->profile_image) }}" alt="">
                      @endif
                  </td>
                      <td>{{$value->name}} {{ $value->last_name }}</td>
                      <td>{{$value->email}}</td>
                      <td>{{$value->admission_number}}</td>
                      <td>{{$value->roll_number}}</td>
                      <td>{{$value->class_name}}</td>
                      <td>{{$value->gender}}</td>
                      @if(!empty($value->date_of_birth))
                      <td>{{date('d-m-Y ', strtotime($value->date_of_birth)) }}</td>
                      @endif
                      <td>{{$value->caste}}</td>
                      <td>{{$value->religion}}</td>
                      <td>{{$value->mobile_number}}</td>
                      @if(!empty($value->admission_date))
                      <td>{{date('d-m-Y ', strtotime($value->admission_date)) }}</td>
                      @endif
                      <td>{{$value->blood_group}}</td>
                      <td>{{$value->height}}</td>
                      <td>{{$value->weight}}</td>
                   
                      <!-- <td>{{ \Carbon\Carbon::parse($value->created_at)->format('d M, Y') }}</td> -->
                       <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                               
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
                {!! $getRecord->appends(request()->except('page'))->links() !!}
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