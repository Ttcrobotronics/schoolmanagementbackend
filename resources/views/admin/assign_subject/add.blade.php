@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add New Assign Subject</h1>
                    
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
                            <h3 class="card-title">Add Form</h3>
                        </div>
                        <form method="post" action="{{ route('admin.assign_subject.insert') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="className">Class Name</label>
                                            <select class="form-control" id="status" name="class_id" required>
                                                <option value="">Select class</option>
                                               @foreach($getClass as $class)
                                               <option value="{{ $class->id}}">{{ $class->name}}</option>

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
                                               <div>
                                              <label for="" style="font-weight:normal;">
                                               <input type="checkbox" name="subject_id[]" value="{{$subject->id}}"> {{$subject->name}}
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
                                                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Active</option>
                                                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Inactive</option>
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
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
