<?php

namespace App\Http\Controllers;

use App\Project;
use App\TrainingBatch;
use Illuminate\Http\Request;

class TrainingCentersSummaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = TrainingBatch::where('training_batch_status_id', 1)->select('project_id')->select('project_id')->distinct()->get()->count();

        $hr = TrainingBatch::where('training_batch_status_id', 1)->sum('hr_attrition_count');
        $tr = TrainingBatch::where('training_batch_status_id', 1)->sum('training_attrition_count');
        $hc = TrainingBatch::where('training_batch_status_id', 1)->sum('received_head_count');

        $data = [];

        $project_ids = TrainingBatch::select('project_id')->where('training_batch_status_id', 1)->distinct()->get();

        foreach ($project_ids as $key=>$a){

            $data[$key]['project_name'] = Project::where('id', $a->project_id)->select('slug')->get()[0]['slug'];
            $data[$key]['project_id'] = $a->project_id;

            $data[$key]['gssc_nrt'] = TrainingBatch::where('project_id', $a->project_id)
                ->where('training_batch_status_id', 1)
                ->where('training_center_id', 1)
                ->where('training_batch_type_id',1)
                ->select('received_head_count', 'hr_attrition_count','training_attrition_count')
                ->get();

            if ($data[$key]['gssc_nrt']->isEmpty()){
                $data[$key]['gssc_nrt'] = 0;
            }

            $data[$key]['gssk_nrt'] = TrainingBatch::where('project_id', $a->project_id)
                ->where('training_batch_status_id', 1)
                ->where('training_center_id', 2)
                ->where('training_batch_type_id',1)
                ->select('received_head_count', 'hr_attrition_count','training_attrition_count')
                ->get();

            if ($data[$key]['gssk_nrt']->isEmpty()){
                $data[$key]['gssk_nrt'] = 0;
            }


            $data[$key]['igs_nrt'] = TrainingBatch::where('project_id', $a->project_id)
                ->where('training_batch_status_id', 1)
                ->where('training_center_id', 3)
                ->where('training_batch_type_id',1)
                ->select('received_head_count', 'hr_attrition_count','training_attrition_count')
                ->get();

            if ($data[$key]['igs_nrt']->isEmpty()){
                $data[$key]['igs_nrt'] = 0;
            }


            $data[$key]['gssc_crt'] = TrainingBatch::where('project_id', $a->project_id)
                ->where('training_batch_status_id', 1)
                ->where('training_center_id', 1)
                ->where('training_batch_type_id',2)
                ->select('received_head_count', 'hr_attrition_count','training_attrition_count')
                ->get();

            if ($data[$key]['gssc_crt'] ->isEmpty()){
                $data[$key]['gssc_crt'] = 0;
            }

            $data[$key]['gssk_crt'] = TrainingBatch::where('project_id', $a->project_id)
                ->where('training_batch_status_id', 1)
                ->where('training_center_id', 2)
                ->where('training_batch_type_id',2)
                ->select('received_head_count', 'hr_attrition_count','training_attrition_count')
                ->get();

            if ($data[$key]['gssk_crt'] ->isEmpty()){
                $data[$key]['gssk_crt']= 0;
            }

            $data[$key]['igs_crt'] = TrainingBatch::where('project_id', $a->project_id)
                ->where('training_batch_status_id', 1)
                ->where('training_center_id', 3)
                ->where('training_batch_type_id',2)
                ->select('received_head_count', 'hr_attrition_count','training_attrition_count')
                ->get();

            if ($data[$key]['igs_crt'] ->isEmpty()){
                $data[$key]['igs_crt'] = 0;
            }

        }
        sort($data);
        json_encode($data);

        return view('training.summary')->withProjects($projects)->withData($data)->withHr($hr)->withTr($tr)->withHc($hc);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
