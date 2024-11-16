<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>postgram.</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('dashAssets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashAssets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('dashAssets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('dashAssets/css/style.css') }}" rel="stylesheet">

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        {{-- <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> --}}
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="/" class="navbar-brand d-flex mx-4 mb-3">
                    <img src="{{ asset('assets/images/favicon.png') }}" alt="" class="me-2"
                        style="width: 35px; height: 35px">
                    <h3 class="">postgram.</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="{{ asset('dashAssets/img/user.jpg') }}" alt=""
                            style="width: 40px; height: 40px;">
                        <div
                            class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                        </div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                        <span>{{ Auth::user()->role }}</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    @if (Auth::user()->role == 'admin')
                        <a href="" data-bs-toggle="modal" data-bs-target="#newPostA" class="nav-item nav-link"><i
                                class="fa fa-plus me-2"></i>New Post</a>
                        <a href="{{ route('home') }}"
                            class="nav-item nav-link {{ Route::is('home') ? 'active' : '' }}"><i
                                class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                        <a href="{{ route('posts.index') }}"
                            class="nav-item nav-link {{ Route::is('posts.index') ? 'active' : '' }}"><i
                                class="fa fa-table me-2"></i>All Post</a>
                        <a href="{{ route('popular') }}"
                            class="nav-item nav-link {{ Route::is('popular') ? 'active' : '' }}"><i
                                class="fa fa-fire me-2"></i>Popular</a>
                        <a href="{{ route('categories.index') }}"
                            class="nav-item nav-link {{ Route::is('categories.index') ? 'active' : '' }}"><i
                                class="fa fa-th me-2"></i>Categories</a>
                        <a href="{{ route('grade.index') }}"
                            class="nav-item nav-link {{ Route::is('grade.index') ? 'active' : '' }}"><i
                                class="fa fa-graduation-cap me-2"></i>Grade</a>
                        <a href="{{ route('news') }}"
                            class="nav-item nav-link {{ Route::is('news') ? 'active' : '' }}"><i
                                class="fa fa-newspaper me-2"></i>News</a>
                        <a href="{{ route('users') }}"
                            class="nav-item nav-link {{ Route::is('users') ? 'active' : '' }}"><i
                                class="fa fa-users me-2"></i>Users</a>
                        <a href="{{ route('profile.index') }}"
                            class="nav-item nav-link {{ Route::is('profile.index') ? 'active' : '' }}"><i
                                class="fa fa-user me-2"></i>My Profile</a>
                    @elseif(Auth::user()->role == 'user')
                        <a href="" data-bs-toggle="modal" data-bs-target="#newPostU" class="nav-item nav-link"><i
                                class="fa fa-plus me-2"></i>New Post</a>
                        <a href="{{ route('home') }}"
                            class="nav-item nav-link {{ Route::is('home') ? 'active' : '' }}"><i
                                class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                        <a href="{{ route('popular') }}"
                            class="nav-item nav-link {{ Route::is('popular') ? 'active' : '' }}"><i
                                class="fa fa-fire me-2"></i>Popular</a>
                        <a href="{{ route('categories.index') }}"
                            class="nav-item nav-link {{ Route::is('categories.index') ? 'active' : '' }}"><i
                                class="fa fa-th me-2"></i>Categories</a>
                        <a href="{{ route('news') }}"
                            class="nav-item nav-link {{ Route::is('news') ? 'active' : '' }}"><i
                                class="fa fa-newspaper me-2"></i>News</a>
                        <a href="{{ route('profile.index') }}"
                            class="nav-item nav-link {{ Route::is('profile.index') ? 'active' : '' }}"><i
                                class="fa fa-user me-2"></i>My Profile</a>
                    @endif
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            @yield('content')
        </div>
        <!-- Content End -->

        <!-- Modal New Post -->
        <div class="modal fade" id="newPostA" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- Left Close Button -->
                        <button type="button" class="btn-close position-absolute start-0 ms-3"
                            data-bs-dismiss="modal" aria-label="Close"></button>

                        <!-- Centered Title -->
                        <h4 class="modal-title mx-auto fw-bold text-primary" id="exampleModalLabel">New Post</h4>

                        <!-- Right Close Button -->
                        <button type="button" class="btn-close position-absolute end-0 me-3" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-4 py-4">
                        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="rounded p-2">
                                <!-- Input gambar -->
                                <div class="mb-3">
                                    <label for="upload" class="form-label">Upload Image</label>
                                    <input class="form-control form-control-md bg-white" id="upload"
                                        name="image" type="file" required>
                                    <input class="form-control" id="user_id" name="user_id"
                                        value="{{ Auth::user()->id }}" hidden>
                                </div>

                                <!-- Input judul -->
                                <div class="form-floating mb-3">
                                    <input type="text" name="title" class="form-control" id="floatingTitle"
                                        placeholder="Title" required>
                                    <label for="floatingTitle">Title</label>
                                </div>

                                <!-- Input link -->
                                <div class="form-floating mb-3">
                                    <input type="text" name="link" class="form-control" id="floatingLink"
                                        placeholder="Link">
                                    <label for="floatingLink">Link Video (opsional)</label>
                                </div>

                                <!-- Input konten -->
                                <div class="form-floating mb-4">
                                    <textarea name="content" class="form-control" id="floatingContent" placeholder="Content" style="height: 100px;"
                                        required></textarea>
                                    <label for="floatingContent">Content</label>
                                </div>

                                <!-- Select status (News atau Post) -->
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" id="status" class="form-select" required>
                                        <option value="news">News</option>
                                        <option value="post">Post</option>
                                    </select>
                                </div>

                                <!-- Select kategori -->
                                <div class="mb-4">
                                    <label for="category" class="form-label">Category</label>
                                    <select name="category" id="category" class="form-select" required>
                                        <option value="" disabled selected>Select Category</option>
                                        @foreach ($cat as $c)
                                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Tombol submit -->
                                <button type="submit" class="text-light btn btn-primary py-3 w-100">Create
                                    Post</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- Modal New Post -->
        <div class="modal fade" id="newPostU" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- Left Close Button -->
                        <button type="button" class="btn-close position-absolute start-0 ms-3"
                            data-bs-dismiss="modal" aria-label="Close"></button>

                        <!-- Centered Title -->
                        <h4 class="modal-title mx-auto fw-bold text-primary" id="exampleModalLabel">New Post</h4>

                        <!-- Right Close Button -->
                        <button type="button" class="btn-close position-absolute end-0 me-3" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-4 py-4">
                        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="rounded p-2">
                                <!-- Input gambar -->
                                <div class="mb-3">
                                    <label for="upload" class="form-label">Upload Image</label>
                                    <input class="form-control form-control-md bg-white" id="upload"
                                        name="image" type="file" required>
                                    <input class="form-control" id="user_id" name="user_id"
                                        value="{{ Auth::user()->id }}" hidden>
                                </div>

                                <!-- Input judul -->
                                <div class="form-floating mb-3">
                                    <input type="text" name="title" class="form-control" id="floatingTitle"
                                        placeholder="Title" required>
                                    <label for="floatingTitle">Title</label>
                                </div>
                                <!-- Input link -->
                                <div class="form-floating mb-3">
                                    <input type="text" name="link" class="form-control" id="floatingLink"
                                        placeholder="Link">
                                    <label for="floatingLink">Link Video (opsional)</label>
                                </div>
                                <input type="text" name="status" class="form-control" value="post" hidden>

                                <!-- Input konten -->
                                <div class="form-floating mb-4">
                                    <textarea name="content" class="form-control" id="floatingContent" placeholder="Content" style="height: 100px;"
                                        required></textarea>
                                    <label for="floatingContent">Content</label>
                                </div>

                                <!-- Select kategori -->
                                <div class="mb-4">
                                    <label for="category" class="form-label">Category</label>
                                    <select name="category" id="category" class="form-select" required>
                                        <option value="" disabled selected>Select Category</option>
                                        @foreach ($cat as $c)
                                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Tombol submit -->
                                <button type="submit" class="text-light btn btn-primary py-3 w-100">Create
                                    Post</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
    @if (session('rSuccess'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Registration Successful',
                text: '{{ session('rSuccess') }}',
            });
        </script>
    @endif
    @if (session('lSuccess'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Login Successful',
                text: '{{ session('rSuccess') }}',
            });
        </script>
    @endif
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('dashAssets/lib/chart/chart.min.js') }}"></script>
    <script src="{{ asset('dashAssets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('dashAssets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('dashAssets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('dashAssets/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('dashAssets/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('dashAssets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('dashAssets/js/main.js') }}"></script>

</body>

</html>
