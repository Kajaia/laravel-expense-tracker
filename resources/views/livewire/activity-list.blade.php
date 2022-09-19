<div class="mt-3">
    <div class="d-flex align-items-center gap-2 mb-3">
        <i class="fas fa-calendar-alt fa-lg text-secondary"></i>
        <input wire:model="from" type="date" max="{{ Carbon\Carbon::now()->format('Y-m-d') }}" class="form-control py-1 text-small cursor-pointer" placeholder="Date (from)" title="Date (from)">
        <input wire:model="to" type="date" max="{{ Carbon\Carbon::now()->format('Y-m-d') }}" class="form-control py-1 text-small cursor-pointer" placeholder="Date (to)" title="Date (to)">
    </div>
    @if($this->expenses->count())
    <figure wire:ignore class="highcharts-figure">
        <div id="chart"></div>
    </figure>
    @endif
    <div class="row">
        @foreach($this->categories as $category)
            <div class="col-12">
                <div class="card border-0 rounded-0 p-0">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <i class="fas {{ $category->icon }} text-primary me-3"></i>
                            <a href="{{ route('activities', $category) }}" class="fw-bold text-dark text-decoration-none stretched-link">{{ $category->title }}</a>
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

@section('scripts')
@if($this->expenses->count())
<script>
Highcharts.chart('chart', {
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
        pointFormat: '<b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                formatter: function() {
                    return Math.round(this.percentage * 100) / 100 + '%';
                },
                distance: -30,
                color:'white'
            }
        }
    },
    series: [{
        name: 'Amount',
        innerSize: '50%',
        colorByPoint: true,
        data: [
            @foreach($this->expenses as $expense)
            {
                name: '{{ $expense->title }}',
                y: {{ $expense->activities->sum('amount') }}
            },
            @endforeach
        ]
    }]
});
</script>
@endif
@endsection