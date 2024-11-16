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
                    <img class="rounded-circle me-lg-2" src="{{ asset('dashAssets/img/user.jpg') }}" alt=""
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
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12">
                <div class="bg-light text-center rounded p-4 mb-4">
                    <h4>Posts in Category: {{ $category->name }}</h4>
                    <!-- Ganti $category dengan variabel kategori yang sedang dilihat -->
                    <!-- Tombol Back -->
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left-circle"></i> Back to Categories
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Posts Start -->
    @foreach ($posts as $post)
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4 d-flex flex-column align-items-center justify-content-center">
                <div class="col-sm-12 col-xl-10">
                    <div class="bg-light text-center rounded p-4">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h6 class="mb-0">{{ $post->user->name }}</h6>
                            <div class="bg-white px-3 py-2 rounded align-items-center">
                                <h6 class="my-auto"><i class="bi bi-hand-thumbs-up-fill me-2"></i>{{ $post->likeTotal }}
                                </h6>
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
                                                style="text-decoration: underline;" target="blank">{{ $post->title }}</a>
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
                                        <p class="card-text position-absolute" style="top: 10px; right: 10px;">
                                            <small
                                                class="text-body-secondary">{{ $post->created_at->diffForHumans() }}</small>
                                        </p>
                                        <div class="mt-auto d-flex justify-content-end gap-2">
                                            <form id="like-form-{{ $post->id }}" action="{{ route('like.store') }}"
                                                method="POST" style="display: none;">
                                                @csrf
                                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                            </form>
                                            @if ($post->like->contains('user_id', Auth::id()))
                                                <button type="button" class="btn btn-dark btn-md"
                                                    onclick="submitLikeForm({{ $post->id }})">
                                                    <i class="bi bi-hand-thumbs-up-fill"></i>
                                                </button>
                                            @else
                                                <button type="button" class="btn btn-dark btn-md"
                                                    onclick="submitLikeForm({{ $post->id }})">
                                                    <i class="bi bi-hand-thumbs-up"></i>
                                                </button>
                                            @endif
                                            <button type="button" class="btn btn-outline-dark btn-md"
                                                data-bs-toggle="modal" data-bs-target="#komentar{{ $post->id }}"><i
                                                    class="fa fa-comments me-2"></i>{{ count($post->comment) }}</button>
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
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
    @endforeach
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
<script>
    function submitLikeForm(postId) {
        // Kirim form berdasarkan ID
        document.getElementById(`like-form-${postId}`).submit();
    }
</script>
