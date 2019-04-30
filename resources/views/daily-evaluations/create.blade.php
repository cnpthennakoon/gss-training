@extends('layouts.daily-evaluations')

@section('content')
    <div class="flex-container">

        <nav class="breadcrumb has-arrow-separator" aria-label="breadcrumbs">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('daily-evaluations') }}">Daily Evaluations</a></li>
                <li class="is-active"><a href="#" aria-current="page">New Evaluation (Excel)</a></li>
            </ul>
        </nav>

        <div class="columns">
            <div class="column">

                <h1 class="title">
                    Daily Evaluation Dashboard
                </h1>
            </div>
        </div>

        <div class="card">
            <div class="card-content">

                {!! Form::open(['files' => true, 'route' => 'daily-audits.store']) !!}

                @include('_includes.form._select', ['name' => 'project_id', 'title' => 'Select a project', 'list' => $projectsList])

                <label for="audit_date" class="label m-t-20">Audit Date :</label>

                <input type="date" name="audit_date">

                <div class="field m-t-20">
                    <label for="daily_audit" class="label">Upload the Daily Evaluation :</label>

                    <p class="control">
                        <input class="input" name="daily_audit" type="file" id="daily_audit" accept=".csv" required>

                    </p>


                </div>

                @include('_includes.form._save')
                {!! Form::close() !!}

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