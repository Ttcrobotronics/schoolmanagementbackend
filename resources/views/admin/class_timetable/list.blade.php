@extends('layouts.app')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">


      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Class Timetable</h1>
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
                <h3 class="card-title">Search Class Timetable List</h3>
              </div>
                       
                        <form method="get" action="" enctype="multipart/form-data">
                           
                            <div class="card-body">
                                <div class="row">
                                        <div class="form-group col-md-3">
                                            <label for="Name">Class Name</label>
                                            <select class="form-control getClass" id="class" name="class_id" required>
                                                <option value="">Select class</option>
                                               @foreach($getClass as $class)
                                               <option {{(Request::get('class_id') == $class->id)? 'selected' : ''}} value="{{ $class->id}}">{{ $class->name}}</option>

                                               @endforeach
                                            </select>
                                            
                                    </div>
                                  
                                   
                                        <div class="form-group col-md-3">
                                            <label for="Name">Subjet Name</label>
                                            <select class="form-control getSubject" id="subject" name="subject_id" required>
                                                <option value="">Select Subject</option>
                                                @if(!empty($getSubject))
                                                @foreach($getSubject as $subject)
                                               <option {{(Request::get('subject_id') == $subject->subject_id)? 'selected' : ''}} value="{{ $subject->subject_id}}">{{ $subject->subject_name}}</option>
                                               @endforeach
                                               @endif
                                            </select>
                                    </div>

                                  

                                    <div class="form-group col-md-3">
                                           <button class="btn btn-primary" style="margin-top:30px;" type="submit">Search</button>
                                           <a href="{{ route('admin.class_timetable.list') }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>

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
        
            <!-- /.card -->
@if(!empty(Request::get('class_id')) && !empty(Request::get('subject_id')))
<form action="{{ route('admin.class_timetable.insert_update') }}"method="post">
  {{ csrf_field() }}
  <input type="hidden" name="subject_id" value="{{Request::get('subject_id')}}">
  <input type="hidden" name="class_id" value="{{Request::get('class_id')}}">
  @include('_message')
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Class Timetable</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Week</th>
                      <th>Start Time</th>
                      <th>End Time</th>
                      <th>Room Number</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    
                    $i = 1;
                    @endphp
                 @foreach($week as $value)

                 <tr>
                  <th>
                  <input type="hidden" name="timetable[{{ $i }}][week_id]" value="{{$value['week_id']}}">
                    {{$value['week_name']}}
                  </th>
                  <td>
                    <input type="time" name="timetable[{{ $i }}][start_time]" value="{{$value['start_time']}}" class="form-control">
                  </td>
                  <td>
                  <input type="time" name="timetable[{{ $i }}][end_time]"  value="{{$value['end_time']}}" class="form-control">
                  </td>
                  <td>
                  <input type="text" name="timetable[{{ $i }}][room_number]"  value="{{$value['room_number']}}" class="form-control" style="width:200px;">
                  </td>
                 
                 </tr>
                 @php
                    
                    $i++;
                    @endphp
                 @endforeach
                  </tbody>
                </table>
                <div style="text-align:center;padding:20px;">
               <button class="btn btn-primary">Submit</button>
               </div>
              </div>
              <!-- /.card-body -->
            </div>
            </form>
            @endif


            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
       
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
  
  @endsection

  @section('script')

<script type="text/javascript">
    $('.getClass').change(function(){
   var class_id = $(this).val();
   $.ajax({
       url:"{{ url('admin/class_timetable/get_subject') }}",
       type: "POST",
       data:{
        "_token": "{{ csrf_token() }}",
        class_id:class_id,
       },
       dataType:"json",
       success:function(response){
        $('.getSubject').html(response.html);
          
       },
   });
    });
</script>

  @endsection