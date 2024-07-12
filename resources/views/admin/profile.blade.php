@extends('layouts.master')

@section('styles')
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update Profile</h4>
                    <div class="form-validation mt-5">
                        <form class="form-valide" action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-name">Name <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="val-name" name="name" value="{{ auth()->user()->name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-email">Email <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input type="email" class="form-control" id="val-email" name="email" value="{{ auth()->user()->email }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-image">Profile Image</label>
                                <div class="col-lg-6">
                                    <div class="custom-file">
                                        <input type="file" class="form-control-file" id="image" name="image">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-old-password">Old Password</label>
                                <div class="col-lg-6">
                                    <input type="password" class="form-control" id="val-old-password" name="old_password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-new-password">New Password</label>
                                <div class="col-lg-6">
                                    <input type="password" class="form-control" id="val-new-password" name="password">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-lg-8 ml-auto">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection
