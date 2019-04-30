@extends('layouts.daily-evaluations')

@section('content')
    <div class="flex-container">

        <nav class="breadcrumb has-arrow-separator" aria-label="breadcrumbs">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('daily-evaluations') }}">Daily Evaluation Dashboard</a></li>
                <li><a href="{{ route('project-summary.index') }}">Project wise Daily Evaluation Summary</a></li>
                <li class="is-active"><a href="#" aria-current="page">{{ $project->name }} Daily Evaluation Summary</a></li>
            </ul>
        </nav>

        <div class="columns">
            <div class="column">

                <h1 class="title">
                    Project wise Daily Evaluation Summary
                </h1>
            </div>

            {{--<div class="column">--}}
            {{--<a href="#" class="button is-primary is-outlined is-pulled-right m-r-10">Add New User</a>--}}
            {{--</div>--}}

        </div>


        {{--<div class="card">--}}
            {{--<div class="columns is-multiline m-l-10 m-r-10 m-t-10 p-t-10 p-b-10">--}}

                {{--<input type="date" class="m-l-30 m-r-30">--}}
                {{--<input type="date" class="m-l-30 m-r-30">--}}
                {{--<a href="#" class="button is-primary is-outlined is-pulled-right p-l-30 p-r-30">Filter</a>--}}

            {{--</div>--}}
        {{--</div>--}}


        <div class="card">
            <div class="card-content">

                <nav class="level">
                    <!-- Left side -->
                    <div class="level-left">
                        <div class="level-item">

                            {{--{!! Form::open(['method' => 'GET', 'url' => '/master-data/project', 'role'=>'search']) !!}--}}
                            <div class="field is-horizontal">

                                <p class="control">
                                <div class="field-label is-normal">
                                    <label class="label">From</label>
                                </div>
                                    <input class="input" name="project" type="date" value="{{ Carbon\Carbon::now()->startOfMonth()->toDateString() }}">
                                </p>

                                <p class="control">
                                    <div class="field-label is-normal m-l-20">
                                        <label class="label">To</label>
                                    </div>
                                    <input class="input" name="region" type="date" value="{{ Carbon\Carbon::now()->toDateString() }}">
                                </p>
                                <p class="control m-l-40">
                                    <button class="button">
                                        Filter
                                    </button>
                                </p>

                            </div>
{{--                            {!! Form::close() !!}--}}

                        </div>
                    </div>

                </nav>


                <div class="is-divider" data-content="Summary"></div>

                <div class="tile is-dark">
                    <article class="tile is-child notification">
                        <p class="subtitle">{{ $project->name }} Daily Evaluation Summary for {{ Carbon\Carbon::now()->format('F') }} - {{ Carbon\Carbon::now()->year }}</p>


                    </article>
                </div>
                <div class="is-divider" data-content="Error Type Distribution"></div>
                <canvas id="myChart" class="error_chart" role="img"></canvas>

                <div class="is-divider" data-content="Responsibility Distribution"></div>


                <div class="columns">
                    <div class="column">SKU confusion-Sizes</div>
                    <div class="column">SKU confusion-SKU Flavors</div>
                    <div class="column">SKU Confusion -Brand tagged when SKU available</div>
                </div>

                <div class="columns">
                    <div class="column">
                        <canvas id="myCchart" width="300" height="300"></canvas>
                    </div>

                    <div class="column">
                        <canvas id="myCchart2" width="300" height="300"></canvas>
                    </div>

                    <div class="column">
                        <canvas id="myCchart3" width="300" height="300"></canvas>
                    </div>
                </div>

                <div class="is-divider" data-content="Image Flaws"></div>


                <div class="columns">
                    <div class="column is-4-desktop"><canvas id="myCchart4" width="300" height="300"></canvas></div>
                    <div class="column is-8-desktop">
                            <canvas id="myiChart"></canvas>
                        </div>
                </div>


            </div>
        </div>


    </div>

@endsection

@section('scripts')
    <script>
        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
//                labels: ["a","v","d","r","s"],
                labels: {!! $errorTypes !!},
                datasets: [{
                    label: '# of Tags',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: "rgba(255,99,132,0.2)",
                    borderColor: "rgba(255,99,132,1)",
                    borderWidth: 1,hoverBackgroundColor: "rgba(255,99,132,0.4)",
                    hoverBorderColor: "rgba(255,99,132,1)"
                }]
            },
            options: {
                animation: {
                    duration: 2000,
                    easing : 'linear'
                },
                scales: {
                    xAxes: [{
                        stacked: false,
                        beginAtZero: true,
                        scaleLabel: {
                            labelString: 'Month'
                        },
                        ticks: {
                            stepSize: 1,
                            min: 0,
                            autoSkip: false
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>

    <script>
        var ctx = document.getElementById("myCchart");
        var myCchart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['QAT-Negligence', 'Probe Quality Issue', 'Others'],
                datasets: [{
                    label: '# of Tomatoes',
                    data: [12, 19, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 0, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 0, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                cutoutPercentage: 60,
                responsive: false,

            }
        });
    </script>

    <script>
        var ctx = document.getElementById("myCchart2");
        var myCchart2 = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['QAT-Negligence', 'QAT'],
                datasets: [{
                    label: '# of Tomatoes',
                    data: [1, 8],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                cutoutPercentage: 60,
                responsive: false,

            }
        });
    </script>

    <script>
        var ctx = document.getElementById("myCchart3");
        var myCchart3 = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['QAT-Negligence', 'Engine Tags'],
                datasets: [{
                    label: '# of Tomatoes',
                    data: [12, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                cutoutPercentage: 60,
                responsive: false,

            }
        });
    </script>

    <script>
        var ctx = document.getElementById("myCchart4");
        var myCchart4 = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Flawed', 'Flawless'],
                datasets: [{
                    label: '# of Probes',
                    data: [8, 28],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                cutoutPercentage: 60,
                responsive: false,

            }
        });
    </script>

    <script>
        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
//                labels: ["a","v","d","r","s"],
                labels: {!! $errorTypes !!},
                datasets: [{
                    label: '# of Tags',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: "rgba(255,99,132,0.2)",
                    borderColor: "rgba(255,99,132,1)",
                    borderWidth: 1,hoverBackgroundColor: "rgba(255,99,132,0.4)",
                    hoverBorderColor: "rgba(255,99,132,1)"
                }]
            },
            options: {
                animation: {
                    duration: 2000,
                    easing : 'linear'
                },
                scales: {
                    xAxes: [{
                        stacked: false,
                        beginAtZero: true,
                        scaleLabel: {
                            labelString: 'Month'
                        },
                        ticks: {
                            stepSize: 1,
                            min: 0,
                            autoSkip: false
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>

    <script>
        var ctx = document.getElementById('myiChart');
        var myiChart = new Chart(ctx, {
            type: 'bar',
            data: {
//                labels: ["a","v","d","r","s"],
                labels: ["Limited Resolution","Too Blurry", "Reflection"],
                datasets: [{
                    label: '# of Probes',
                    data: [12, 3, 2],
                    backgroundColor: "rgba(255,99,132,0.2)",
                    borderColor: "rgba(255,99,132,1)",
                    borderWidth: 1,hoverBackgroundColor: "rgba(255,99,132,0.4)",
                    hoverBorderColor: "rgba(255,99,132,1)"
                }]
            },
            options: {
                animation: {
                    duration: 2000,
                    easing : 'linear'
                },
                scales: {
                    xAxes: [{
                        stacked: false,
                        beginAtZero: true,
                        scaleLabel: {
                            labelString: 'Month'
                        },
                        ticks: {
                            stepSize: 1,
                            min: 0,
                            autoSkip: false
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
@endsection