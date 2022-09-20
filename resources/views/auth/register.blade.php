@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-4 mt-3">
            <div class="card bg-dark rounded-3 shadow-sm border-0 bg-white">
                <div class="card-header bg-dark text-light rounded-3 border-0">
                    <h1 class="mb-0 fs-5">Register</h1>
                </div>
                <form action="{{ route('auth.register') }}" method="POST" class="card-body">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name" class="form-label text-light">Full name</label>
                        <input type="text" name="name" id="name" class="form-control bg-secondary text-secondary border-0 @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Ex: John Doe" autofocus>

                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="email" class="form-label text-light">Email address</label>
                        <input type="email" name="email" id="email" class="form-control bg-secondary text-secondary border-0 @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Ex: johndoe@mail.com">

                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="password" class="form-label text-light">Secure password</label>
                        <input type="password" name="password" id="password" class="form-control bg-secondary text-secondary border-0 @error('password') is-invalid @enderror" placeholder="Ex: Passw@rd1234">

                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="password_confirmation" class="form-label text-light">Repeat password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control bg-secondary text-secondary border-0 @error('password_confirmation') is-invalid @enderror" placeholder="Ex: Passw@rd1234">

                        @error('password_confirmation')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn bg-primary text-light rounded-3 shadow-sm px-4">Register</button>
                        <a href="{{ route('login') }}" class="btn text-primary text-decoration-none">Already registered?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection