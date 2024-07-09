@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Change Password</h1>
                </div>
                <div class="col-sm-6" style="text-align:right;">
                    <a href="{{url('admin/class/list')}}" class="btn btn-primary">List</a>
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
                            <h3 class="card-title">Change Password</h3>
                        </div>
                        <form method="post" action="{{ route('admin.change_password') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="password">Old Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="password" placeholder="Old password" name="old_password" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text cursor-pointer" onclick="togglePasswordVisibility('password', this)">
                                                        <i class="fa fa-eye"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="confirm_password">New Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="confirm_password" placeholder="New password" name="new_password" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text cursor-pointer" onclick="togglePasswordVisibility('confirm_password', this)">
                                                        <i class="fa fa-eye"></i>
                                                    </span>
                                                </div>
                                            </div>
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
