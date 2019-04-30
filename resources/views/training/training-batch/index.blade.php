@extends('layouts.training')

@section('content')
    <div class="flex-container">

        <nav class="breadcrumb has-arrow-separator" aria-label="breadcrumbs">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('training-dashboard') }}">Training</a></li>
                <li class="is-active"><a href="#" aria-current="page">Training Batches</a></li>
            </ul>
        </nav>

        <div class="columns">
            <div class="column">

                <h1 class="title">
                    Training Batches
                </h1>
            </div>
            <div class="column">
                <a href="{{ route('training-batch.create') }}" class="button is-primary is-outlined is-pulled-right m-r-10">Add New Training Batch</a>
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
                        <th>Project</th>
                        <th>Training Center</th>
                        <th>Start Date</th>
                        <th>Live Date</th>
                        <th>Batch Status</th>
                        <th>Added By</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($trainingBatches as $trainingBatch)
                        <tr>
                            <td>{{ $trainingBatch->project->name }}</td>

                            <td>{{ $trainingBatch->trainingCenter->name}}</td>
                            <td>{{ $trainingBatch->start_date}}</td>
                            <td>{{ $trainingBatch->live_date}}</td>

                            <td><span class="tag is-info">{{ $trainingBatch->trainingBatchStatus->name}}</span></td>

                            <td><small>{{ $trainingBatch->user->email}}</small></td>


                            <td>
                                @if($trainingBatch->created_at)
                                    {{ $trainingBatch->created_at->toDateString() }}
                                @endif
                            </td>
                            <td class="has-text-centered">
                                <a class="button is-outlined is-small is-half" href="{{ route('training-batch.show', $trainingBatch->id) }}">View</a>
                                <a class="button is-outlined is-small is-half" href="{{ route('training-batch.edit', $trainingBatch->id) }}">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>

                <div class="text-center">
                    {!! $trainingBatches->links('vendor.pagination.bulma') !!}
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