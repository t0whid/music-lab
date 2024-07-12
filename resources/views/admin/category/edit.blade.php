@extends('layouts.master')

@section('styles')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Category</h4>

                <div class="basic-form">
                    <form class="" action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                            <div class="form-row">
                                <div class="form-group col-md-6">

                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name" class="form-control"
                                        placeholder="Enter Category Name" value="{{ $category->name }}">
                                </div>
                            </div>

                            
                        </div>
                        <button type="submit" class="btn btn-dark">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
