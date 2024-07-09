@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Subject</h1>
                    
                </div>
                <div class="col-sm-6" style="text-align:right;">
          <a href="{{url('admin/subject/list')}}" class="btn btn-primary">List</a>
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
                        
                        <form method="post" action="{{ route('admin.subject.update', $getRecord->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="className">Subject Name</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="className" placeholder="Enter class name" name="name" value="{{ old('name', $getRecord->name) }}" required>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="status">Subject Type</label>
                                            <select class="form-control @error('status') is-invalid @enderror" id="status" name="type" required>
                                                <option value="">Select type</option>
                                                <option value="Theory" {{ old('status', $getRecord->type) == 'Theory' ? 'selected' : '' }}>Theory</option>
                                                <option value="Practical" {{ old('status', $getRecord->type) == 'Practical' ? 'selected' : '' }}>Practical</option>
                                            </select>
                                            @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                                                <option value="">Select status</option>
                                                <option value="0" {{ old('status', $getRecord->status) == '0' ? 'selected' : '' }}>Active</option>
                                                <option value="1" {{ old('status', $getRecord->status) == '1' ? 'selected' : '' }}>Inactive</option>

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
