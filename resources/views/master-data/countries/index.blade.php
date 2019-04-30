@extends('layouts.master-data')

@section('content')
    <div class="flex-container">

        <nav class="breadcrumb has-arrow-separator" aria-label="breadcrumbs">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('master-data') }}">Master Data</a></li>
                <li class="is-active"><a href="#" aria-current="page">Countries</a></li>
            </ul>
        </nav>

        <div class="columns">
            <div class="column">

                <h1 class="title">
                    Countries
                </h1>
            </div>
            <div class="column">
            <a href="{{ route('country.create') }}" class="button is-primary is-outlined is-pulled-right m-r-10">Add New Country</a>
            </div>
        </div>

        <div class="card">
            <div class="card-content">


                <!-- Main container -->
                <nav class="level">
                    <!-- Left side -->
                    <div class="level-left">
                        <div class="level-item">
                            {!! Form::open(['method' => 'GET', 'url' => '/master-data/country', 'role'=>'search']) !!}
                                <div class="field has-addons">
                                    <p class="control">
                                        <input class="input" name="country" type="text" placeholder="Find by country">
                                    </p>
                                    <p class="control">
                                        <input class="input" name="region" type="text" placeholder="Find by region">
                                    </p>
                                    <p class="control">
                                        <button class="button">
                                            Search
                                        </button>
                                    </p>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>

                </nav>


                <table class="table is-bordered is-narrow is-fullwidth is-hoverable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>slug</th>
                            <th>Region</th>
                            <th>Added By</th>
                            <th>Created at</th>
                            <th>Last Updated at</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach($countries as $country)
                        <tr>
                            <td>{{ $country->name }}</td>
                            <td><span class="tag is-info">{{ $country->slug }}</span></td>
                            <td>{{ $country->region->name }}</td>
                            <td>{{ $country->user->name }} <small>( {{ $country->user->email }} )</small></td>

                            <td>
                                @if($country->created_at)
                                    {{ $country->created_at->toDateString() }}
                                @endif
                            </td>
                            <td>
                                @if($country->updated_at)
                                {{ $country->updated_at->toDateString() }}
                                @endif
                            </td>

                            <td class="has-text-centered">
{{--                                <a class="button is-outlined is-small is-half" href="{{ route('country.show', $country->id) }}">View</a>--}}
                                <a class="button is-outlined is-small is-half" href="{{ route('country.edit', $country->id) }}">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>

                <div class="text-center">
                    {!! $countries->links('vendor.pagination.bulma') !!}
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