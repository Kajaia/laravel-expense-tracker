@extends('layouts.app')

@section('content')
<livewire:activity-form />
<div class="bg-secondary rounded-3 px-2">
    <form action="{{ route('home') }}" method="GET" class="d-flex align-items-center gap-2 my-3">
        <i class="fas fa-calendar-alt fa-sm text-secondary"></i>
        <input type="text" name="from" class="form-control flatpickr py-1 text-small cursor-pointer bg-secondary border-0 text-light" value="{{ request('from') }}" placeholder="Date (from)" title="Date (from)" >
        <input type="text" name="to" class="form-control flatpickr py-1 text-small cursor-pointer bg-secondary border-0 text-light" value="{{ request('to') }}" placeholder="Date (to)" title="Date (to)" >
        <button type="submit" title="Apply dates" class="btn btn-sm bg-secondary text-secondary rounded-3 shadow-sm px-2 py-1">
            <i class="fas fa-check fa-sm"></i>
        </button>
        <a href="{{ route('home') }}" title="Clear dates" class="btn btn-sm bg-secondary text-secondary rounded-3 shadow-sm px-2 py-1">
            <i class="fas fa-times fa-sm"></i>
        </a>
    </form>
</div>
<livewire:activity-list />
@endsection