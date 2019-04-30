@extends('layouts.master-data')

@section('content')
    <div class="flex-container">

        <nav class="breadcrumb has-arrow-separator" aria-label="breadcrumbs">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('master-data') }}">Master Data</a></li>
                <li><a href="{{ route('image-flaw.index') }}">Image Flaws</a></li>
                <li class="is-active"><a href="#" aria-current="page">Edit Image Flaws</a></li>
            </ul>
        </nav>

        <div class="columns">
            <div class="column">

                <h1 class="title">
                    Edit Image Flaw
                </h1>
            </div>

        </div>

        <div class="card">
            <div class="card-content">

                {!! Form::model($imageFlaw, ['route' => ['image-flaw.update', $imageFlaw->id], 'method' => 'PATCH']) !!}
                @include('master-data.image-flaws._form')
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