@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="{{ url('/') }}" class="text-decoration-none text-dark">
                            <h3>postgram.</h3>
                        </a>
                        <h4>Sign in</h4>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email or Username</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <button type="submit" class="text-light btn btn-success py-3 w-100 mb-4">Sign
                        In</button>
                    <p class="text-center mb-0">Don't have an Account? <a href="" style="color: #3b5d50;">Sign
                            Up</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
