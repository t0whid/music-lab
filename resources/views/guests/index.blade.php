@extends('guests.master')

@section('styles')
@endsection

@section('content')
    <div class="container-fluid mt-3">

        <div class="row">
            <div class="col-12 m-b-30">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-3">Popular Songs</h4>
                    <button class="btn btn-outline-info">More</button>
                </div>
                <p class="text-muted"></p>
                <div class="row">
                    @foreach ($popularSongs as $psong)
                        <div class="col-md-3 col-lg-2">
                            <div class="card">
                                <img class="img-fluid" src="{{ asset('storage/' . $psong->image) }}" alt="">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $psong->title }}</h5>
                                    <p class="card-text">
                                        <span class="text-primary">{{ $psong->category->name }}</span>
                                    </p>
                                    <p class="card-text">
                                        <span class="text-success">by {{ $psong->artist }}</span>
                                    </p>
                                    <p class="card-text"><small
                                            class="text-muted">{{ $psong->created_at->format('d-m-Y') }}</small></p>
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <i class="far fa-eye"></i> {{ $psong->view_count }}
                                        </div>
                                        <div>
                                            <a href="#" class="btn btn-sm btn-outline-primary" download>
                                                <i class="fa-solid fa-play"></i>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="" class="btn btn-sm btn-outline-success" download>
                                                <i class="fas fa-download"></i>
                                            </a>
                                        </div>
                                        <div>
                                            <button class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-heart"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-12 m-b-30">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-3">New Songs</h4>
                    <button class="btn btn-outline-info">More</button>
                </div>
                <p class="text-muted"></p>
                <div class="row">
                    @foreach ($newSongs as $nsong)
                        <div class="col-md-3 col-lg-2">
                            <div class="card">
                                <img class="img-fluid" src="{{ asset('storage/' . $nsong->image) }}" alt="">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $nsong->title }}</h5>
                                    <p class="card-text">
                                        <span class="text-primary">{{ $nsong->category->name }}</span>
                                    </p>
                                    <p class="card-text">
                                        <span class="text-success">by {{ $nsong->artist }}</span>
                                    </p>
                                    <p class="card-text"><small
                                            class="text-muted">{{ $nsong->created_at->format('d-m-Y') }}</small></p>
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <i class="far fa-eye"></i> {{ $nsong->view_count }}
                                        </div>
                                        <div>
                                            <a href="#" class="btn btn-sm btn-outline-primary" download>
                                                <i class="fa-solid fa-play"></i>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="#" class="btn btn-sm btn-outline-success" download>
                                                <i class="fas fa-download"></i>
                                            </a>
                                        </div>
                                        <div>
                                            <button class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-heart"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 m-b-30">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-3">Featured Songs</h4>
                    <button class="btn btn-outline-info">More</button>
                </div>
                <p class="text-muted"></p>
                <div class="row">
                    @foreach ($featuredSongs as $fsong)
                        <div class="col-md-3 col-lg-2">
                            <div class="card">
                                <img class="img-fluid" src="{{ asset('storage/' . $fsong->image) }}" alt="">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $fsong->title }}</h5>
                                    <p class="card-text">
                                        <span class="text-primary">{{ $fsong->category->name }}</span>
                                    </p>
                                    <p class="card-text">
                                        <span class="text-success">by {{ $fsong->artist }}</span>
                                    </p>
                                    <p class="card-text"><small
                                            class="text-muted">{{ $fsong->created_at->format('d-m-Y') }}</small></p>
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <i class="far fa-eye"></i> {{ $fsong->view_count }}
                                        </div>
                                        <div>
                                            <a href="#" class="btn btn-sm btn-outline-primary" download>
                                                <i class="fa-solid fa-play"></i>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="#" class="btn btn-sm btn-outline-success" download>
                                                <i class="fas fa-download"></i>
                                            </a>
                                        </div>
                                        <div>
                                            <button class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-heart"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $(".btn-sm").click(function() {
                alert("You are not logged in. Please log in to enjoy.");
                window.location.href = "/login";
                return false;

            });
        });
    </script>
@endsection
