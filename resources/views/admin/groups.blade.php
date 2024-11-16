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

    {{-- Groups Start --}}
    <div class="container-fluid pt-4 px-4">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5>Data Groups</h5>
                        <a href="" class="btn btn-md btn-success" data-bs-toggle="modal" data-bs-target="#newG"><i
                                class="fa fa-plus-circle me-2"></i>New Group</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th class="col-1">No</th>
                                        <th>Group Name</th>
                                        <th class="col-3">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($groups as $index => $group)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $group->name }}</td>
                                            <td>
                                                <a href="" class="m-1 btn btn-primary btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#editG{{ $group->id }}"><i
                                                        class="bi bi-pencil-square me-2"></i>Edit</a>
                                                <button class="m-1 btn btn-danger btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#deleteG{{ $group->id }}"><i
                                                        class="bi bi-trash"></i></button>
                                            </td>
                                        </tr>
                                        <!-- Modal Edit G -->
                                        <div class="modal fade" id="editG{{ $group->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <!-- Left Close Button -->
                                                        <button type="button"
                                                            class="btn-close position-absolute start-0 ms-3"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>

                                                        <!-- Centered Title -->
                                                        <h4 class="modal-title mx-auto fw-bold text-primary"
                                                            id="exampleModalLabel">Edit Group</h4>

                                                        <!-- Right Close Button -->
                                                        <button type="button"
                                                            class="btn-close position-absolute end-0 me-3"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body px-4 py-4">
                                                        <form action="{{ route('grade.update', $group->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="rounded p-2">
                                                                <!-- Input judul -->
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" name="name"
                                                                        class="form-control" id="floatingTitle"
                                                                        placeholder="Title" value="{{ $group->name }}"
                                                                        required>
                                                                    <label for="floatingTitle">Group Name</label>
                                                                </div>
                                                                <!-- Tombol submit -->
                                                                <button type="submit"
                                                                    class="text-light btn btn-success py-3 w-100">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal Edit G -->
                                        <div class="modal fade" id="deleteG{{ $group->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <!-- Left Close Button -->
                                                        <button type="button"
                                                            class="btn-close position-absolute start-0 ms-3"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>

                                                        <!-- Centered Title -->
                                                        <h4 class="modal-title mx-auto fw-bold text-primary"
                                                            id="exampleModalLabel">Delete Group</h4>

                                                        <!-- Right Close Button -->
                                                        <button type="button"
                                                            class="btn-close position-absolute end-0 me-3"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body px-4 py-4">
                                                        <p>Are you sure? you want to delete the {{ $group->name }}</p>
                                                        <form action="{{ route('grade.destroy', $group->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <div class="rounded p-2">
                                                                <!-- Tombol submit -->
                                                                <button type="submit"
                                                                    class="text-light btn btn-danger py-3 w-100">Delete</button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Groups End --}}
    <!-- Modal New G -->
    <div class="modal fade" id="newG" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- Left Close Button -->
                    <button type="button" class="btn-close position-absolute start-0 ms-3" data-bs-dismiss="modal"
                        aria-label="Close"></button>

                    <!-- Centered Title -->
                    <h4 class="modal-title mx-auto fw-bold text-primary" id="exampleModalLabel">New Group</h4>

                    <!-- Right Close Button -->
                    <button type="button" class="btn-close position-absolute end-0 me-3" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body px-4 py-4">
                    <form action="{{ route('grade.store') }}" method="POST">
                        @csrf
                        <div class="rounded p-2">
                            <!-- Input judul -->
                            <div class="form-floating mb-3">
                                <input type="text" name="name" class="form-control" id="floatingTitle"
                                    placeholder="Title" required>
                                <label for="floatingTitle">Group Name</label>
                            </div>
                            <!-- Tombol submit -->
                            <button type="submit" class="text-light btn btn-success py-3 w-100">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
            });
        </script>
    @endif
    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}',
            });
        </script>
    @endif
@endsection
