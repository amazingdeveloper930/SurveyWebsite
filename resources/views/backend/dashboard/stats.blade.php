@extends('backend.layouts.default')

{{-- @section('title'){{ Statistics }}@stop --}}
<script src="https://www.gstatic.com/charts/loader.js" type="text/javascript">
</script>
@section('content')
<section id="content">
    <div class="container page-profile">
        <div class="pageheader">
            <h2>
                Statistics
            </h2>
        </div>
        <div class="pagecontent">
            <div class="row">
                <section class="tile tile-simple">
                    <div class="tile-body p-0">
                        <div class="row">
                            <div class="col-sm-12">
                                <hr/>
                                <div id="line-chart">
                                </div>
                                <script type="text/javascript">
                                    google.charts.load("current", {packages:["corechart"]});
                                    google.charts.setOnLoadCallback(drawChart);
                                    function drawChart() {
                                        var data = google.visualization.arrayToDataTable([
                                            ['Date', 'Surveys', 'Answers'],
                                            @foreach ($surveys as $k => $option)
                                                ['{{ $option->created_at->format('Y-m-d') }}', {{ $option->cnt }}, {{ $answers[$k]->cnt }}],
                                            @endforeach
                                            
                                        ]);

                                        var options = {
                                            height: 400,
                                            is3D: true,
                                            legend: { position: 'bottom' },
                                            title: 'Survey & Answers',
                                            hAxis: {
                                              // title: 'Date',
                                              slantedText: true,
                                              textStyle: {
                                                fontSize: 11
                                              },
                                            }
                                        };
                                        var chart = new google.visualization.LineChart(document.getElementById('line-chart'));
                                        chart.draw(data, options);
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>
