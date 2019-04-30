@extends('layouts.attrition')

@section('content')
    <div class="flex-container">

        <nav class="breadcrumb has-arrow-separator" aria-label="breadcrumbs">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('attrition.index') }}">QAT Attrition</a></li>
                <li class="is-active"><a href="#" aria-current="page">Add New Attrition</a></li>
            </ul>
        </nav>

        <div class="columns">
            <div class="column">

                <h1 class="title">
                    Add New Attrition
                </h1>
            </div>

        </div>

        <div class="card">
            <div class="card-content">

                {!! Form::open(['route' => 'attrition.store']) !!}
                @include('attrition._form')
                {!! Form::close() !!}

            </div>
        </div>



    </div>
@endsection

@section('scripts')

    <script>
        $(document).ready(function () {

            $(document).on('change', '#training_center_id', function () {

                var center_id = $(this).val();

                $.ajax({

                    type: 'get',
                    url: '{!! URL::to('ajax-training-batches') !!}',
                    data: {'id': center_id},
                    success: function (training_batch_data) {

                        $htmloption = [];

                        for(var i =0; i<training_batch_data.length; i++){

                            $htmloption[i] = '<option value=" '+training_batch_data[i].id+' "> '+training_batch_data[i].slug+', '+training_batch_data[i].received_head_count+', '+training_batch_data[i].start_date+' </option>';
                            $('#training_batch').html($htmloption);

                        }
                    },
                    error:function () {

                    }

                });
            });
        });
    </script>

@endsection