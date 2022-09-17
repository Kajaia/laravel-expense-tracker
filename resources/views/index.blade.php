@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-4 mt-3">
            <div class="card rounded-3 shadow-sm border-0">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <h1 class="mb-0 fs-5">Hello, {{ Auth::user()->name }}!</h1>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-primary rounded-3 shadow-sm px-4">
                                Logout
                            </button>
                        </form>
                    </div>
                    <div>
                        <h6>Add categories</h6>
                        <livewire:categories-by-types :type="'add'" />
                    </div>
                    <div>
                        <h6>Subtract categories</h6>
                        <livewire:categories-by-types :type="'subtract'" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection