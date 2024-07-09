@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>My Account</h1>
                    
                </div>
                <div class="col-sm-6" style="text-align:right;">
          <!-- <a href="{{url('admin/parent/list')}}" class="btn btn-primary">List</a> -->
            <h1></h1>
          </div>
               
            </div>
          
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                @include('_message')
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">My Account</h3>
                        </div>
                        <form method="post" action="{{ route('parent.account', $getRecord->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstName">First Name <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" id="firstName" placeholder="Enter first name" name="name" value="{{ old('name',$getRecord->name) }}" required>
                                           <div style="color:red">{{$errors->first('name')}}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lastName">Last Name <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" id="lastName" placeholder="Enter last name" name="last_name" value="{{ old('last_name',$getRecord->last_name) }}" required>
                                            <div style="color:red">{{$errors->first('last_name')}}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address">Address<span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" id="address" placeholder="Enter Address" name="address" value="{{ old('address',$getRecord->address) }}"required>
                                            <div style="color:red">{{$errors->first('address')}}</div>
                                        </div>
                                    </div>
                              
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gender">Gender <span style="color:red;">*</span></label>
                                            <select class="form-control" id="gender" name="gender" required>
                                                <option value="">Select Gender</option>
                                                <option value="Male" {{ (old('gender',$getRecord->gender) == 'Male') ? 'selected' : '' }}>Male</option>
                                                <option value="Female" {{ (old('gender',$getRecord->gender) == 'Female') ? 'selected' : '' }}>Female</option>
                                                <option value="Other" {{ (old('gender',$getRecord->gender) == 'Other') ? 'selected' : '' }}>Other</option>
                                            </select>
                                            <div style="color:red">{{$errors->first('gender')}}</div>
                                        </div>
                                    </div>
                                </div>

                               

                                <div class="row">
                                  
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="caste">Mobile Number <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" id="mobile_number" placeholder="Enter Mobile Number" name="mobile_number" value="{{ old('mobile_number',$getRecord->mobile_number) }}"required>
                                            <div style="color:red">{{$errors->first('mobile_number')}}</div>
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="occupation">Occupation<span style="color:red;"></span></label>
                                            <input type="text" class="form-control" id="occupation" placeholder="Enter Occupation" name="occupation" value="{{ old('occupation',$getRecord->occupation) }}">
                                            <div style="color:red">{{$errors->first('occupation')}}</div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                              
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="profileImage">Profile Image</label>
                                            <input type="file" class="form-control" id="profileImage" name="profile_image">
                                            <div style="color:red">{{$errors->first('profile_image')}}</div>
                                            @if (!empty($getRecord->getProfile()))
                                            <img class="w-30 my-3" src="{{ $getRecord->getProfile() }}" alt="" style="width: 100px; height: 100px;">

                                @endif
                                        </div>
                                    </div>
                                </div>

                               

                                  <hr>

                                <div class="row">
                                <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="email">Email <span style="color:red;">*</span></label>
                                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{ old('email',$getRecord->email) }}" required>
                                            <div style="color:red">{{$errors->first('email')}}</div>
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
