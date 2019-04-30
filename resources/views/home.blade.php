@extends('layouts.training')

@section('content')
    <div class="flex-container">

        {{--<nav class="breadcrumb has-arrow-separator" aria-label="breadcrumbs">--}}
            {{--<ul>--}}
                {{--<li class="is-active"><a href="#" aria-current="page">Home</a></li>--}}
            {{--</ul>--}}
        {{--</nav>--}}


        <nav class="level daily-evaluation-dashboard" style="background-color: hsl(171, 100%, 41%)">
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">Total Projects</p>
                    <p class="title">{{ $projects }}</p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">Total Received Head Count</p>
                    <p class="title">{{ $hc }}</p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">Total Shortfall</p>
                    <p class="title">{{ $totalShortfall }}</p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">Total HR Attrition</p>
                    <p class="title">{{ $hr }}</p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">Total Training Attrition</p>
                    <p class="title">{{ $tr }}</p>
                </div>
            </div>
        </nav>

{{--in training summary--}}

        <div class="columns">
            <div class="column is-half-desktop">
                <div class="is-divider" data-content="In-Training"></div>

                {{--<nav class="level daily-evaluation-dashboard" style="background-color: hsl(171, 100%, 41%)">--}}
                    {{--<div class="level-item has-text-centered">--}}
                        {{--<div>--}}
                            {{--<p class="heading">Total Projects</p>--}}
                            {{--<p class="title">{{ $projects }}</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="level-item has-text-centered">--}}
                        {{--<div>--}}
                            {{--<p class="heading">Total Received Head Count</p>--}}
                            {{--<p class="title">{{ $hc }}</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="level-item has-text-centered">--}}
                        {{--<div>--}}
                            {{--<p class="heading">Total Attrition</p>--}}
                            {{--<p class="title">{{ $tr+$hr }}</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                {{--</nav>--}}

                <div class="card">
                    <div class="card-content">

                        <table class="table is-bordered is-narrow is-fullwidth is-hoverable">
                            <thead>
                            <th></th>
                            <th>GSSC</th>
                            <th>GSSK</th>
                            <th>IGS</th>
                            <th>Total</th>
                            </thead>

                            <tbody>
                                <tr>
                                    <th>NRT</th>
                                    <td class="has-text-right">{{ $gsscNrt }}</td>
                                    <td class="has-text-right">{{ $gsskNrt }}</td>
                                    <td class="has-text-right">{{ $igsNrt }}</td>
                                    <th class="has-text-centered"  style="background-color: #EEEFF3">{{ $gsscNrt+$gsskNrt+$igsNrt }}</th>
                                </tr>
                                <tr>
                                    <th>CRT</th>
                                    <td class="has-text-right">{{ $gsscCrt }}</td>
                                    <td class="has-text-right">{{ $gsskCrt }}</td>
                                    <td class="has-text-right">{{ $igsCrt }}</td>
                                    <th class="has-text-centered"  style="background-color: #EEEFF3">{{ $gsscCrt+$gsskCrt+$igsCrt }}</th>
                                </tr>
                            </tbody>

                            <thead style="background-color: #EEEFF3">
                            <th>Total</th>
                            <th class="has-text-centered" style="background-color: #EEEFF3">{{ $gsscNrt + $gsscCrt }}</th>
                            <th class="has-text-centered" style="background-color: #EEEFF3">{{ $gsskNrt + $gsskCrt }}</th>
                            <th class="has-text-centered" style="background-color: #EEEFF3">{{ $igsNrt + $igsCrt }}</th>
                            <th class="has-text-centered" style="background-color: #dbdcdd">{{ $gsscNrt + $gsscCrt + $gsskNrt + $gsskCrt + $igsNrt + $igsCrt }}</th>
                            </thead>
                        </table>

                    </div>
                </div>
            </div>
            <div class="column is-half-desktop">
                <div class="is-divider" data-content="Attrition"></div>

                <div class="card">
                    <div class="card-content">

                        <table class="table is-bordered is-narrow is-fullwidth is-hoverable">
                            <thead>
                            <th></th>
                            <th>GSSC</th>
                            <th>GSSK</th>
                            <th>IGS</th>
                            <th>Total</th>
                            </thead>

                            <tbody>
                            <tr>
                                <th>NRT</th>
                                <td class="has-text-right">{{ $gsscNrtAtr }}</td>
                                <td class="has-text-right">{{ $gsskNrtAtr }}</td>
                                <td class="has-text-right">{{ $igsNrtAtr }}</td>
                                <th class="has-text-centered"  style="background-color: #EEEFF3">{{ $gsscNrtAtr + $gsskNrtAtr + $igsNrtAtr }}</th>
                            </tr>
                            <tr>
                                <th>CRT</th>
                                <td class="has-text-right">{{ $gsscCrtAtr }}</td>
                                <td class="has-text-right">{{ $gsskCrtTrAtr }}</td>
                                <td class="has-text-right">{{ $igsCrtAtr }}</td>
                                <th class="has-text-centered"  style="background-color: #EEEFF3">{{ $gsscCrtAtr + $gsskCrtTrAtr + $igsCrtAtr }}</th>
                            </tr>
                            </tbody>

                            <thead style="background-color: #EEEFF3">
                            <th>Total</th>
                            <th class="has-text-centered" style="background-color: #EEEFF3">{{ $gsscNrtAtr + $gsscCrtAtr }}</th>
                            <th class="has-text-centered" style="background-color: #EEEFF3">{{ $gsskNrtAtr + $gsskCrtTrAtr }}</th>
                            <th class="has-text-centered" style="background-color: #EEEFF3">{{ $igsNrtAtr + $igsCrtAtr }}</th>
                            <th class="has-text-centered" style="background-color: #dbdcdd">{{ $gsscNrtAtr + $gsskNrtAtr + $igsNrtAtr + $gsscCrtAtr + $gsskCrtTrAtr + $igsCrtAtr }}</th>
                            </thead>
                        </table>
                    </div>
                </div>


            </div>
        </div>

{{--training overview--}}
        <div class="is-divider" data-content="In-Training Overview"></div>




        <div class="card">
            <div class="card-content">

                <!-- Main container -->
                {{--<nav class="level">--}}
                {{--<!-- Left side -->--}}
                {{--<div class="level-left">--}}
                {{--<div class="level-item">--}}

                {{--{!! Form::open(['method' => 'GET', 'url' => '/master-data/country', 'role'=>'search']) !!}--}}

                {{--<div class="field has-addons">--}}
                {{--<p class="subtitle m-r-10"><strong>From :</strong></p>--}}
                {{--<p class="control">--}}
                {{--<input class="input" name="country" type="date" placeholder="Find by country">--}}
                {{--</p>--}}
                {{--<p class="subtitle m-l-10 m-r-10"><strong>To :</strong></p>--}}
                {{--<p class="control">--}}
                {{--<input class="input" name="region" type="date" placeholder="Find by region">--}}
                {{--</p>--}}

                {{--<p class="control m-l-10">--}}
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
                        <th></th>
                        <th colspan="3" class="has-text-centered">NRT</th>
                        <th colspan="3" class="has-text-centered">CRT</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>

                    <thead>
                    <tr>
                        <th class="has-text-centered">Project</th>
                        <th class="has-text-centered">GSSC</th>
                        <th class="has-text-centered">GSSK</th>
                        <th class="has-text-centered">IGS</th>
                        <th class="has-text-centered">GSSC</th>
                        <th class="has-text-centered">GSSK</th>
                        <th class="has-text-centered">IGS</th>
                        <th class="has-text-centered"  style="background-color: #EEEFF3">Total QATs</th>
                        <th class="has-text-centered" style="background-color: #EEEFF3">QAT Shortfall</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach ($data as $value)
                        <tr>
                            <td class="has-text-centered">{{$value['project_name']}}</td>
                            <td class="has-text-right">{{ $a = $value['gssc_nrt'][0]['received_head_count'] - $value['gssc_nrt'][0]['hr_attrition_count'] - $value['gssc_nrt'][0]['training_attrition_count'] }}</td>
                            <td class="has-text-right">{{ $b= $value['gssk_nrt'][0]['received_head_count'] - $value['gssk_nrt'][0]['hr_attrition_count'] - $value['gssk_nrt'][0]['training_attrition_count'] }}</td>
                            <td class="has-text-right">{{ $c= $value['igs_nrt'][0]['received_head_count'] - $value['igs_nrt'][0]['hr_attrition_count'] - $value['igs_nrt'][0]['training_attrition_count'] }}</td>
                            <td class="has-text-right">{{ $d= $value['gssc_crt'][0]['received_head_count'] - $value['gssc_crt'][0]['hr_attrition_count'] - $value['gssc_crt'][0]['training_attrition_count'] }}</td>
                            <td class="has-text-right">{{ $e= $value['gssk_crt'][0]['received_head_count'] - $value['gssk_crt'][0]['hr_attrition_count'] - $value['gssk_crt'][0]['training_attrition_count'] }}</td>
                            <td class="has-text-right">{{ $f= $value['igs_crt'][0]['received_head_count'] - $value['igs_crt'][0]['hr_attrition_count'] - $value['igs_crt'][0]['training_attrition_count'] }}</td>
                            <th class="has-text-right" style="background-color: #EEEFF3">
                                {{ $a+$b+$c+$d+$e+$f }}
                            </th>
                            <th class="has-text-centered" style="background-color: #EEEFF3">{{$value['total_shortfall']}}</th>
                        </tr>
                    @endforeach

                    </tbody>

                    <thead style="background-color: #EEEFF3">
                    <th class="has-text-centered">Total QATs</th>
                    <th class="has-text-centered">{{ $gsscNrt }}</th>
                    <th class="has-text-centered">{{ $gsskNrt }}</th>
                    <th class="has-text-centered">{{ $igsNrt }}</th>
                    <th class="has-text-centered">{{ $gsscCrt }}</th>
                    <th class="has-text-centered">{{ $gsskCrt }}</th>
                    <th class="has-text-centered">{{ $igsCrt }}</th>
                    <th class="has-text-centered" style="background-color: #dbdcdd">{{ $gsscNrt + $gsscCrt + $gsskNrt + $gsskCrt + $igsNrt + $igsCrt }}</th>
                    <th class="has-text-centered" style="background-color: #dbdcdd">{{ $totalShortfall }}</th>
                    </thead>

                </table>

            </div>
        </div>


    </div>
@endsection

@section('scripts')

@endsection

