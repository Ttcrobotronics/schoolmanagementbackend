@extends('layouts.app')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">


      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Parent Student List ({{ $getParent->name }} {{ $getParent->last_name }}) </h1>
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
   

        <div class="card">
               <div class="card-header">
                <h3 class="card-title">Search Student</h3>
              </div>
                       
                        <form method="get" action="" enctype="multipart/form-data">
                           
                            <div class="card-body">
                                <div class="row">

                              

                                        <div class="form-group col-md-2">
                                            <label for="Name">Student Id</label>
                                            <input type="text" class="form-control" id="" placeholder="Student Id" name="id" value="{{Request::get('id')}}" >
                                    </div>
                                    <div class="form-group col-md-2">
                                            <label for="Name">Name</label>
                                            <input type="text" class="form-control" id="" placeholder="Name" name="name" value="{{Request::get('name')}}" >
                                    </div>

                                    <div class="form-group col-md-2">
                                            <label for="Name">Last Name</label>
                                            <input type="text" class="form-control" id="" placeholder="Last Name" name="last_name" value="{{Request::get('last_name')}}" >
                                    </div>
                                  
                                        <div class="form-group col-md-2">
                                            <label for="Email">Email</label>
                                            <input type="text" class="form-control" id="" placeholder="Email" name="email" value="{{Request::get('email')}}" >
                                    </div>

                                    <div class="form-group col-md-3">
                                           <button class="btn btn-primary" style="margin-top:30px;" type="submit">Search</button>
                                           <a href="{{ url('admin/parent/my-student/'.$parent_id) }}"class="btn btn-success" style="margin-top: 30px;">Reset</a>

                                    </div>
                                    </div>
                            </div>
                        </form>
                      </div>

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

          @if(!empty($getSearchStudent))

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Student List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Profile Image</th>
                      <th>Student Name</th>
                      <th>Email</th>
                     <th>Parent Name</th>
                    <th>Created Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                
                  @foreach($getSearchStudent as $value)
                    <tr>
                      <td>{{$value->id}}</td>
                      <td>
                                    @if ($value->profile_image != "")
                                        <img width="30" src="{{ asset('images/profile/'.$value->profile_image) }}" alt="">
                                    @endif
                     </td>
                      <td>{{$value->name}} {{$value->last_name}}</td>
                      <td>{{$value->email}}</td>
                      <td>{{$value->parent_name}}</td>
                     
                      <!-- <td>{{ \Carbon\Carbon::parse($value->created_at)->format('d M, Y') }}</td> -->
                       <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                      <td style="min-width:150px;">
                      <a class="btn btn-primary btn-sm" href="{{ route('admin.parent.assign_student_parent', [$value->id, $parent_id]) }}">Add Student to Parent</a>


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
            @endif
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Parent Student List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
              <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Profile Image</th>
                      <th>Student Name</th>
                      <th>Email</th>
                       <th>Parent Name</th>
                      <th>Created Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                
                  @foreach($getRecord as $value)
                    <tr>
                      <td>{{$value->id}}</td>
                      <td>
                                    @if ($value->profile_image != "")
                                        <img width="30" src="{{ asset('images/profile/'.$value->profile_image) }}" alt="">
                                    @endif
                                    </td>
                                      <td>{{$value->name}} {{$value->last_name}}</td>
                                      <td>{{$value->email}}</td>
                                      <td>{{$value->parent_name}}</td>
                     
                      <!-- <td>{{ \Carbon\Carbon::parse($value->created_at)->format('d M, Y') }}</td> -->
                       <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                      <td style="min-width:150px;">
                      <a class="btn btn-danger btn-sm" href="{{ route('admin.parent.assign_student_parent_delete', [$value->id]) }}">Delete</a>

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