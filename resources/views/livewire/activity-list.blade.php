<div class="mt-3">
    @if($this->categories)
        <livewire:chart-data />
    @endif
    <div class="row">
        @foreach($this->categories as $category)
            <div class="col-12">
                <div class="card border-0 rounded-0 p-0">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <i class="fas {{ $category->icon }} text-primary me-3"></i>
                            <a href="{{ route('activities', ['category' => $category, 'from' => request('from'), 'to' => request('to')]) }}" class="fw-bold text-dark text-decoration-none stretched-link">{{ $category->title }}</a>
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
                    @if(!$loop->last)
                    <hr class="my-2 p-0 text-secondary" />
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>