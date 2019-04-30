@extends('layouts.master-data')

@section('content')
    <div class="flex-container">

        <nav class="breadcrumb has-arrow-separator" aria-label="breadcrumbs">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('master-data') }}">Master Data</a></li>
                <li class="is-active"><a href="#" aria-current="page">Training Nature</a></li>
            </ul>
        </nav>

        <div class="columns">
            <div class="column">

                <h1 class="title">
                    Training Nature
                </h1>
            </div>
            <div class="column">
                <a href="{{ route('training-nature.create') }}" class="button is-primary is-outlined is-pulled-right m-r-10">Add New Training Nature</a>
            </div>
        </div>

        <div class="card">
            <div class="card-content">

                <table class="table is-bordered is-narrow is-fullwidth is-hoverable">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Training Batch Type</th>
                        <th>Created at</th>
                        <th>Last Updated at</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($trainingNatures as $trainingNature)
                        <tr>
                            <td>{{ $trainingNature->name }}</td>
                            <td>
                                {{ $trainingNature->trainingBatchType->name }}
                            </td>
                            <td>
                                @if($trainingNature->created_at)
                                    {{ $trainingNature->created_at->toDateString() }}
                                @endif
                            </td>
                            <td>
                                @if($trainingNature->updated_at)
                                    {{ $trainingNature->updated_at->toDateString() }}
                                @endif
                            </td>

                            <td class="has-text-centered">
                                {{--                                <a class="button is-outlined is-small is-half" href="{{ route('region.show', $country->id) }}">View</a>--}}
                                <a class="button is-outlined is-small is-half" href="{{ route('training-nature.edit', $trainingNature->id) }}">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>

                <div class="text-center">
                    {!! $trainingNatures->links('vendor.pagination.bulma') !!}
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