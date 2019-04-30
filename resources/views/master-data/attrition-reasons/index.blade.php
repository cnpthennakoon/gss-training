@extends('layouts.master-data')

@section('content')
    <div class="flex-container">

        <nav class="breadcrumb has-arrow-separator" aria-label="breadcrumbs">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('master-data') }}">Master Data</a></li>
                <li class="is-active"><a href="#" aria-current="page">Attrition Reasons</a></li>
            </ul>
        </nav>

        <div class="columns">
            <div class="column">

                <h1 class="title">
                    Attrition Reasons
                </h1>
            </div>
            <div class="column">
                <a href="{{ route('attrition-reason.create') }}" class="button is-primary is-outlined is-pulled-right m-r-10">Add New Attrition Reason</a>
            </div>
        </div>

        <div class="card">
            <div class="card-content">

                <table class="table is-bordered is-narrow is-fullwidth is-hoverable">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Created at</th>
                        <th>Last Updated at</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($attritionReasons as $attritionReason)
                        <tr>
                            <td>{{ $attritionReason->name }}</td>
                            <td>
                                @if($attritionReason->created_at)
                                    {{ $attritionReason->created_at->toDateString() }}
                                @endif
                            </td>
                            <td>
                                @if($attritionReason->updated_at)
                                    {{ $attritionReason->updated_at->toDateString() }}
                                @endif
                            </td>

                            <td class="has-text-centered">
                                {{--                                <a class="button is-outlined is-small is-half" href="{{ route('region.show', $country->id) }}">View</a>--}}
                                <a class="button is-outlined is-small is-half" href="{{ route('attrition-reason.edit', $attritionReason->id) }}">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>

                <div class="text-center">
                    {!! $attritionReasons->links('vendor.pagination.bulma') !!}
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