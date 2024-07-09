@extends('layouts.app')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">


      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Parent List  (Total:{{ $getRecord->count() }})</h1>
          </div>

          <div class="col-sm-6" style="text-align:right;">
          <a href="{{url('admin/parent/add')}}" class="btn btn-primary">Add new Parent</a>
            <h1></h1>
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
                <h3 class="card-title">Search Parent</h3>
              </div>
                       
                        <form method="get" action="" enctype="multipart/form-data">
                           
                            <div class="card-body">
                                <div class="row">
                                        <div class="form-group col-md-2">
                                            <label for="Name"> Name</label>
                                            <input type="text" class="form-control" id="" placeholder="" name="name" value="{{Request::get('name')}}" >
                                    </div>

                                    <div class="form-group col-md-2">
                                            <label for="Name">Last Name</label>
                                            <input type="text" class="form-control" id="" placeholder="" name="last_name" value="{{Request::get('last_name')}}" >
                                    </div>
                                  
                                        <div class="form-group col-md-2">
                                            <label for="Email">Email</label>
                                            <input type="text" class="form-control" id="" placeholder="" name="email" value="{{Request::get('email')}}" >
                                    </div>

                                   


                                    <div class="form-group col-md-2">
                                            <label for="class">Gender</label>
                                            <select class="form-control" id="gender" name="gender">
                                                <option value="">Select Gender</option>
                                                <option value="Male" {{ (Request::get('gender') == 'Male') ? 'selected' : '' }}>Male</option>
                                                <option value="Female" {{ (Request::get('gender') == 'Female') ? 'selected' : '' }}>Female</option>
                                                <option value="Other" {{ (Request::get('gender') == 'Other') ? 'selected' : '' }}>Other</option>
                                            </select>
                                    </div>

                                    <div class="form-group col-md-2">
                                            <label for="ocuupation">Occupation</label>
                                            <input type="text" class="form-control" id="" placeholder="" name="ocuupation" value="{{Request::get('ocuupation')}}" >
                                    </div>

                                    <div class="form-group col-md-2">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control" id="" placeholder="" name="address" value="{{Request::get('address')}}" >
                                    </div>

                                    <div class="form-group col-md-2">
                                            <label for="mobile_number">Mobile Number</label>
                                            <input type="text" class="form-control" id="" placeholder="" name="mobile_number" value="{{Request::get('mobile_number')}}" >
                                    </div>

                                 

                                    <div class="form-group col-md-2">
                                            <label for="class">Status</label>
                                            <select class="form-control" id="gender" name="status">
                                                <option value="">Select Status</option>
                                                <option value="100" {{ (Request::get('status') == 100) ? 'selected' : '' }}>Active</option>
                                                <option value="1" {{ (Request::get('status') == 1) ? 'selected' : '' }}>Inactive</option>
                                               
                                            </select>
                                          </div>

                                  

                                    <div class="form-group col-md-2">
                                            <label for="Date">Created Date</label>
                                            <input type="date" class="form-control" id="" placeholder="" name="date" value="{{Request::get('date')}}" >
                                    </div>

                                    <div class="form-group col-md-3">
                                           <button class="btn btn-primary" style="margin-top:30px;" type="submit">Search</button>
                                           <a href="{{ route('admin.parent.list') }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>

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

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Parent List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Profile Image</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Gender</th>
                      <th>Phone</th>
                      <th>Occupation</th>
                      <th>Address</th>
                      <th>Status</th>
                     <th>User Type</th>
                    <th>Created Date</th>
                      <th>Action</th>
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

                      <td>{{$value->name}} {{$value->last_name}}</td>
                      <td>{{$value->email}}</td>
                      <td>{{$value->gender}}</td>
                      <td>{{$value->mobile_number}}</td>
                      <td>{{$value->occupation}}</td>
                      <td>{{$value->address}}</td>
                      <td>{{$value->usertype}}</td>
                      <td class="">
                                @if($value->status == 0)
                                    Active
                                @elseif($value->status == 1)
                                    Inactive
                                @endif
                            </td>
                      <!-- <td>{{ \Carbon\Carbon::parse($value->created_at)->format('d M, Y') }}</td> -->
                       <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                      <td>
                      <a class="btn btn-primary" href="{{ route('admin.parent.edit',$value->id) }}"> <i class="fas fa-edit"></i></a>

                      <a href="{{ route('admin.parent.my_student',$value->id) }}" class="btn btn-primary">My Student</a>

                      <a href="{{url ('admin/parent/delete/'.$value->id)}}" class="btn btn-danger"> <i class="fas fa-trash-alt"></i></a>
                      
                                   
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