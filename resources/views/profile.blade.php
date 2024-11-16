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

    <!-- Sales Chart Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-start mb-4">
                        <h6 class="mb-0">My Profile</h6>
                    </div>
                    <div class="card">
                        <img class="card-img-top rounded-circle mx-auto mt-3" src="dashAssets/img/user.jpg"
                            alt="Profile Picture" style="width: 150px; height: 150px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h4 class="card-title">{{ Auth::user()->name }}</h4>
                            <p class="card-text">{{ '@' . Auth::user()->username }}</p>
                            <p class="card-text">{{ Auth::user()->group->name }}</p>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="dropdown">
                                    <a href="#edit-profile" class="btn btn-secondary btn-sm mt-2 dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-wrench" aria-hidden="true"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="" data-bs-toggle="modal"
                                                data-bs-target="#profile{{ Auth::user()->id }}">Change Password</a></li>
                                        <li><a class="dropdown-item" href="" data-bs-toggle="modal"
                                                data-bs-target="#profile{{ Auth::user()->id }}">Edit Profile</a></li>
                                    </ul>
                                </div>
                                <a href="#edit-profile" class="btn btn-danger btn-sm mt-2"><i class="fa fa-trash me-2"
                                        aria-hidden="true"></i>Hapus Akun</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-8">
                <div class="d-flex px-4 align-items-center justify-content-start">
                    <h6 class="mb-0">My Posts</h6>
                </div>
                @foreach ($posts as $post)
                    <div class="container-fluid pt-4 px-4">
                        <div class="row g-4 d-flex flex-column align-items-center justify-content-center">
                            <div class="col-sm-12 col-xl-12">
                                <div class="bg-light text-center rounded p-4">
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <h6 class="mb-0">{{ $post->user->name }}</h6>
                                        <div class="count d-flex gap-2">
                                            <button type="button" class="btn btn-outline-dark btn-md"
                                                data-bs-toggle="modal" data-bs-target="#like{{ $post->id }}"><i
                                                    class="bi bi-hand-thumbs-up-fill me-2"></i>{{ $post->likeTotal }}
                                            </button>
                                            <button type="button" class="btn btn-outline-dark btn-md"
                                                data-bs-toggle="modal" data-bs-target="#komentar{{ $post->id }}"><i
                                                    class="fa fa-comments me-2"></i>{{ count($post->comment) }}</button>
                                        </div>
                                    </div>
                                    <div class="card mb-3 w-100">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <img src="{{ asset('/storage/images/' . $post->image) }}"
                                                    class="img-fluid rounded-start" alt="...">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body text-start position-relative d-flex flex-column"
                                                    style="height: 100%;">
                                                    @if ($post->link)
                                                        <a href="{{ $post->link }}" class="fs-5 fw-bold card-title"
                                                            style="text-decoration: underline;"
                                                            target="blank">{{ $post->title }}</a>
                                                    @else
                                                        <h5 class="fs-5 text-default fw-bold card-title">
                                                            {{ $post->title }}</h5>
                                                    @endif
                                                    <p class="card-text" id="description-{{ $post->id }}">
                                                        {{ Str::limit($post->content, 110) }}
                                                        @if (strlen($post->content) > 110)
                                                            <a href="javascript:void(0);"
                                                                onclick="showFullDescription({{ $post->id }}, '{{ $post->content }}')">
                                                                Read More
                                                            </a>
                                                        @endif
                                                    </p>
                                                    <p class="card-text position-absolute"
                                                        style="top: 10px; right: 10px;">
                                                        <small
                                                            class="text-body-secondary">{{ $post->created_at->diffForHumans() }}</small>
                                                    </p>
                                                    <div class="mt-auto d-flex justify-content-end gap-2">
                                                        <button type="button" class="btn btn-primary btn-md"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#edit{{ $post->id }}"><i
                                                                class="bi bi-pencil-square"></i></button>
                                                        <button type="button" class="btn btn-danger btn-md"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#hapus{{ $post->id }}"><i
                                                                class="fa fa-trash" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Komentar -->
                    <div class="modal fade" id="komentar{{ $post->id }}" tabindex="-1"
                        aria-labelledby="komentarLabel{{ $post->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Header Modal -->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="komentarLabel{{ $post->id }}">Komentar</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <!-- Body Modal -->
                                <div class="modal-body">
                                    <!-- Daftar Komentar -->
                                    <div class="comments-list mb-3" style="max-height: 350px; overflow-y: auto;">
                                        @foreach ($post->comment as $c)
                                            <div class="comment mb-3">
                                                <strong>{{ $c->user->name }}</strong>
                                                <p>{{ $c->content }}</p>
                                                <small class="text-muted">{{ $c->created_at->diffForHumans() }}</small>
                                            </div>
                                            <hr>
                                        @endforeach
                                    </div>

                                    <!-- Form Tambah Komentar -->
                                    <form action="{{ route('comment.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                                        <div class="mb-3">
                                            <textarea class="form-control" id="content" name="content" rows="3" placeholder="Tulis komentar Anda..."></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-success float-end">Kirim</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Like -->
                    <div class="modal fade" id="like{{ $post->id }}" tabindex="-1"
                        aria-labelledby="likeLabel{{ $post->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Header Modal -->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="likeLabel{{ $post->id }}">Who Likes Your Post?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <!-- Body Modal -->
                                <div class="modal-body">
                                    <!-- Daftar like -->
                                    <div class="comments-list" style="max-height: 350px; overflow-y: auto;">
                                        @foreach ($post->like as $l)
                                            <div class="comment d-flex justify-content-between mb-3">
                                                <strong>{{ $l->user->name }}</strong>
                                                <small class="text-muted">
                                                    @if ($l->liked_at)
                                                        {{ \Carbon\Carbon::parse($l->liked_at)->diffForHumans() }}
                                                    @else
                                                        No time
                                                    @endif
                                                </small>
                                            </div>
                                            <hr>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Edit -->
                    <div class="modal fade" id="edit{{ $post->id }}" tabindex="-1"
                        aria-labelledby="likeLabel{{ $post->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Header Modal -->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="likeLabel{{ $post->id }}">Edit Post</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <!-- Body Modal -->
                                <div class="modal-body">
                                    <form action="{{ route('posts.update', $post->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="rounded p-2">
                                            <!-- Input gambar -->
                                            <div class="mb-3">
                                                <label for="upload" class="form-label">Upload Image</label>
                                                <input class="form-control form-control-md bg-white" id="upload"
                                                    name="image" type="file">
                                                <input class="form-control" id="user_id" name="user_id"
                                                    value="{{ Auth::user()->id }}" hidden>
                                            </div>

                                            <!-- Input judul -->
                                            <div class="form-floating mb-3">
                                                <input value="{{ $post->title }}" type="text" name="title"
                                                    class="form-control" id="floatingTitle" placeholder="Title" required>
                                                <label for="floatingTitle">Title</label>
                                            </div>
                                            <!-- Input link -->
                                            <div class="form-floating mb-3">
                                                <input value="{{ $post->link }}" type="text" name="link"
                                                    class="form-control" id="floatingLink" placeholder="Link">
                                                <label for="floatingLink">Link Video (opsional)</label>
                                            </div>
                                            <input value="{{ $post->status }}" type="text" name="status"
                                                class="form-control" hidden>

                                            <!-- Input konten -->
                                            <div class="form-floating mb-4">
                                                <textarea name="content" class="form-control" id="floatingContent" placeholder="Content" style="height: 100px;"
                                                    required>{{ $post->content }}</textarea>
                                                <label for="floatingContent">Content</label>
                                            </div>

                                            <!-- Select kategori -->
                                            <div class="mb-4">
                                                <label for="category" class="form-label">Category</label>
                                                <select name="category" id="category" class="form-select" required>
                                                    <option value="" disabled selected>Select Category</option>
                                                    @foreach ($cat as $c)
                                                        <option value="{{ $c->id }}"
                                                            @if (old('category', $post->category_id) == $c->id) selected @endif>
                                                            {{ $c->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <!-- Tombol submit -->
                                            <button type="submit" class="text-light btn btn-success py-3 w-100">Edit
                                                Post</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Hapus -->
                    <div class="modal fade" id="hapus{{ $post->id }}" tabindex="-1"
                        aria-labelledby="likeLabel{{ $post->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Header Modal -->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="likeLabel{{ $post->id }}">Delete Post</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <!-- Body Modal -->
                                <div class="modal-body">
                                    <p>Are you sure you want to delete this post along with all likes and comments?"</p>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
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
            </div>
        </div>
    </div>
    <!-- Sales Chart End -->
    <!-- Modal Profile -->
    <div class="modal fade" id="profile{{ Auth::user()->id }}" tabindex="-1" aria-labelledby="komentarLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Header Modal -->
                <div class="modal-header">
                    <h5 class="modal-title" id="komentarLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Body Modal -->
                <div class="modal-body">
                    <form method="POST" action="{{ route('profile.update', Auth::user()->id) }}">
                        @method('PUT')
                        @csrf
                        <div class="form-floating mb-3">
                            <input value="{{ Auth::user()->name }}" name="name" type="text" class="form-control"
                                id="floatingInputName" required placeholder="name">
                            <label for="floatingInput">Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input value="{{ Auth::user()->username }}" name="username" type="text"
                                class="form-control" id="floatingInputUsername" required placeholder="username">
                            <label for="floatingInput">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input value="{{ Auth::user()->email }}" name="email" type="email" class="form-control"
                                id="floatingInputEmail" required placeholder="name@example.com">
                            <label for="floatingInput">Email Address</label>
                        </div>
                        <button type="submit" class="text-light btn btn-success py-3 w-100">Submit</button>
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
<script>
    function showFullDescription(id, fullDescription) {
        // Mengganti konten teks deskripsi dengan deskripsi lengkap
        document.getElementById(`description-${id}`).innerText = fullDescription;
    }
</script>
