@extends('layouts.daily-evaluations')

@section('content')
    <div class="flex-container">

        <nav class="breadcrumb has-arrow-separator" aria-label="breadcrumbs">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('daily-evaluations') }}">Daily Evaluations</a></li>
                <li class="is-active"><a href="#" aria-current="page">New Audits</a></li>
            </ul>
        </nav>

        <div class="columns">
            <div class="column">

                <h1 class="title">
                    New Audits
                </h1>
            </div>
        </div>
        @if(count($audits) > 0)
        <div class="columns is-multiline">



            @foreach($audits as $audit)

                <div class="column is-one-quarter">
                    <div class="card">

                        <header class="card-header">
                            <p class="card-header-title">
                                {{ $audit->project->name }}
                            </p>

                            <a href="#" class="card-header-icon" aria-label="more options">
                                <span class="icon">
                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </span>
                            </a>
                        </header>

                        <div class="card-content">
                            <div class="content">
                                Auditor Name: {{ $audit->user->name }}<br>
                                Auditor Email: {{ $audit->user->email}}<br>
                                Audit Date: {{ $audit->project->created_at->toDateString() }}
                            </div>
                        </div>

                        <footer class="card-footer">
                            {{--<a href="#" class="card-footer-item">Submit</a>--}}
                            <a href="{{ route('audits.show', $audit->id) }}" class="card-footer-item">View to Submit</a>
                            <a href="#" class="card-footer-item">Delete</a>
                        </footer>
                    </div>
                </div>

            @endforeach


        </div>
        @else

            <div class="card is-fullwidth p-t-100 p-l-50 p-b-100">
                <p class="title is-centered">Sorry, all daily audits are submitted!!</p>
            </div>

        @endif
        {{--<div class="card">--}}
            {{--<div class="card-content">--}}



                {{--<table class="table is-bordered is-narrow is-fullwidth is-hoverable">--}}
                    {{--<thead>--}}
                    {{--<tr>--}}
                        {{--<th>Name</th>--}}
                        {{--<th>slug</th>--}}
                        {{--<th>Region</th>--}}
                        {{--<th>Added By</th>--}}
                        {{--<th>Created at</th>--}}
                        {{--<th>Last Updated at</th>--}}
                        {{--<th>Action</th>--}}
                    {{--</tr>--}}
                    {{--</thead>--}}

                    {{--<tbody>--}}
                    {{--@foreach($countries as $country)--}}
                        {{--<tr>--}}
                            {{--<td>{{ $country->name }}</td>--}}
                            {{--<td><span class="tag is-info">{{ $country->slug }}</span></td>--}}
                            {{--<td>{{ $country->region->name }}</td>--}}
                            {{--<td>{{ $country->user->name }} <small>( {{ $country->user->email }} )</small></td>--}}

                            {{--<td>--}}
                                {{--@if($country->created_at)--}}
                                    {{--{{ $country->created_at->toDateString() }}--}}
                                {{--@endif--}}
                            {{--</td>--}}
                            {{--<td>--}}
                                {{--@if($country->updated_at)--}}
                                    {{--{{ $country->updated_at->toDateString() }}--}}
                                {{--@endif--}}
                            {{--</td>--}}

                            {{--<td class="has-text-centered">--}}
                                {{--                                <a class="button is-outlined is-small is-half" href="{{ route('country.show', $country->id) }}">View</a>--}}
                                {{--<a class="button is-outlined is-small is-half" href="{{ route('country.edit', $country->id) }}">Edit</a>--}}
                            {{--</td>--}}
                        {{--</tr>--}}
                    {{--@endforeach--}}
                    {{--</tbody>--}}

                {{--</table>--}}


            {{--</div>--}}
        {{--</div>--}}



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