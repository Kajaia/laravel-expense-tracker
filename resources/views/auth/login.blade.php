@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-4 mt-3">
            <div class="card bg-dark rounded-3 shadow-sm border-0 bg-white">
                <div class="card-header bg-dark bg-white rounded-3 border-0">
                    <h1 class="mb-0 fs-5 text-light">Login</h1>
                </div>
                <form action="{{ route('auth.login') }}" method="POST" class="card-body">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="email" class="form-label text-light">Email address</label>
                        <input type="email" name="email" id="email" class="form-control bg-secondary text-secondary border-0 @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Ex: johndoe@mail.com" autofocus>

                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="password" class="form-label text-light">Password</label>
                        <input type="password" name="password" id="password" class="form-control bg-secondary text-secondary border-0 @error('password') is-invalid @enderror" placeholder="Ex: Passw@rd1234">

                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <div class="form-check">
                            <input class="form-check-input bg-secondary border-0" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label text-light" for="remember">
                                Remember me
                            </label>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn bg-primary text-light rounded-3 shadow-sm px-4">Login</button>
                        <a href="{{ route('register') }}" class="btn text-primary text-decoration-none">Register</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection