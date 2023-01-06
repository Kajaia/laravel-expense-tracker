<div class="mt-3">
    @if($this->categories)
        <livewire:chart-data />
    @endif
    <div class="row">
        @foreach($this->categories as $category)
            <div class="col-12" title="Click to get detailed info">
                <div class="card bg-dark border-0 rounded-0 p-0">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center gap-2">
                            <span class="icon-badge bg-secondary">
                                <i class="fas {{ $category->icon }} text-secondary fa-xs me-2"></i>
                            </span>
                            <a href="{{ route('activities.show', ['category' => $category, 'from' => request('from'), 'to' => request('to')]) }}" class="text-light text-decoration-none stretched-link">
                                <small>{{ $category->title }}</small>
                            </a>
                        </div>
                        <div class="text-end">
                            <small class="{{ $category->type === 'add' ? 'text-success' : 'text-danger' }}">
                                {{ $category->activities->sum('amount') . auth()->user()->currency_symbol }}
                                <i class="fas fa-angle-right ms-2 text-primary"></i>
                            </small>
                        </div>
                    </div>
                    @if(!$loop->last)
                    <hr class="my-2 p-0 text-secondary" />
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>