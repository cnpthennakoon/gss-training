<?php

namespace App\Http\Controllers;

use App\Project;
use App\TrainingBatch;
use App\TrainingBatchStatus;
use App\TrainingBatchType;
use App\TrainingCenter;
use App\TrainingNature;
use App\TrainingProjectStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrainingBatchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


//        if (isset($request->batch)){
//
//            $batches = Project::where('slug', $request->project)->orderBy('name', 'asc')->paginate(20)->appends($request->query());
//
//        }elseif(isset($request->region) ){
//
//            $batches = Region::where('name', $request->region)->pluck('id');
//
//            $batches = Project::where('region_id', $region)->orderBy('name', 'asc')->paginate(20)->appends($request->query());
//
//        }else{

//            $batches = TrainingBatch::orderBy('created_at', 'asc')->paginate(20);
//        }

//        return view('training.training-batch-data.index')->withBatches($batches);
        $trainingBatches = TrainingBatch::orderBy('created_at', 'desc')->paginate(20);
        return view('training.training-batch.index')->withTrainingBatches($trainingBatches);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projectsList= Project::orderBy('name', 'asc')->pluck('name', 'id')->prepend('', '');
        $projectStatusList= TrainingProjectStatus::orderBy('name', 'asc')->pluck('name', 'id')->prepend('', '');
        $trainingCentersList= TrainingCenter::orderBy('name', 'asc')->pluck('name', 'id')->prepend('', '');
        $batchStatusList= TrainingBatchStatus::orderBy('name', 'asc')->pluck('name', 'id')->prepend('', '');
        $trainingBatchTypesList = TrainingBatchType::orderBy('name', 'asc')->pluck('name', 'id')->prepend('', '');

        return view('training.training-batch.create', compact('projectsList', 'projectStatusList', 'trainingCentersList', 'batchStatusList', 'trainingBatchTypesList'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'project_id' => 'required',
            'training_project_status_id' => 'required',
            'training_center_id' => 'required',
            'training_batch_status_id' => 'required',
            'training_batch_type_id' => 'required',
            'training_nature_id' => 'required',
            'start_date' => 'required',
            'live_date' => 'required',
            'received_head_count' => 'required',
        ]);

        $trainingBatch = new TrainingBatch();
        $trainingBatch->project_id = $request->project_id;
        $trainingBatch->training_project_status_id = $request->training_project_status_id;
        $trainingBatch->training_center_id = $request->training_center_id;
        $trainingBatch->training_batch_status_id = $request->training_batch_status_id;
        $trainingBatch->training_batch_type_id = $request->training_batch_type_id;
        $trainingBatch->training_nature_id = $request->training_nature_id;
        $trainingBatch->start_date = $request->start_date;
        $trainingBatch->live_date = $request->live_date;
        $trainingBatch->received_head_count = $request->received_head_count;
        $trainingBatch->hr_attrition_count = $request->hr_attrition_count;
        $trainingBatch->training_attrition_count = $request->training_attrition_count;
        $trainingBatch->first_exam_passed_count = $request->first_exam_passed_count;
        $trainingBatch->second_exam_passed_count = $request->second_exam_passed_count;
        $trainingBatch->comment = $request->comment;
        $trainingBatch->user_id = Auth::id();
        $trainingBatch->save();

        return redirect()->route('training-batch.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TrainingBatch $trainingBatch)
    {
        return view('training.training-batch.show', compact('trainingBatch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TrainingBatch $trainingBatch)
    {
        $projectsList= Project::orderBy('name', 'asc')->pluck('name', 'id')->prepend('', '');
        $projectStatusList= TrainingProjectStatus::orderBy('name', 'asc')->pluck('name', 'id')->prepend('', '');
        $trainingCentersList= TrainingCenter::orderBy('name', 'asc')->pluck('name', 'id')->prepend('', '');
        $batchStatusList= TrainingBatchStatus::orderBy('name', 'asc')->pluck('name', 'id')->prepend('', '');
        $trainingBatchTypesList = TrainingBatchType::orderBy('name', 'asc')->pluck('name', 'id')->prepend('', '');
        $trainingNaturesList = TrainingNature::orderBy('name', 'asc')->pluck('name', 'id')->prepend('', '');

        return view('training.training-batch.edit', compact('trainingBatch','projectsList', 'projectStatusList', 'trainingCentersList', 'batchStatusList', 'trainingBatchTypesList', 'trainingNaturesList'));
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
        $this->validate($request, [
            'project_id' => 'required',
            'training_project_status_id' => 'required',
            'training_center_id' => 'required',
            'training_batch_status_id' => 'required',
            'training_batch_type_id' => 'required',
            'training_nature_id' => 'required',
            'start_date' => 'required',
            'live_date' => 'required',
            'received_head_count' => 'required',
        ]);


        $trainingBatch = TrainingBatch::findOrFail($id);
        $trainingBatch->project_id = $request->project_id;
        $trainingBatch->training_project_status_id = $request->training_project_status_id;
        $trainingBatch->training_center_id = $request->training_center_id;
        $trainingBatch->training_batch_status_id = $request->training_batch_status_id;
        $trainingBatch->training_batch_type_id = $request->training_batch_type_id;
        $trainingBatch->training_nature_id = $request->training_nature_id;
        $trainingBatch->start_date = $request->start_date;
        $trainingBatch->live_date = $request->live_date;
        $trainingBatch->received_head_count = $request->received_head_count;
        $trainingBatch->hr_attrition_count = $request->hr_attrition_count;
        $trainingBatch->training_attrition_count = $request->training_attrition_count;
        $trainingBatch->first_exam_passed_count = $request->first_exam_passed_count;
        $trainingBatch->second_exam_passed_count = $request->second_exam_passed_count;
        $trainingBatch->comment = $request->comment;
        $trainingBatch->save();


        return redirect()->route('training-batch.index');
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
