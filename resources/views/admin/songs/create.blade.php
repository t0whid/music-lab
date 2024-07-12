@extends('layouts.master')

@section('styles')
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Upload Songs</h4>
                    <div class="form-validation mt-5">
                        <form class="form-valide" action="{{ route('admin.songs.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Title <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="val-username" name="title" placeholder="Enter a Title..">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-skill">Categories <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <select class="form-control" id="val-skill" name="category_id">
                                        <option value="">Please select</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-artist">Artist <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="val-artist" name="artist" placeholder="Enter artist name..">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-suggestions">Description</label>
                                <div class="col-lg-6">
                                    <textarea class="form-control" id="val-suggestions" name="description" rows="5" placeholder="Description"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-images">Cover (1:1)</label>
                                <div class="col-lg-6">
                                    <div class="custom-file">
                                        <input type="file" class="form-control-file" id="image" name="image">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-songs">Song (MP3) <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <div class="custom-file">
                                        <input type="file" class="form-control-file" id="song" name="song">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-8 ml-auto">
                                    <button type="submit" class="btn btn-primary">Upload</button>
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
