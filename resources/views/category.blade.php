@extends('layouts.app')

@section('content')
<a href="{{ route('home') }}" class="btn btn-link p-0 text-decoration-none mb-2">
    <i class="fas fa-angle-left"></i>
    Back
</a>
<div class="d-flex align-items-center justify-content-between">
    <div>
        <i class="fas {{ $category->icon }} text-primary me-3"></i>
        <span class="fw-bold">{{ $category->title }}</span>
        <span class="badge {{ $category->type === 'add' ? 'bg-success' : 'bg-danger' }} rounded-circle shadow-sm ms-1">
            {{ $category->activities->count() }}
        </span>
    </div>
    <div class="text-end">
        <span class="badge {{ $category->type === 'add' ? 'bg-success' : 'bg-danger' }} rounded-pill shadow-sm">
            {{ $category->activities->sum('amount') . '₾' }}
        </span>
    </div>
</div>
<div class="px-4 py-2 bg-light rounded-2 mt-2 mb-3">
    @forelse($category->activities as $activity)
    <div class="d-flex align-items-center justify-content-between">
        <div>
            <small class="{{ $category->type === 'add' ? 'text-success' : 'text-danger' }}">
                {{ $activity->amount . '₾' }}
                @if($activity->note)
                <span class="tiny-text text-dark">
                    ({{ $activity->note }})
                </span>
                @endif
            </small>
        </div>
        <div>
            <small>{{ Carbon\Carbon::parse($activity->created_at)->format('d M, Y') }}</small>
        </div>
    </div>
    @if(!$loop->last)
    <hr class="m-0 p-0 text-dark" />
    @endif
    @empty
    @endforelse
</div>
@endsection