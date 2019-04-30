@extends('layouts.daily-evaluations')

@section('content')
    <div class="flex-container">

        <nav class="breadcrumb has-arrow-separator" aria-label="breadcrumbs">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('daily-evaluations') }}">Daily Evaluation Dashboard</a></li>
                <li class="is-active"><a href="#" aria-current="page">Project wise Daily Evaluation Summary</a></li>
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


        <div class="card">
            <div class="columns is-multiline m-l-10 m-r-10 m-t-10">

                @foreach($projects as $project)
                    <div class="column is-3">
                        <a href="{{ route('project-summary.show', $project->id) }}" class="button is-large is-fullwidth is-outlined">{{ $project->name }}</a>
                    </div>
                @endforeach

            </div>
        </div>


    </div>
@endsection