@extends('layouts.master-data')

@section('content')
    <div class="flex-container">

        <nav class="breadcrumb has-arrow-separator" aria-label="breadcrumbs">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('master-data') }}">Master Data</a></li>
                <li><a href="{{ route('training-nature.index') }}">Training Natures</a></li>
                <li class="is-active"><a href="#" aria-current="page">Add New Training Nature</a></li>
            </ul>
        </nav>

        <div class="columns">
            <div class="column">

                <h1 class="title">
                    Add New Training Nature
                </h1>
            </div>

        </div>

        <div class="card">
            <div class="card-content">

                {!! Form::open(['route' => 'training-nature.store']) !!}
                @include('master-data.training-natures._form')
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