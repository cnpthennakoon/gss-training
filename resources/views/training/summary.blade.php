@extends('layouts.training')

@section('content')
    <div class="flex-container">

        <nav class="breadcrumb has-arrow-separator" aria-label="breadcrumbs">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="is-active"><a href="#" aria-current="page">Training Summary</a></li>
            </ul>
        </nav>

        <div class="columns">
            <div class="column">

                <h1 class="title">
                    Training Center Summary (In-Training)
                </h1>
            </div>


        </div>

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

                <div class="is-divider" data-content="In-Training Center Summary"></div>

                <?php
                    $gssc_nrt_total = 0;
                    $gssk_nrt_total = 0;
                    $igs_nrt_total = 0;
                    $gssc_crt_total = 0;
                    $gssk_crt_total = 0;
                    $igs_crt_total = 0;
                    $total = 0;
                    ?>

                <table class="table is-bordered is-narrow is-fullwidth is-hoverable">
                    <thead>
                        <tr>
                            <th></th>
                            <th colspan="3" class="has-text-centered">NRT</th>
                            <th colspan="3" class="has-text-centered">CRT</th>
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
                            <th class="has-text-right"  style="background-color: #EEEFF3">

                                {{ $a+$b+$c+$d+$e+$f }}
                                <?php
                                $gssc_nrt_total += $a;
                                $gssk_nrt_total += $b;
                                $igs_nrt_total += $c;
                                $gssc_crt_total += $d;
                                $gssk_crt_total += $e;
                                $igs_crt_total += $f;
                                $total += $a+$b+$c+$d+$e+$f;


                                        ?>



                            </th>
                        </tr>
                    @endforeach

                    </tbody>

                    <thead style="background-color: #EEEFF3">
                    <th class="has-text-centered">Total QATs</th>
                    <th class="has-text-centered">{{ $gssc_nrt_total }}</th>
                    <th class="has-text-centered">{{ $gssk_nrt_total }}</th>
                    <th class="has-text-centered">{{ $igs_nrt_total }}</th>
                    <th class="has-text-centered">{{ $gssc_crt_total }}</th>
                    <th class="has-text-centered">{{ $gssk_crt_total }}</th>
                    <th class="has-text-centered">{{ $igs_crt_total }}</th>
                    <th class="has-text-centered" style="background-color: #dbdcdd">{{ $total }}</th>
                    </thead>



                </table>


            </div>
        </div>


    </div>
@endsection
