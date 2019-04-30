@extends('layouts.shortfall')

@section('content')
    <div class="flex-container">

        <nav class="breadcrumb has-arrow-separator" aria-label="breadcrumbs">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="is-active"><a href="#" aria-current="page">QAT Shortfall</a></li>
            </ul>
        </nav>

        <div class="columns">
            <div class="column">

                <h1 class="title">
                    QAT Shortfall
                </h1>
            </div>
            <div class="column">
                <a href="{{ route('qat-shortfall.create') }}" class="button is-primary is-outlined is-pulled-right m-r-10">Add QAT Shortfall Project</a>
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
                        <th>Updated at</th>
                        <th>GSSC Shortfall</th>
                        <th>GSSK Shortfall</th>
                        <th>IGS Shortfall</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($shortfalls as $shortfall)
                        <tr>
                            <td>{{ $shortfall->project->name }}</td>
                            <td>
                                @if($shortfall->updated_at)
                                    {{ $shortfall->updated_at->toDateString() }}
                                @endif
                            </td>
                            <td>{{ $shortfall->gssc_shortfall}}</td>
                            <td>{{ $shortfall->gssk_shortfall}}</td>
                            <td>{{ $shortfall->igs_shortfall}}</td>


                            <td class="has-text-centered">
{{--                                <a class="button is-outlined is-small is-half" href="{{ route('qat-shortfall.show', $shortfall->id) }}">View</a>--}}
                                <a class="button is-outlined is-small is-half" href="{{ route('qat-shortfall.edit', $shortfall->id) }}">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>

                <div class="text-center">
                    {!! $shortfalls->links('vendor.pagination.bulma') !!}
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