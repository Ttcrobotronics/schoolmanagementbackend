@extends('layouts.app')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">


      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Exam List  (Total:{{ $getRecord->count() }})</h1>
          </div>

          <div class="col-sm-6" style="text-align:right;">
          <a href="{{ route('admin.examinations.exam.add') }}" class="btn btn-primary">Add new Exam</a>

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
                <h3 class="card-title">Search Exam</h3>
              </div>
                       
                        <form method="get" action="" enctype="multipart/form-data">
                           
                            <div class="card-body">
                                <div class="row">
                                        <div class="form-group col-md-3">
                                            <label for="Name">Exam Name</label>
                                            <input type="text" class="form-control" id="" placeholder="Exam Name" name="name" value="{{Request::get('name')}}" >
                                    </div>
                                  
                                       

                                    <div class="form-group col-md-3">
                                            <label for="Date">Date</label>
                                            <input type="date" class="form-control" id="" placeholder="Date" name="date" value="{{Request::get('date')}}" >
                                    </div>

                                    <div class="form-group col-md-3">
                                           <button class="btn btn-primary" style="margin-top:30px;" type="submit">Search</button>
                                           <a href="{{ route('admin.examinations.exam.list') }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>


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
                <h3 class="card-title">Exam List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Exam Name</th>
                      <th>Note</th>
                    <th>Created By</th>
                    <th>Created Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @if ($getRecord->isNotEmpty())
                  @foreach($getRecord as $value)
                    <tr>
                      <td>{{$value->id}}</td>
                      <td>{{$value->name}}</td>
                      <td>{{$value->note}}</td>
                      <td>{{$value->created_name}}</td>
                     
                      <!-- <td>{{ \Carbon\Carbon::parse($value->created_at)->format('d M, Y') }}</td> -->
                       <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                      <td>
                      <a class="btn btn-primary" href="{{ route('admin.examinations.exam.edit',$value->id) }}"> <i class="fas fa-edit"></i></a>

                      <a href="{{ url('admin/examinations/exam/delete/' . $value->id) }}" class="btn btn-danger"> <i class="fas fa-trash-alt"></i></a>
                                    
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