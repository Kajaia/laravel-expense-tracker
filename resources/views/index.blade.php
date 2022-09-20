@extends('layouts.app')

@section('content')
<livewire:activity-form />
<div class="bg-secondary rounded-3 px-2">
    <form action="{{ route('home') }}" method="GET" class="d-flex align-items-center gap-2 my-3">
        <i class="fas fa-calendar-alt fa-sm text-secondary"></i>
        <input type="date" name="from" max="{{ Carbon\Carbon::now()->format('Y-m-d') }}" class="form-control py-1 text-small cursor-pointer bg-secondary border-0 text-light" value="{{ request('from') }}" placeholder="Date (from)" title="Date (from)" >
        <input type="date" name="to" max="{{ Carbon\Carbon::now()->format('Y-m-d') }}" class="form-control py-1 text-small cursor-pointer bg-secondary border-0 text-light" value="{{ request('to') }}" placeholder="Date (to)" title="Date (to)" >
        <button type="submit" title="Apply dates" class="btn btn-sm bg-secondary text-secondary rounded-3 shadow-sm px-2 py-1">
            <i class="fas fa-check fa-sm"></i>
        </button>
    </form>
</div>
<livewire:activity-list />
@endsection