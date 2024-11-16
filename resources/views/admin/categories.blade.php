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

    <!-- Categories Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4 justify-content-center align-items-center">
            @foreach ($cat as $c)
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">{{ $c->name }}</h5>
                            <a href="{{ route('byCategory', $c->id) }}" class="btn btn-outline-dark btn-block">
                                Pilih {{ $c->name }}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <hr>
        @if (Auth::user()->role == 'admin')
            <div class="row justify-content-center align-items-center">
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <a href="" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#newC">
                        <i class="fa fa-plus-circle me-2"></i>New Category
                    </a>
                </div>
            </div>
        @endif
    </div>
    <!-- Categories End -->
    <!-- Modal New C -->
    <div class="modal fade" id="newC" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- Left Close Button -->
                    <button type="button" class="btn-close position-absolute start-0 ms-3" data-bs-dismiss="modal"
                        aria-label="Close"></button>

                    <!-- Centered Title -->
                    <h4 class="modal-title mx-auto fw-bold text-primary" id="exampleModalLabel">New Category</h4>

                    <!-- Right Close Button -->
                    <button type="button" class="btn-close position-absolute end-0 me-3" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body px-4 py-4">
                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf
                        <div class="rounded p-2">
                            <!-- Input judul -->
                            <div class="form-floating mb-3">
                                <input type="text" name="name" class="form-control" id="floatingTitle"
                                    placeholder="Title">
                                <label for="floatingTitle">Category Name</label>
                            </div>
                            <!-- Tombol submit -->
                            <button type="submit" class="text-light btn btn-success py-3 w-100">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
