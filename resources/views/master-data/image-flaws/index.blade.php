@extends('layouts.master-data')

@section('content')
    <div class="flex-container">

        <nav class="breadcrumb has-arrow-separator" aria-label="breadcrumbs">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('master-data') }}">Master Data</a></li>
                <li class="is-active"><a href="#" aria-current="page">Image Flaws</a></li>
            </ul>
        </nav>

        <div class="columns">
            <div class="column">

                <h1 class="title">
                    Image Flaws
                </h1>
            </div>
            <div class="column">
                <a href="{{ route('image-flaw.create') }}" class="button is-primary is-outlined is-pulled-right m-r-10">Add new Image Flaw</a>
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
                    @foreach($imageFlaws as $imageFlaw)
                        <tr>
                            <td>{{ $imageFlaw->name }}</td>
                            <td><span class="tag is-info">{{ $imageFlaw->slug }}</span></td>
                            <td>
                                @if($imageFlaw->created_at)
                                    {{ $imageFlaw->created_at->toDateString() }}
                                @endif
                            </td>
                            <td>
                                @if($imageFlaw->updated_at)
                                    {{ $imageFlaw->updated_at->toDateString() }}
                                @endif
                            </td>

                            <td class="has-text-centered">
                                {{--                                <a class="button is-outlined is-small is-half" href="{{ route('region.show', $country->id) }}">View</a>--}}
                                <a class="button is-outlined is-small is-half" href="{{ route('image-flaw.edit', $imageFlaw->id) }}">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>

                <div class="text-center">
                    {!! $imageFlaws->links('vendor.pagination.bulma') !!}
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