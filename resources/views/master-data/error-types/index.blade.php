@extends('layouts.master-data')

@section('content')
    <div class="flex-container">

        <nav class="breadcrumb has-arrow-separator" aria-label="breadcrumbs">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('master-data') }}">Master Data</a></li>
                <li class="is-active"><a href="#" aria-current="page">Error Types</a></li>
            </ul>
        </nav>

        <div class="columns">
            <div class="column">

                <h1 class="title">
                    Error Types
                </h1>
            </div>
            <div class="column">
                <a href="{{ route('error-type.create') }}" class="button is-primary is-outlined is-pulled-right m-r-10">Add new Error Type</a>
            </div>
        </div>

        <div class="card">
            <div class="card-content">

                <table class="table is-bordered is-narrow is-fullwidth is-hoverable">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>SLUG</th>
                        <th>Created at</th>
                        <th>Last Updated at</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($errorTypes as $errorType)
                        <tr>
                            <td>{{ $errorType->name }}</td>
                            <td><span class="tag is-info">{{ $errorType->slug }}</span></td>
                            <td>
                                @if($errorType->created_at)
                                    {{ $errorType->created_at->toDateString() }}
                                @endif
                            </td>
                            <td>
                                @if($errorType->updated_at)
                                    {{ $errorType->updated_at->toDateString() }}
                                @endif
                            </td>

                            <td class="has-text-centered">
                                {{--                                <a class="button is-outlined is-small is-half" href="{{ route('region.show', $country->id) }}">View</a>--}}
                                <a class="button is-outlined is-small is-half" href="{{ route('error-type.edit', $errorType->id) }}">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>

                <div class="text-center">
                    {!! $errorTypes->links('vendor.pagination.bulma') !!}
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