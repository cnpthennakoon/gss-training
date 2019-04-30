@extends('layouts.training')

@section('content')
    <div class="flex-container">

        <nav class="breadcrumb has-arrow-separator" aria-label="breadcrumbs">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('training-dashboard') }}">Training</a></li>
                <li><a href="{{ route('training-batch.index') }}">Training Batches</a></li>
                <li class="is-active"><a href="#" aria-current="page">View Training Batch</a></li>
            </ul>
        </nav>

        <div class="columns">
            <div class="column">

                <h1 class="title">
                    Training Batch Details
                </h1>
            </div>
            <div class="column">
                <a href="{{ route('training-batch.edit', $trainingBatch->id) }}" class="button is-dark is-outlined is-pulled-right m-r-10">Edit Training Batch Details</a>
            </div>
        </div>

        <div class="card">
            <div class="card-content">

                <table class="table is-bordered is-narrow is-fullwidth is-hoverable">
                    <thead>
                    <tr>
                        <th>Project</th>
                        <td>{{ $trainingBatch->project->name }}</td>
                    </tr>
                    <tr>
                        <th>Project Status</th>
                        <td>{{ $trainingBatch->trainingProjectStatus->name }}</td>
                    </tr>
                    <tr>
                        <th>Training Center</th>
                        <td>{{ $trainingBatch->trainingCenter->name }}</td>
                    </tr>
                    <tr>
                        <th>Training Batch Status</th>
                        <td>{{ $trainingBatch->trainingBatchStatus->name }}</td>
                    </tr>
                    <tr>
                        <th>Training Batch Type</th>
                        <td>{{ $trainingBatch->trainingBatchType->name }}</td>
                    </tr>
                    <tr>
                        <th>Training Nature</th>
                        <td>{{ $trainingBatch->trainingNature->name }}</td>
                    </tr>
                    <tr>
                        <th>Start Date</th>
                        <td>{{ $trainingBatch->start_date}}</td>
                    </tr>
                    <tr>
                        <th>Live Date</th>
                        <td>{{ $trainingBatch->live_date}}</td>
                    </tr>
                        <th>Received Head Count </th>
                        <td>{{ $trainingBatch->received_head_count}}</td>
                    </tr>
                    <tr>
                        <th>HR Attrition Count</th>
                        <td>{{ $trainingBatch->hr_attrition_count}}</td>
                    </tr>
                    <tr>
                        <th>Training Attrition Count</th>
                        <td>{{ $trainingBatch->training_attrition_count}}</td>
                    </tr>
                    <tr>
                        <th>First Exam Passed Count</th>
                        <td>{{ $trainingBatch->first_exam_passed_count}}</td>
                    </tr>
                    <tr>
                        <th>Second Exam Passed Count</th>
                        <td>{{ $trainingBatch->second_exam_passed_count}}</td>
                    </tr>
                    <tr>
                        <th>Comment</th>
                        <td>{{ $trainingBatch->comment}}</td>
                    </tr>
                    <tr>
                        <th>Created By</th>
                        <td>{{ $trainingBatch->user->name}} - <i>( {{ $trainingBatch->user->email}} )</i></td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td>{{ $trainingBatch->created_at}}</td>
                    </tr>




                    </thead>


                </table>


                @if($trainingBatch->attrition->isEmpty() == false)

                    <p class="subtitle m-t-35">Attrition Details</p>
                    <div class="text-center">
                        <table class="table is-bordered is-narrow is-fullwidth is-hoverable">
                            <thead>
                            <tr>
                                <th>QAT</th>
                                <th>Last Working Date</th>
                                <th>Attrition Type</th>
                                <th>Attrition Reason</th>
                                <th>Comment</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($trainingBatch->attrition as $attrition)
                                <tr>
                                    <td>{{ $attrition->qat_id }}</td>
                                    <td>{{ $attrition->last_working_date }}</td>
                                    <td>{{ $attrition->attritionType->name }}</td>
                                    <td>{{ $attrition->attritionReason->name }}</td>
                                    <td><small>{{ $attrition->comment }}</small></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                @endif


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