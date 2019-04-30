@extends('layouts.master-data')

@section('content')
    <div class="flex-container">

        <nav class="breadcrumb has-arrow-separator" aria-label="breadcrumbs">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('master-data') }}">Master Data</a></li>
                <li><a href="{{ route('training-project-status.index') }}">Training Project Status</a></li>
                <li class="is-active"><a href="#" aria-current="page">Edit Training Project Status</a></li>
            </ul>
        </nav>

        <div class="columns">
            <div class="column">

                <h1 class="title">
                    Edit Training Project Status
                </h1>
            </div>

        </div>

        <div class="card">
            <div class="card-content">

                {!! Form::model($trainingProjectStatus, ['route' => ['training-project-status.update', $trainingProjectStatus->id], 'method' => 'PATCH']) !!}
                    @include('master-data.training-project-status._form')
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