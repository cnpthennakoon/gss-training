@extends('layouts.attrition')

@section('content')
    <div class="flex-container">

        <nav class="breadcrumb has-arrow-separator" aria-label="breadcrumbs">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('attrition.index') }}">QAT Attrition</a></li>
                <li class="is-active"><a href="#" aria-current="page">Edit QAT Attrition</a></li>
            </ul>
        </nav>

        <div class="columns">
            <div class="column">

                <h1 class="title">
                    Edit QAT Attrition
                </h1>
            </div>

        </div>

        <div class="card">
            <div class="card-content">

                {!! Form::model($attrition, ['route' => ['attrition.update', $attrition->id], 'method' => 'PATCH']) !!}
                @include('attrition._edit-form')
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