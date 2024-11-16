<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Altaf Hermansyah">
    <link rel="shortcut icon" href="assets/images/favicon.png">

    <meta name="description"
        content="postgram. adalah platform mading digital khusus untuk siswa SMK yang dirancang
                untuk menampilkan kreativitas, ide, dan karya siswa secara online. Sebagai evolusi dari
                mading fisik yang sering dijumpai di sekolah, postgram. memberikan ruang yang lebih luas dan
                fleksibel bagi siswa untuk berbagi informasi, karya seni, tulisan, hingga pengumuman sekolah
                dengan cara yang lebih modern." />
    <meta name="keywords" content="postgram, mading" />

    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="assets/css/tiny-slider.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <title>postgram.</title>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <!-- Start Header/Navigation -->
    <nav class="custom-navbar navbar navbar sticky-top navbar-expand-md navbar-dark bg-dark"
        arial-label="Furni navigation bar">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">postgram<span>.</span></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
                aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsFurni">
                <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0 mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#post">Posts</a>
                    </li>
                </ul>

                <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/home') }}" class="nav-link"><i class="me-2 fas fa-home"></i>Home</a>
                        @else
                            <li>
                                <a class="nav-link" href="" data-bs-toggle="modal" data-bs-target="#signIn">
                                    <i class="me-2 fas fa-user"></i>Sign In
                                </a>
                            </li>
                            @if (Route::has('register'))
                                <li>
                                    <a class="nav-link" href="" data-bs-toggle="modal" data-bs-target="#signUp">
                                        <i class="me-2 fas fa-user-plus"></i>Sign Up
                                    </a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Header/Navigation -->

    <!-- Start Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>postgram.<br><span clsas="d-block">Digital Mading SMK</span></h1>
                        <p class="mb-4">postgram. adalah platform mading digital khusus untuk siswa SMK yang dirancang
                            untuk menampilkan kreativitas, ide, dan karya siswa secara online. Sebagai evolusi dari
                            mading fisik yang sering dijumpai di sekolah, postgram. memberikan ruang yang lebih luas dan
                            fleksibel bagi siswa untuk berbagi informasi, karya seni, tulisan, hingga pengumuman sekolah
                            dengan cara yang lebih modern.</p>
                        <p><a href="#explore" class="btn btn-white-outline">Explore</a></p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <img src="assets/images/hero.png" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->

    <!-- Start Product Section -->
    <div class="product-section" id="explore">
        <div class="container">
            <div class="row">
                <!-- Start Column 1 -->
                <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
                    <h2 class="mb-4 section-title">Karya Siswa SMKN 11 Malang</h2>
                    <p class="mb-4">Menampilkan kreativitas dan inovasi siswa melalui berbagai karya seni, teknologi,
                        dan literasi dalam platform digital. </p>
                </div>
                <!-- End Column 1 -->

                <!-- Start Column 2 -->
                <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                    <a class="product-item">
                        <img src="assets/images/karya-1.png" class="img-fluid product-thumbnail">
                        <h3 class="product-title">Poster Informasi</h3>
                        <p class="product-price fw-medium">Altaf Hermansyah</p>
                    </a>
                </div>
                <!-- End Column 2 -->

                <!-- Start Column 3 -->
                <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                    <a class="product-item">
                        <img src="assets/images/karya-2.png" class="img-fluid product-thumbnail">
                        <h3 class="product-title">Novel Death Note</h3>
                        <p class="product-price fw-medium">Altaf Hermansyah</p>
                    </a>
                </div>
                <!-- End Column 3 -->

                <!-- Start Column 4 -->
                <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                    <a class="product-item" href="cart.html">
                        <img src="assets/images/karya-3.png" class="img-fluid product-thumbnail">
                        <h3 class="product-title">Poster Edukasi</h3>
                        <p class="product-price fw-medium">Altaf Hermansyah</p>
                    </a>
                </div>
                <!-- End Column 4 -->

            </div>
        </div>
    </div>
    <!-- End Product Section -->

    <!-- Start Why Choose Us Section -->
    <div class="why-choose-section" id="services">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-6">
                    <h2 class="section-title">Mengapa memilih postgram.</h2>
                    <p>postgram. tidak hanya menjadi tempat menampilkan karya, tetapi juga kesempatan untuk diakui,
                        berkembang, dan belajar dari karya orang lain.</p>

                    <div class="row my-5">
                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="assets/images/upload.svg" alt="Easy Upload" class="imf-fluid">
                                </div>
                                <h3>Mudah Mengunggah Karya</h3>
                                <p>Unggah karyamu dengan cepat dan mudah hanya dalam beberapa langkah. postgram.
                                    mempermudah siswa untuk berbagi kreativitasnya.</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="assets/images/comment.svg" alt="Comment" class="imf-fluid">
                                </div>
                                <h3>Beri Komentar &amp; Feedback</h3>
                                <p>postgram. memungkinkan kamu untuk memberikan komentar dan masukan terhadap karya
                                    orang
                                    lain, menciptakan interaksi positif antar siswa.</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="assets/images/explore.svg" alt="Explore" class="imf-fluid">
                                </div>
                                <h3>Jelajahi Berbagai Kategori</h3>
                                <p>Temukan inspirasi dari berbagai kategori karya, mulai dari seni visual hingga inovasi
                                    teknologi yang diciptakan oleh siswa kreatif lainnya.</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="assets/images/award.svg" alt="Recognition" class="imf-fluid">
                                </div>
                                <h3>Penghargaan &amp; Pengakuan</h3>
                                <p>Dapatkan penghargaan dan pengakuan untuk karyamu. postgram. menyediakan platform di
                                    mana kreativitasmu dapat dilihat dan dihargai.</p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-5">
                    <div class="img-wrap">
                        <img src="assets/images/why.png" alt="Image" class="img-fluid">
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Why Choose Us Section -->

    <!-- Start We Help Section -->
    <div class="we-help-section" id="about">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <div class="imgs-grid">
                        <div class="grid grid-1"><img src="assets/images/ab-1.png" alt="postgram."></div>
                        <div class="grid grid-2"><img src="assets/images/ab-2.png" alt="postgram."></div>
                        <div class="grid grid-3"><img src="assets/images/ab-3.png" alt="postgram."></div>
                    </div>
                </div>
                <div class="col-lg-5 ps-lg-5">
                    <h2 class="section-title mb-4">Kami Membantu Anda Menampilkan Karya Kreatif</h2>
                    <p>postgram. adalah platform yang memudahkan siswa untuk menampilkan karya mereka, memberikan dan
                        menerima umpan balik, serta belajar dari karya orang lain. Kami percaya setiap karya memiliki
                        potensi untuk diakui dan dihargai.</p>

                    <ul class="list-unstyled custom-list my-4">
                        <li>Mudah untuk mengunggah karya hanya dalam beberapa langkah</li>
                        <li>Interaksi yang positif melalui fitur komentar dan umpan balik</li>
                        <li>Jelajahi berbagai kategori karya dari seni visual hingga inovasi teknologi</li>
                        <li>Dapatkan penghargaan dan pengakuan untuk kreativitasmu</li>
                    </ul>
                    <p><a href="#" class="btn">Jelajahi postgram.</a></p>
                </div>
            </div>
        </div>

    </div>
    <!-- End We Help Section -->

    <!-- Start Blog Section -->
    <div class="blog-section" id="post">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-6">
                    <h2 class="section-title">Karya Dengan Like Terbanyak</h2>
                </div>
            </div>

            <div class="row">

                <div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
                    <div class="post-entry">
                        <a href="#" class="post-thumbnail"><img src="assets/images/post-1.jpg" alt="Image"
                                class="img-fluid"></a>
                        <div class="post-content-entry">
                            <h3><a href="#">Poster Dilarang Berburu</a></h3>
                            <div class="meta">
                                <span>by <a href="#">Altaf Hermansyah</a></span> <span>on <a href="#">Dec
                                        19,
                                        2021</a></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
                    <div class="post-entry">
                        <a href="#" class="post-thumbnail"><img src="assets/images/post-2.jpg" alt="Image"
                                class="img-fluid"></a>
                        <div class="post-content-entry">
                            <h3><a href="#">Gambar Struktur Gigi</a></h3>
                            <div class="meta">
                                <span>by <a href="#">Altaf Hermansyah</a></span> <span>on <a href="#">Dec
                                        15,
                                        2021</a></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
                    <div class="post-entry">
                        <a href="#" class="post-thumbnail"><img src="assets/images/post-3.jpg" alt="Image"
                                class="img-fluid"></a>
                        <div class="post-content-entry">
                            <h3><a href="#">Photo Aesthetic</a></h3>
                            <div class="meta">
                                <span>by <a href="#">Altaf Hermansyah</a></span> <span>on <a href="#">Dec
                                        12,
                                        2021</a></span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Blog Section -->

    <!-- Start Testimonial Slider -->
    <div class="testimonial-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mx-auto text-center">
                    <h2 class="section-title">Testimonials</h2>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="testimonial-slider-wrap text-center">
                        <div id="testimonial-nav">
                            <span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
                            <span class="next" data-controls="next"><span
                                    class="fa fa-chevron-right"></span></span>
                        </div>

                        <div class="testimonial-slider">

                            <div class="item">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8 mx-auto">

                                        <div class="testimonial-block text-center">
                                            <blockquote class="mb-5">
                                                <p>&ldquo;Saya selalu berusaha menciptakan solusi digital yang tidak
                                                    hanya berfungsi, tetapi juga mudah digunakan. Mengembangkan aplikasi
                                                    seperti postgram. adalah tentang memberikan pengalaman yang efisien
                                                    dan menyenangkan bagi pengguna. Dengan fokus pada detail dan
                                                    inovasi, saya percaya bahwa teknologi dapat memberdayakan
                                                    kreativitas siswa dan mendorong mereka untuk berkembang lebih
                                                    jauh.&rdquo;</p>
                                            </blockquote>

                                            <div class="author-info">
                                                <div class="author-pic">
                                                    <img src="assets/images/person_3.jpg" alt="Developer Name"
                                                        class="img-fluid">
                                                </div>
                                                <h3 class="font-weight-bold">Altaf Hermansyah</h3>
                                                <span class="position d-block mb-3">Developer, postgram.</span>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <!-- END item -->

                            <div class="item">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8 mx-auto">

                                        <div class="testimonial-block text-center">
                                            <blockquote class="mb-5">
                                                <p>&ldquo;Donec facilisis quam ut purus rutrum lobortis. Donec vitae
                                                    odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam
                                                    vulputate velit imperdiet dolor tempor tristique. Pellentesque
                                                    habitant morbi tristique senectus et netus et malesuada fames ac
                                                    turpis egestas. Integer convallis volutpat dui quis
                                                    scelerisque.&rdquo;</p>
                                            </blockquote>

                                            <div class="author-info">
                                                <div class="author-pic">
                                                    <img src="assets/images/person_4.jpg" alt="Maria Jones"
                                                        class="img-fluid">
                                                </div>
                                                <h3 class="font-weight-bold">Maria Jones</h3>
                                                <span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- END item -->

                            <div class="item">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8 mx-auto">

                                        <div class="testimonial-block text-center">
                                            <blockquote class="mb-5">
                                                <p>&ldquo;Donec facilisis quam ut purus rutrum lobortis. Donec vitae
                                                    odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam
                                                    vulputate velit imperdiet dolor tempor tristique. Pellentesque
                                                    habitant morbi tristique senectus et netus et malesuada fames ac
                                                    turpis egestas. Integer convallis volutpat dui quis
                                                    scelerisque.&rdquo;</p>
                                            </blockquote>

                                            <div class="author-info">
                                                <div class="author-pic">
                                                    <img src="assets/images/person_1.jpg" alt="Maria Jones"
                                                        class="img-fluid">
                                                </div>
                                                <h3 class="font-weight-bold">Maria Jones</h3>
                                                <span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- END item -->

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Testimonial Slider -->


    <!-- Start Footer Section -->
    <footer class="footer-section">
        <div class="container relative">
            <div class="row g-5 mb-5">
                <div class="col-lg-4">
                    <div class="mb-4 footer-logo-wrap"><a href="#"
                            class="footer-logo">postgram<span>.</span></a></div>
                    <p class="mb-4">postgram. adalah platform yang memudahkan siswa untuk menampilkan karya mereka,
                        memberikan dan menerima umpan balik, serta belajar dari karya orang lain. Kami percaya setiap
                        karya memiliki potensi untuk diakui dan dihargai.</p>

                    <ul class="list-unstyled custom-social">
                        <li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
                        <li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
                        <li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
                        <li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
                    </ul>
                </div>

                <div class="col-lg-5">
                    <ul class="list-unstyled">
                        <li class="mb-2"><span class="me-2 fa fa-map-marker"></span> SMK Negeri 11 Malang, Jl.
                            Pelabuhan
                            Bakahuni No.1,
                            Bakalankrajan, Kec. Sukun, Kota Malang, Jawa Timur 65148</li>
                        <li class="mb-2"><span class="me-2 fa fa-phone"></span> (0341) 836330</li>
                        <li class="mb-2"><span class="me-2 fa fa-envelope"></span> mading@postgram.com</li>
                        <li class=""><span class="me-2 fa fa-globe"></span> <a
                                href="http://smkn11malang.sch.id/old/" target="_blank">www.smkn11malang.sch.id</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3">
                    <ul class="list-unstyled">
                        <li><a href="#">Home</a></li>
                        <li><a href="#services">Services</a></li>
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#post">Posts</a></li>
                    </ul>
                </div>
            </div>

            <div class="border-top copyright">
                <div class="row pt-4">
                    <div class="col-lg-6">
                        <p class="mb-2 text-center text-lg-start">Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script>. All Rights Reserved. &mdash;
                            postgram.
                        </p>
                    </div>

                    <div class="col-lg-6 text-center text-lg-end">
                        <ul class="list-unstyled d-inline-flex ms-auto">
                            <li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>

                </div>
            </div>

        </div>
    </footer>

    <!-- Modal Login -->
    <div class="modal fade" id="signIn" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- Left Close Button -->
                    <button type="button" class="btn-close position-absolute start-0 ms-3" data-bs-dismiss="modal"
                        aria-label="Close"></button>

                    <!-- Centered Title -->
                    <h3 class="modal-title mx-auto fw-bold text-primary" id="exampleModalLabel">Sign In</h3>

                    <!-- Right Close Button -->
                    <button type="button" class="btn-close position-absolute end-0 me-3" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body px-4 py-4">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="rounded p-2">
                            <div class="form-floating mb-3">
                                <input type="text" name="login" class="form-control" id="floatingInput"
                                    placeholder="Email or username">
                                <label for="floatingInput">Email or Username</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" name="password" class="form-control" id="floatingPassword"
                                    placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <button type="submit" class="text-light btn btn-primary py-3 w-100 mb-3">Sign In</button>
                            <p class="text-center mb-0">Don't have an Account? <a href=""
                                    data-bs-toggle="modal" data-bs-target="#signUp"
                                    class="fw-bold text-decoration-none text-primary">Sign Up</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Register -->
    <div class="modal fade" id="signUp" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- Left Close Button -->
                    <button type="button" class="btn-close position-absolute start-0 ms-3" data-bs-dismiss="modal"
                        aria-label="Close"></button>

                    <!-- Centered Title -->
                    <h3 class="modal-title mx-auto fw-bold text-primary" id="exampleModalLabel">Sign Up</h3>

                    <!-- Right Close Button -->
                    <button type="button" class="btn-close position-absolute end-0 me-3" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body px-4 py-4">
                    <div class="rounded p-2">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-floating mb-3">
                                <input name="name" type="text" class="form-control" id="floatingInputName"
                                    required placeholder="name">
                                <label for="floatingInput">Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input name="username" type="text" class="form-control"
                                    id="floatingInputUsername" required placeholder="username">
                                <label for="floatingInput">Username</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input name="email" type="email" class="form-control" id="floatingInputEmail"
                                    required placeholder="name@example.com">
                                <label for="floatingInput">Email Address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input name="password" type="password" class="form-control"
                                    id="floatingInputPassword" required placeholder="Password" minlength="8">
                                <label for="floatingPassword">Password</label>
                                <small class="text-muted">Password minimal 8 karakter.</small>
                            </div>
                            <div class="form-floating mb-3">
                                <select name="group_id" class="form-select" id="floatingSelect"
                                    aria-label="Select Class" required>
                                    <option selected disabled>Pilih Kelas</option>
                                    @forelse ($groups as $group)
                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                    @empty
                                    @endforelse
                                </select>
                                <label for="floatingSelect">Kelas</label>
                            </div>
                            <button type="submit" class="text-light btn btn-primary py-3 w-100 mb-3">Sign Up</button>
                        </form>
                        <p class="text-center mb-0">Already have an Account? <a href="" data-bs-toggle="modal"
                                data-bs-target="#signIn" class="fw-bold text-decoration-none text-primary">Sign In</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session('lError'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Login Failed',
                text: '{{ session('lError') }}',
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Registration Failed',
                text: '{{ $errors->first() }}',
            });
        </script>
    @endif

    <!-- End Footer Section -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/tiny-slider.js"></script>
    <script src="assets/js/custom.js"></script>
</body>

</html>
