@extends('layouts.daily-evaluations')

@section('content')
    <div class="flex-container">

        <nav class="breadcrumb has-arrow-separator" aria-label="breadcrumbs">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('daily-evaluations') }}">Daily Evaluations</a></li>
                <li><a href="{{ route('audits.index') }}">Daily Audits</a></li>
                <li class="is-active"><a href="#" aria-current="page">View Audit</a></li>
            </ul>
        </nav>

        <div class="columns">
            <div class="column">

                <h1 class="title">
                    {{ $audit->project->name }} Audits <small>(<em>{{ $audit->audit_date }}</em>)</small>
                </h1>
            </div>
            <div class="column is-2">
                <a href="{{ route('audits.submit_audit', $audit->id) }}" class="button is-fullwidth is-success is-outlined is-pulled-right m-r-10">Submit Data</a>
            </div>
        </div>

        <div class="card">
        <div class="card-content">



        <table class="table is-bordered is-narrow is-fullwidth is-hoverable">
            <thead>
                <tr>
                    <th>QAT ID</th>
                    <th>Probe ID</th>
                    <th>Tagged Count</th>
                    <th>Price Tags Count</th>
                    <th>Scene Type</th>
                    <th>Created Date</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($audit->dailyEvaluation as $dailyEvaluation)
                    <tr>
                        <td>{{ $dailyEvaluation->qat_id }}</td>
                        <td><span class="tag is-info">{{ $dailyEvaluation->probe_id }}</span></td>
                        <td>{{ $dailyEvaluation->tagged_count}}</td>
                        <td>{{ $dailyEvaluation->price_tags_count }}</td>
                        <td>{{ $dailyEvaluation->scene_type }}</td>
                        <td>
                        @if($dailyEvaluation->created_at)
                        {{ $dailyEvaluation->created_at->toDateString() }}
                        @endif
                        </td>

                        <td class="has-text-centered">
                                                        <a class="button is-outlined is-small is-half" href="{{ route('daily-audits.show', $dailyEvaluation->id) }}">View</a>
                        <a class="button is-outlined is-small is-half" href="{{ route('daily-audits.edit', $dailyEvaluation->id) }}">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>


        </div>
        </div>



    </div>
@endsection

@section('scripts')

    <script>
        var app = new Vue({
            el: '#app',
            data: {
            }
        })
    </script>

@endsection