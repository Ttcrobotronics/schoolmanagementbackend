@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Assign Subject</h1>
                    
                </div>
                <div class="col-sm-6" style="text-align:right;">
          <a href="{{url('admin/assign_subject/list')}}" class="btn btn-primary">List</a>
            <h1></h1>
          </div>
               
            </div>
          
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Form</h3>
                        </div>
                        <form method="post" action="{{ route('admin.assign_subject.update',$getRecord->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="className">Class Name</label>
                                            <select class="form-control" id="status" name="class_id" required>
                                                <option value="">Select class</option>
                                               @foreach($getClass as $class)
                                               <option {{ ($getRecord->class_id == $class->id) ? 'selected' : '' }} value="{{ $class->id}}">{{ $class->name}}</option>

                                               @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                        <label for="className">Subject Name</label>
                                               @foreach($getSubject as $subject)
                                               @php
                                                $checked = "";
                                               @endphp

                                               @foreach($getAssignSubjectID as $subjectAssign)
                                                @if($subjectAssign->subject_id == $subject->id)

                                                @php
                                                $checked = "checked";
                                               @endphp

                                                @endif
                                               @endforeach
                                             
                                               <div>
                                              <label for="" style="font-weight:normal;">
                                               <input {{$checked}} type="checkbox" name="subject_id[]" value="{{$subject->id}}"> {{$subject->name}}
                                               </label>
                                               </div>
                                               @endforeach
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                                                <option value="">Select status</option>
                                                <option  {{ ($getRecord->status == 0) ? 'selected' : '' }} value="0" {{ old('status') == '0' ? 'selected' : '' }}>Active</option>
                                                <option  {{ ($getRecord->status == 1) ? 'selected' : '' }} value="1" {{ old('status') == '1' ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                            @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
