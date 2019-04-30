@extends('layouts.master-data')

@section('content')
    <div class="flex-container">

        <nav class="breadcrumb has-arrow-separator" aria-label="breadcrumbs">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="is-active"><a href="#" aria-current="page">Master Data</a></li>
            </ul>
        </nav>

        <div class="columns">
            <div class="column">

                <h1 class="title">
                    Master Data
                </h1>
            </div>

            {{--<div class="column">--}}
            {{--<a href="#" class="button is-primary is-outlined is-pulled-right m-r-10">Add New User</a>--}}
            {{--</div>--}}

        </div>

        <nav class="level daily-evaluation-dashboard">
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">Total Regions</p>
                    <p class="title">{{ $regions }}</p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">Total Countries</p>
                    <p class="title">{{ $countries }}</p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">Total Manufacturers</p>
                    <p class="title">{{ $manufacturers }}</p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">Total Active Projects</p>
                    <p class="title">{{ $projects }}</p>
                </div>
            </div>

            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">Total Training Centers</p>
                    <p class="title">{{ $trainingCenters }}</p>
                </div>
            </div>

        </nav>

        <div class="columns is-multiline m-t-20">

                <div class="column is-one-quarter">
                    <div class="card">

                        <header class="card-header">
                            <p class="card-header-title">
                                Regions
                            </p>
                        </header>


                        <footer class="card-footer">
                            <a href="{{ route('region.index') }}" class="card-footer-item">Add / View / Edit</a>
                        </footer>
                    </div>
                </div>

                <div class="column is-one-quarter">
                    <div class="card">

                        <header class="card-header">
                            <p class="card-header-title">
                                Countries
                            </p>
                        </header>


                        <footer class="card-footer">
                            <a href="{{ route('country.index') }}" class="card-footer-item">Add / View / Edit</a>
                        </footer>
                    </div>
                </div>

                <div class="column is-one-quarter">
                    <div class="card">

                        <header class="card-header">
                            <p class="card-header-title">
                                Global Projects
                            </p>
                        </header>


                        <footer class="card-footer">
                            <a href="{{ route('global-project.index') }}" class="card-footer-item">Add / View / Edit</a>
                        </footer>
                    </div>
                </div>

                <div class="column is-one-quarter">
                    <div class="card">

                        <header class="card-header">
                            <p class="card-header-title">
                                Projects
                            </p>
                        </header>


                        <footer class="card-footer">
                            <a href="{{ route('project.index') }}" class="card-footer-item">Add / View / Edit</a>
                        </footer>
                    </div>
                </div>

                <div class="column is-one-quarter">
                    <div class="card">

                        <header class="card-header">
                            <p class="card-header-title">
                                Manufacturers
                            </p>
                        </header>


                        <footer class="card-footer">
                            <a href="{{ route('manufacturer.index') }}" class="card-footer-item">Add / View / Edit</a>
                        </footer>
                    </div>
                </div>

                <div class="column is-one-quarter">
                    <div class="card">

                        <header class="card-header">
                            <p class="card-header-title">
                                Training Project Status
                            </p>
                        </header>


                        <footer class="card-footer">
                            <a href="{{ route('training-project-status.index') }}" class="card-footer-item">Add / View / Edit</a>
                        </footer>
                    </div>
                </div>

                <div class="column is-one-quarter">
                    <div class="card">

                        <header class="card-header">
                            <p class="card-header-title">
                                Training Centers
                            </p>
                        </header>


                        <footer class="card-footer">
                            <a href="{{ route('training-center.index') }}" class="card-footer-item">Add / View / Edit</a>
                        </footer>
                    </div>
                </div>

                <div class="column is-one-quarter">
                    <div class="card">

                        <header class="card-header">
                            <p class="card-header-title">
                                Training Batch Status
                            </p>
                        </header>


                        <footer class="card-footer">
                            <a href="{{ route('training-batch-status.index') }}" class="card-footer-item">Add / View / Edit</a>
                        </footer>
                    </div>
                </div>

                <div class="column is-one-quarter">
                    <div class="card">

                        <header class="card-header">
                            <p class="card-header-title">
                                Training Batch Type
                            </p>
                        </header>


                        <footer class="card-footer">
                            <a href="{{ route('training-batch-type.index') }}" class="card-footer-item">VAdd / View / Edit</a>
                        </footer>
                    </div>
                </div>

                <div class="column is-one-quarter">
                    <div class="card">

                        <header class="card-header">
                            <p class="card-header-title">
                                Training Nature
                            </p>
                        </header>


                        <footer class="card-footer">
                            <a href="{{ route('training-nature.index') }}" class="card-footer-item">VAdd / View / Edit</a>
                        </footer>
                    </div>
                </div>

                <div class="column is-one-quarter">
                    <div class="card">

                        <header class="card-header">
                            <p class="card-header-title">
                                Attrition Types
                            </p>
                        </header>


                        <footer class="card-footer">
                            <a href="{{ route('attrition-type.index') }}" class="card-footer-item">VAdd / View / Edit</a>
                        </footer>
                    </div>
                </div>
                <div class="column is-one-quarter">
                    <div class="card">

                        <header class="card-header">
                            <p class="card-header-title">
                                Attrition Reasons
                            </p>
                        </header>


                        <footer class="card-footer">
                            <a href="{{ route('attrition-reason.index') }}" class="card-footer-item">VAdd / View / Edit</a>
                        </footer>
                    </div>
                </div>


        </div>

    </div>
@endsection