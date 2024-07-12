@extends('layouts.master')

@section('styles')
    <link href="{{ asset('assets/plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <style>
        /* Add any custom styles specific to this view here */
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <h4 class="card-title">{{ $category->name }}</h4>
                            <a href="{{ route('admin.songs.create') }}" class="btn btn-outline-primary">
                                <i class="fas fa-plus"></i> Create New Song
                            </a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Artist</th>
                                        <th>Category</th>
                                        <th>Duration</th>
                                        <th>Views</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $rowNum = 1;
                                    @endphp
                                    @foreach ($songs as $song)
                                        <tr>
                                            <td style="width: 50px;">{{ $rowNum++ }}</td>
                                            <td style="width: 50px; height: 50px; text-align: center;">
                                                <div style="width: 100%; height: 100%; display: flex; justify-content: center; align-items: center;">
                                                    <img src="{{ asset('storage/' . $song->image) }}" alt="{{ $song->title }} Image" style="max-width: 100%; max-height: 100%;">
                                                </div>
                                            </td>
                                            <td>{{ $song->title }}</td>
                                            <td>{{ $song->artist }}</td>
                                            <td>{{ $song->category->name }}</td>
                                            <td>{{ $song->duration }}</td>
                                            <td>{{ $song->view_count }}</td>
                                            <td style="width: 75px;">
                                                <a href="{{ route('admin.songs.edit', $song->id) }}" class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form method="POST" action="{{ route('admin.songs.destroy', $song->id) }}" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger ml-2" onclick="return confirm('Are you sure you want to delete this song?');">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Artist</th>
                                        <th>Category</th>
                                        <th>Duration</th>
                                        <th>Views</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/plugins/tables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script>
@endsection
