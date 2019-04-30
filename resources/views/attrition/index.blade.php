@extends('layouts.attrition')

@section('content')
    <div class="flex-container">

        <nav class="breadcrumb has-arrow-separator" aria-label="breadcrumbs">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="is-active"><a href="#" aria-current="page">QAT Attrition</a></li>
            </ul>
        </nav>

        <div class="columns">
            <div class="column">

                <h1 class="title">
                    QAT Attrition
                </h1>
            </div>
            <div class="column">
                <a href="{{ route('attrition.create') }}" class="button is-primary is-outlined is-pulled-right m-r-10">Add QAT Attrition Data</a>
            </div>
        </div>

        <div class="card">
            <div class="card-content">


                {{--<!-- Main container -->--}}
                {{--<nav class="level">--}}
                {{--<!-- Left side -->--}}
                {{--<div class="level-left">--}}
                {{--<div class="level-item">--}}
                {{--{!! Form::open(['method' => 'GET', 'url' => 'training/training-batch', 'role'=>'search']) !!}--}}
                {{--<div class="field has-addons">--}}
                {{--<p class="control">--}}
                {{--<input class="input" name="country" type="text" placeholder="Find by country">--}}
                {{--</p>--}}
                {{--<p class="control">--}}
                {{--<input class="input" name="region" type="text" placeholder="Find by region">--}}
                {{--</p>--}}
                {{--<p class="control">--}}
                {{--<button class="button">--}}
                {{--Search--}}
                {{--</button>--}}
                {{--</p>--}}
                {{--</div>--}}
                {{--{!! Form::close() !!}--}}
                {{--</div>--}}
                {{--</div>--}}

                {{--</nav>--}}


                <table class="table is-bordered is-narrow is-fullwidth is-hoverable">
                    <thead>
                    <tr>
                        <th>QAT ID</th>
                        <th>Training Center</th>
                        <th>Project</th>
                        <th>Training Started at</th>
                        <th>Last Working Date</th>
                        <th>Attrition Type</th>
                        <th>Reason for Attrition</th>
                        <th>Comment</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($attrition as $data)
                        <tr>
                            <td>{{ $data->qat_id }}</td>
                            <td>{{ $data->trainingBatch->trainingCenter->name }}</td>
                            <td>{{ $data->trainingBatch->project->name }}</td>
                            <td>{{ $data->trainingBatch->start_date }}</td>
                            <td>{{ $data->last_working_date }}</td>
                            <td>{{ $data->attritionType->name }}</td>
                            <td>{{ $data->attritionReason->name }}</td>
                            <td><small>{{ $data->comment }}</small></td>

                            <td class="has-text-centered">
                                {{--<a class="button is-outlined is-small is-half" href="{{ route('qat-shortfall.show', $data->id) }}">View</a>--}}
                                <a class="button is-outlined is-small is-half" href="{{ route('attrition.edit', $data->id) }}">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>

                <div class="text-center">
                    {!! $attrition->links('vendor.pagination.bulma') !!}
                </div>

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