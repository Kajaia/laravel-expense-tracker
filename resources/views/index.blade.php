@extends('layouts.app')

@section('content')
<livewire:activity-form />
<form action="{{ route('home') }}" method="GET" class="d-flex align-items-center gap-2 my-3">
    <i class="fas fa-calendar-alt fa-lg text-secondary"></i>
    <input type="date" name="from" max="{{ Carbon\Carbon::now()->format('Y-m-d') }}" class="form-control py-1 text-small cursor-pointer" value="{{ request('from') }}" placeholder="Date (from)" title="Date (from)" >
    <input type="date" name="to" max="{{ Carbon\Carbon::now()->format('Y-m-d') }}" class="form-control py-1 text-small cursor-pointer" value="{{ request('to') }}" placeholder="Date (to)" title="Date (to)" >
    <button type="submit" class="btn btn-sm btn-primary rounded-3 shadow-sm px-2 py-1">
        <i class="fas fa-check fa-sm"></i>
    </button>
</form>
<livewire:activity-list />
@endsection