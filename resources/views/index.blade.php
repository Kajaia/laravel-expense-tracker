@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-4 mt-3">
            <div class="card rounded-3 shadow-sm border-0">
                <div class="card-body">
                    <h1 class="fs-4">Hello, {{ Auth::user()->name }}!</h1>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary rounded-3 shadow-sm px-4">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection