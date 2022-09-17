<div class="mt-3">
    <div class="d-flex align-items-center gap-2 mb-3">
        <i class="fas fa-calendar-alt fa-lg text-secondary"></i>
        <input wire:model="from" type="date" max="{{ Carbon\Carbon::now()->format('Y-m-d') }}" class="form-control py-1 text-small cursor-pointer" placeholder="Date (from)" title="Date (from)">
        <input wire:model="to" type="date" max="{{ Carbon\Carbon::now()->format('Y-m-d') }}" class="form-control py-1 text-small cursor-pointer" placeholder="Date (to)" title="Date (to)">
    </div>
    @if($this->categories->count())
    <figure wire:ignore class="highcharts-figure">
        <div id="container"></div>
    </figure>
    @endif
    @foreach($this->categories as $category)
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
                        <small>{{ Carbon\Carbon::parse($activity->created_at)->diffForHumans() }}</small>
                    </div>
                </div>
                @if(!$loop->last)
                <hr class="m-0 p-0 text-dark" />
                @endif
            @empty
            @endforelse
        </div>
    @endforeach
</div>

@section('scripts')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: ''
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.y}₾</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '₾'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.y}₾'
            }
        }
    },
    series: [{
        name: 'Amount',
        colorByPoint: true,
        data: [
            @foreach($this->categories as $category)
            {
                name: '<span style="color: {{ $category->type === "add" ? "#198754" : "#dc3545" }};">{{ $category->title }}</span>',
                y: Math.abs({{ $category->activities->sum('amount') }})
            },
            @endforeach
        ]
    }]
});
</script>
@endsection