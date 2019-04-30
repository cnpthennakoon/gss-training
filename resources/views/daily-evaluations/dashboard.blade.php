@extends('layouts.daily-evaluations')

@section('content')
    <div class="flex-container">

        <nav class="breadcrumb has-arrow-separator" aria-label="breadcrumbs">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="is-active"><a href="#" aria-current="page">Daily Evaluation Dashboard</a></li>
            </ul>
        </nav>

        <div class="columns">
            <div class="column">

                <h1 class="title">
                    Daily Evaluation Dashboard
                </h1>
            </div>

            {{--<div class="column">--}}
            {{--<a href="#" class="button is-primary is-outlined is-pulled-right m-r-10">Add New User</a>--}}
            {{--</div>--}}

        </div>

        <nav class="level daily-evaluation-dashboard">
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">Total Projects</p>
                    <p class="title">102</p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">Accuracy Met Projects (PAR)</p>
                    <p class="title">83</p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">Accuracy Met Projects (DE)</p>
                    <p class="title">78</p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">Total QATs</p>
                    <p class="title">6589</p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">Total Met QATs</p>
                    <p class="title">3200</p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">Total Daily Audits</p>
                    <p class="title">1526</p>
                </div>
            </div>
        </nav>


        <div class="card">
            <div class="card-body">

                <div class="timeline is-centered p-t-50 p-b-50">
                    <header class="timeline-header">
                        <span class="tag is-medium is-primary">Daily Evaluations</span>
                    </header>

                    <header class="timeline-header">
                        <span class="tag is-primary m-t-20">Project wise</span>
                    </header>

                    <div class="timeline-item">
                        <div class="timeline-marker is-icon">
                            <i class="fa fa-flag"></i>
                        </div>
                        <div class="timeline-content">
                            <p class="heading">Project Wise</p>
                            <p>View Project wise Daily Evaluation Summary</p>
                            <a href="{{ route('project-summary.index') }}" class="button is-outlined">

                                <span class="icon is-small p-r-10">
                                    <i class="fa fa-angle-left"></i>
                                </span>
                                Continue
                            </a>
                        </div>
                    </div>
                    <header class="timeline-header">
                        <span class="tag is-primary">Globally</span>
                    </header>
                    <div class="timeline-item">
                        <div class="timeline-marker is-icon">
                            <i class="fa fa-flag"></i>
                        </div>
                        <div class="timeline-content">

                            <p class="heading">Global Project Wise</p>
                            <p>View Global Project wise Daily Evaluations Summary</p>

                            <a class="button is-outlined">
                                Continue
                                <span class="icon is-small p-l-10">
                                    <i class="fa fa-angle-right"></i>
                                </span>
                            </a>

                        </div>
                    </div>

                    <div class="timeline-header">
                        <span class="tag is-medium is-primary">
                            <span class="icon is-small">
                                    <i class="fa fa-circle"></i>
                                </span>
                        </span>
                    </div>
                </div>



            </div>
        </div>


    </div>
@endsection