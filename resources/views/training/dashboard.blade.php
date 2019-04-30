@extends('layouts.training')

@section('content')
    <div class="flex-container">

        <nav class="breadcrumb has-arrow-separator" aria-label="breadcrumbs">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="is-active"><a href="#" aria-current="page">Training Dashboard</a></li>
            </ul>
        </nav>

        <div class="columns">
            <div class="column">

                <h1 class="title">
                    Training Dashboard
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
                    <p class="title">{{ $projects }}</p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">Total Trained QAts' for {{ \Carbon\Carbon::now()->format('F') }} - {{ \Carbon\Carbon::now()->year }}</p>
                    <p class="title">#</p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">Total QAT Shortfall</p>
                    <p class="title">#</p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">Total HR Attrition</p>
                    <p class="title">#</p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">Total Training Attrition</p>
                    <p class="title">#</p>
                </div>
            </div>
        </nav>


        <div class="card">
            <div class="card-body is-fullheight">

                <p class="subtitle">
                    Dashboard goes here
                </p>


            </div>
        </div>


    </div>
@endsection
