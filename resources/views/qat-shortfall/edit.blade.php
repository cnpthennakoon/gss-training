@extends('layouts.shortfall')

@section('content')
    <div class="flex-container">

        <nav class="breadcrumb has-arrow-separator" aria-label="breadcrumbs">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('qat-shortfall.index') }}">QAT Shortfall</a></li>
                <li class="is-active"><a href="#" aria-current="page">Edit Shortfall Data</a></li>
            </ul>
        </nav>

        <div class="columns">
            <div class="column">

                <h1 class="title">
                    Edit Shortfall Data - {{ $qatShortfall->project->name }}
                </h1>
            </div>

        </div>

        <div class="card">
            <div class="card-content">

                {!! Form::model($qatShortfall, ['route' => ['qat-shortfall.update', $qatShortfall->id], 'method' => 'PATCH']) !!}
                @include('qat-shortfall._edit-form')
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