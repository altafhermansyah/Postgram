@extends('layouts.app')
@section('content')
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
        <a href="/" class="navbar-brand d-flex d-lg-none me-4">
            <h2 class="text-primary mb-0"><img src="assets/images/favicon.png" alt=""></h2>
        </a>
        <a href="#" class="sidebar-toggler text-primary flex-shrink-0">
            <i class="fa fa-bars"></i>
        </a>
        <div class="navbar-nav align-items-center ms-auto">
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <img class="rounded-circle me-lg-2" src="dashAssets/img/user.jpg" alt=""
                        style="width: 40px; height: 40px;">
                    <span class="d-none d-lg-inline-flex">{{ Auth::user()->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                    <a href="{{ route('profile.index') }}" class="dropdown-item">My Profile</a>
                    <a href="{{ route('logout') }}" class="dropdown-item"
                        onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">Log
                        Out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    {{-- News Start --}}
    <div class="container-fluid pt-4 px-4">
        <div class="row justify-content-center">
            @foreach ($posts as $post)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card">
                        <!-- Gambar Berita -->
                        <img src="{{ asset('/storage/images/' . $post->image) }}" class="card-img-top"
                            alt="{{ $post->title }}">

                        <div class="card-body">
                            @if ($post->link)
                                <a href="{{ $post->link }}" class="fs-5 fw-bold card-title"
                                    style="text-decoration: underline;" target="blank">{{ $post->title }}</a>
                            @else
                                <h5 class="fs-5 text-default fw-bold card-title">
                                    {{ $post->title }}</h5>
                            @endif

                            <!-- Deskripsi Singkat Berita -->
                            <p class="card-text" id="description-{{ $post->id }}">{{ Str::limit($post->content, 110) }}
                                @if (strlen($post->content) > 110)
                                    <a href="javascript:void(0);"
                                        onclick="showFullDescription({{ $post->id }}, '{{ $post->content }}')">
                                        Read More
                                    </a>
                                @endif
                            </p>
                            {{-- @if (Auth::user()->role == 'admin')
                                <button class="btn btn-primary"><i class="bi bi-pencil-square me-2"></i>Edit News</button>
                            @endif --}}
                        </div>

                        <div class="card-footer text-muted">
                            <!-- Tanggal Berita -->
                            <small>
                                {{ $post->created_at->diffForHumans() . ', ' . $post->created_at->format('M d, Y') }}</small>
                        </div>
                    </div>
                </div>
                <script>
                    function showFullDescription(id, fullDescription) {
                        // Mengganti konten teks deskripsi dengan deskripsi lengkap
                        document.getElementById(`description-${id}`).innerText = fullDescription;
                    }
                </script>
            @endforeach
        </div>
    </div>
    {{-- News End --}}
@endsection
