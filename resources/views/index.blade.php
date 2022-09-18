@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-4 my-3">
            <div class="card rounded-3 shadow-sm border-0">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <div title="{{ 'Logged in user: ' . Auth::user()->name }}">
                            <h1 class="mb-0 fs-5">Hello, {{ Auth::user()->name }}!</h1>
                            <livewire:activity-balance />
                        </div>
                        <div>
                            <a href="{{ route('home') }}" class="btn btn-sm btn-secondary rounded-3 shadow-sm" title="Refresh page">
                                <i class="fas fa-redo"></i>
                            </a>
                            <form class="d-inline" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-primary rounded-3 shadow-sm" title="Logout">
                                    <i class="fas fa-power-off"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="mt-3">
                        <livewire:activity-form />
                        <livewire:activity-list />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection