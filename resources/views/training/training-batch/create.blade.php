@extends('layouts.training')

@section('content')
    <div class="flex-container">

        <nav class="breadcrumb has-arrow-separator" aria-label="breadcrumbs">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('training-dashboard') }}">Training</a></li>
                <li><a href="{{ route('training-batch.index') }}">Training Batches</a></li>
                <li class="is-active"><a href="#" aria-current="page">Add Training Batch</a></li>
            </ul>
        </nav>

        <div class="columns">
            <div class="column">

                <h1 class="title">
                    Add New Training Batch
                </h1>
            </div>

        </div>

        <div class="card">
            <div class="card-content">

                {!! Form::open(['route' => 'training-batch.store']) !!}
                @include('training.training-batch._form')
                {!! Form::close() !!}

            </div>
        </div>



    </div>
@endsection

@section('scripts')
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}
    <script>
        $(document).ready(function () {

            $(document).on('change', '#training_batch_type_id', function () {

                var batch_type_id = $(this).val();

                $.ajax({

                    type: 'get',
                    url: '{!! URL::to('master-data/ajax-training-nature') !!}',
                    data: {'id': batch_type_id},
                    success: function (nature_data) {

                        $htmloption = [];

                        for(var i =0; i<nature_data.length; i++){

                            $htmloption[i] = '<option value=" '+nature_data[i].id+' "> '+nature_data[i].name+' </option>';
                            $('#nature').html($htmloption);

                        }
                    },
                    error:function () {

                    }

                });
            });
        });
    </script>
@endsection