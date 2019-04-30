@extends('layouts.master-data')

@section('content')
    <div class="flex-container">

        <nav class="breadcrumb has-arrow-separator" aria-label="breadcrumbs">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('master-data') }}">Master Data</a></li>
                <li><a href="{{ route('error-type.index') }}">Error Types</a></li>
                <li class="is-active"><a href="#" aria-current="page">Edit Error Type</a></li>
            </ul>
        </nav>

        <div class="columns">
            <div class="column">

                <h1 class="title">
                    Edit Error Type
                </h1>
            </div>

        </div>

        <div class="card">
            <div class="card-content">

                {!! Form::model($errorType, ['route' => ['error-type.update', $errorType->id], 'method' => 'PATCH']) !!}
                @include('master-data.error-types._form')
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