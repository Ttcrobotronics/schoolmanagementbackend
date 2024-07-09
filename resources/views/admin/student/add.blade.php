@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add New Student</h1>
                    
                </div>
                <div class="col-sm-6" style="text-align:right;">
          <a href="{{url('admin/student/list')}}" class="btn btn-primary">List</a>
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
                            <h3 class="card-title">Add Student</h3>
                        </div>
                        <form method="post" action="{{ route('admin.student.insert') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstName">First Name <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" id="firstName" placeholder="Enter first name" name="name" value="{{ old('name') }}" required>
                                           <div style="color:red">{{$errors->first('name')}}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lastName">Last Name <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" id="lastName" placeholder="Enter last name" name="last_name" value="{{ old('last_name') }}" required>
                                            <div style="color:red">{{$errors->first('last_name')}}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="username">Admission Number <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" id="admission_number" placeholder="Enter Admission Number" name="admission_number" value="{{ old('admission_number') }}" required>
                                            <div style="color:red">{{$errors->first('admission_number')}}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Roll Number <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" id="roll_number" placeholder="Enter Roll Number" name="roll_number" value="{{ old('roll_number') }}" required>
                                            <div style="color:red">{{$errors->first('roll_number')}}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="class_id">Class <span style="color:red;">*</span></label>
                                            <select class="form-control" id="class_id" name="class_id" required>
                                                <option value="">Select Class</option>
                                                @foreach($getClass as $value)
                                               <option {{ (old('class_id') == $value->id) ? 'selected' : '' }} value="{{ $value->id}}">{{ $value->name}}</option>

                                               @endforeach
                                            </select>
                                            <div style="color:red">{{$errors->first('class_id')}}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gender">Gender <span style="color:red;">*</span></label>
                                            <select class="form-control" id="gender" name="gender" required>
                                                <option value="">Select Gender</option>
                                                <option value="Male" {{ (old('gender') == 'Male') ? 'selected' : '' }}>Male</option>
                                                <option value="Female" {{ (old('gender') == 'Female') ? 'selected' : '' }}>Female</option>
                                                <option value="Other" {{ (old('gender') == 'Other') ? 'selected' : '' }}>Other</option>
                                            </select>
                                            <div style="color:red">{{$errors->first('gender')}}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="date_of_birth">Date of Birth <span style="color:red;">*</span></label>
                                            <input type="date" class="form-control" id="date_of_birth" placeholder="Enter Date of Birth" name="date_of_birth" value="{{ old('date_of_birth') }}" required>
                                            <div style="color:red">{{$errors->first('date_of_birth')}}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="caste">Caste <span style="color:red;"></span></label>
                                            <input type="text" class="form-control" id="caste" placeholder="Enter Caste" name="caste" value="{{ old('caste') }}">
                                            <div style="color:red">{{$errors->first('caste')}}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="date_of_birth">Religion <span style="color:red;"></span></label>
                                            <input type="text" class="form-control" id="religion" placeholder="Enter Religion" name="religion" value="{{ old('religion') }}">
                                            <div style="color:red">{{$errors->first('religion')}}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="caste">Mobile Number <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" id="mobile_number" placeholder="Enter Mobile Number" name="mobile_number" value="{{ old('mobile_number') }}"required>
                                            <div style="color:red">{{$errors->first('mobile_number')}}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="profileImage">Profile Image</label>
                                            <input type="file" class="form-control" id="profileImage" name="profile_image">
                                            <div style="color:red">{{$errors->first('profile_image')}}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="caste">Blood Group <span style="color:red;"></span></label>
                                            <input type="text" class="form-control" id="blood_group" placeholder="Enter Blood Group" name="blood_group" value="{{ old('blood_group') }}">
                                            <div style="color:red">{{$errors->first('blood_group')}}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="height">Height <span style="color:red;"></span></label>
                                            <input type="text" class="form-control" id="height" placeholder="Enter Height" name="height" value="{{ old('height') }}" >
                                            <div style="color:red">{{$errors->first('height')}}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="caste">Weight <span style="color:red;"></span></label>
                                            <input type="text" class="form-control" id="weight" placeholder="Enter Weight" name="weight" value="{{ old('weight') }}">
                                            <div style="color:red">{{$errors->first('weight')}}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gender">Status <span style="color:red;">*</span></label>
                                            <select class="form-control" id="status" name="status" required>
                                                <option value="">Select Status</option>
                                                <option value="0" {{ (old('status') == 0) ? 'selected' : '' }}>Active</option>
                                                <option value="1" {{ (old('status') == 1) ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                            <div style="color:red">{{$errors->first('status')}}</div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="admission_date">Admission Date <span style="color:red;"></span></label>
                                            <input type="date" class="form-control" id="admission_date" placeholder="Enter Admission Date" name="admission_date" value="{{ old('admission_date') }}" >
                                            <div style="color:red">{{$errors->first('admission_date')}}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="country">Country <span style="color:red;"></span></label>
                                            <input type="text" class="form-control" id="country" placeholder="Enter Country" name="country" value="{{ old('country') }}" >
                                            <div style="color:red">{{$errors->first('country')}}</div> 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="state">State <span style="color:red;"></span></label>
                                            <input type="text" class="form-control" id="state" placeholder="Enter State" name="state" value="{{ old('state') }}" >
                                            <div style="color:red">{{$errors->first('state')}}</div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="city">City <span style="color:red;"></span></label>
                                            <input type="text" class="form-control" id="city" placeholder="Enter City" name="city" value="{{ old('city') }}">
                                            <div style="color:red">{{$errors->first('city')}}</div>
                                        </div>
                                    </div>
                                </div>

                                  <hr>

                                <div class="row">
                                <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="email">Email <span style="color:red;">*</span></label>
                                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{ old('email') }}" required>
                                            <div style="color:red">{{$errors->first('email')}}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="password">Password <span style="color:red;">*</span></label>
                                            <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
                                            <div style="color:red">{{$errors->first('password')}}</div>
                                        </div>
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
