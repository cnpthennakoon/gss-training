@extends('layouts.training')

@section('content')
    <div class="flex-container">

        <nav class="breadcrumb has-arrow-separator" aria-label="breadcrumbs">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('master-data') }}">Master Data</a></li>
                <li><a href="{{ route('training-batch.index') }}">Training Batches</a></li>
                <li class="is-active"><a href="#" aria-current="page">Edit Training Batch</a></li>
            </ul>
        </nav>

        <div class="columns">
            <div class="column">

                <h1 class="title">
                    Edit Training Batch
                </h1>
            </div>

        </div>

        <div class="card">
            <div class="card-content">

                {!! Form::model($trainingBatch, ['route' => ['training-batch.update', $trainingBatch->id], 'method' => 'PATCH']) !!}
                @include('training.training-batch._edit-form')
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