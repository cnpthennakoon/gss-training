@extends('layouts.master-data')

@section('content')
    <div class="flex-container">

        <nav class="breadcrumb has-arrow-separator" aria-label="breadcrumbs">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('master-data') }}">Master Data</a></li>
                <li><a href="{{ route('training-batch-type.index') }}">Training Batch Types</a></li>
                <li class="is-active"><a href="#" aria-current="page">Edit Training Batch Type</a></li>
            </ul>
        </nav>

        <div class="columns">
            <div class="column">

                <h1 class="title">
                    Edit Training Batch Type
                </h1>
            </div>

        </div>

        <div class="card">
            <div class="card-content">

                {!! Form::model($trainingBatchType, ['route' => ['training-batch-type.update', $trainingBatchType->id], 'method' => 'PATCH']) !!}
                    @include('master-data.training-batch-types._form')
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