<div>
    @if($this->expenses->count())
    <figure wire:ignore class="highcharts-figure">
        <div id="chart"></div>
    </figure>
    @endif
</div>

@section('scripts')
<script>
Highcharts.chart('chart', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie',
        backgroundColor: null
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
@endsection
