@extends('layouts.app')

@section('content')
<a title="Go back to dashboard" href="{{ route('home', ['from' => request('from'), 'to' => request('to')]) }}" class="text-primary p-0 text-decoration-none text-light mb-2">
    <i class="fas fa-angle-left me-1"></i>
    <small class="text-secondary">Back</small>
</a>
<div class="d-flex align-items-center justify-content-between mt-3">
    <div class="d-flex align-items-center gap-2">
        <span class="icon-badge bg-secondary">
            <i class="fas {{ $category->icon }} text-secondary fa-xs me-2"></i>
        </span>
        <small class="text-light">{{ $category->title }}</small>
    </div>
    <div class="text-end">
        <small class="{{ $category->type === 'add' ? 'text-success' : 'text-danger' }}">
            {{ $category->activities->sum('amount') . auth()->user()->currency_symbol }}
        </small>
    </div>
</div>
<div class="mt-2">
    @forelse($category->activities as $activity)
    <div class="d-flex align-items-center justify-content-between">
        <div>
            <small class="{{ $category->type === 'add' ? 'text-success' : 'text-danger' }}">
                {{ $activity->amount . auth()->user()->currency_symbol }}
                @if($activity->note)
                <span class="tiny-text text-secondary">
                    ({{ $activity->note }})
                </span>
                @endif
            </small>
        </div>
        <div class="d-flex align-items-center gap-1">
            <small class="text-secondary">{{ Carbon\Carbon::parse($activity->created_at)->format('d M, Y') }}</small>
            <form action="{{ route('activities.destroy', ['category' => $activity->category, 'activity' => $activity]) }}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn text-primary border-0 p-0" title="Remove activity">
                    <i class="fas fa-trash fa-sm text-secondary cursor-pointer" onclick="return confirm('Are you sure?');"></i>
                </button>
            </form>
        </div>
    </div>
    @if(!$loop->last)
    <hr class="my-1 p-0 text-secondary" />
    @endif
    @empty
    @endforelse
</div>
@endsection