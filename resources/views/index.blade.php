@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-4 mt-3">
            <div class="card rounded-3 shadow-sm border-0">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <div>
                            <h1 class="mb-0 fs-5">Hello, {{ Auth::user()->name }}!</h1>
                            <small class="mb-0">
                                Balance: <span class="fw-bold">{{ Auth::user()->balance . '₾' }}</span>
                            </small>
                        </div>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-primary rounded-3 shadow-sm px-4">
                                Logout
                            </button>
                        </form>
                    </div>
                    <div class="mt-3">
                        <h6>Activity</h6>
                        <livewire:activity-form />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection