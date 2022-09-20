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
        text: '<span style="color: #b9b9bb; font-size: 16px;">Expenses</span><br/><br/><b style="color: #C63141; font-size: 26px;">{{ $this->expensesCount }}₾</b>',
        verticalAlign: 'middle',
        floating: true
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
            borderColor: '#202125',
            dataLabels: {
                formatter: function() {
                    if(this.percentage < 5) return '';
                    return Math.round(this.percentage * 100) / 100 + '%';
                },
                enabled: true,
                distance: -30,
                color: '#202125',
                style: {
                    fontSize: '14px'
                }
            }
        },
    },
    series: [{
        name: 'Amount',
        innerSize: '60%',
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
