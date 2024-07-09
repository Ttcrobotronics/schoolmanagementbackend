@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit  Admin</h1>
                </div>
                <div class="col-sm-6" style="text-align:right;">
          <a href="{{url('admin/admin/list')}}" class="btn btn-primary">List</a>
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
                        <form method="post" action="{{ route('admin.admin.update', $getRecord->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="firstName">Name</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="firstName" placeholder="Enter  Name" name="name" value="{{ old('name',$getRecord->name) }}" required>
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
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email" name="email" value="{{ old('email',$getRecord->email) }}" required>
                                            @error('email')
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
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Enter password" name="password" value="" >
                                            <p>Do you want to change password so add new password</p>
                                            @error('password')
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
                            <label for="userType">User Type</label>
                            <select class="form-control @error('usertype') is-invalid @enderror" id="userType" name="usertype" required>
                                <option value="">Select User Type</option>
                                <option value="admin" {{ old('usertype', $getRecord->usertype) == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="student" {{ old('usertype', $getRecord->usertype) == 'student' ? 'selected' : '' }}>Student</option>
                                <option value="teacher" {{ old('usertype', $getRecord->usertype) == 'teacher' ? 'selected' : '' }}>Teacher</option>
                                <option value="parent" {{ old('usertype', $getRecord->usertype) == 'parent' ? 'selected' : '' }}>Parents</option>
                            </select>
                            @error('usertype')
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
