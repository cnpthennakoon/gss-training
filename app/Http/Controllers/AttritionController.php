<?php

namespace App\Http\Controllers;

use App\Attrition;
use App\AttritionReason;
use App\AttritionType;
use App\Project;
use App\TrainingBatch;
use App\TrainingCenter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttritionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attrition = Attrition::paginate(20);

        return view('attrition.index')->withAttrition($attrition);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projectsList = Project::orderBy('name', 'asc')->pluck('name', 'id')->prepend('', '');
        $attritionTypeList = AttritionType::orderBy('name', 'asc')->pluck('name', 'id')->prepend('', '');
        $attritionReasonList = AttritionReason::orderBy('name', 'asc')->pluck('name', 'id')->prepend('', '');
        $trainingCenterList = TrainingCenter::orderBy('name', 'asc')->pluck('name', 'id')->prepend('', '');

        return view('attrition.create', compact('projectsList', 'attritionReasonList', 'attritionTypeList', 'trainingCenterList'));
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
            'qat_id' => 'required',
            'training_batch_id' => 'required',
            'last_working_date' => 'required',
            'attrition_type_id' => 'required',
            'attrition_reason_id' => 'required',
        ]);

        $attrition = new Attrition();
        $attrition->qat_id = $request->qat_id;
        $attrition->training_batch_id = $request->training_batch_id;
        $attrition->last_working_date = $request->last_working_date;
        $attrition->attrition_type_id = $request->attrition_type_id;
        $attrition->attrition_reason_id = $request->attrition_reason_id;
        $attrition->comment = $request->comment;
        $attrition->user_id = Auth::id();
        $attrition->save();

        return redirect()->route('attrition.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Attrition $attrition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Attrition $attrition)
    {
        $attritionTypeList = AttritionType::orderBy('name', 'asc')->pluck('name', 'id')->prepend('', '');
        $attritionReasonList = AttritionReason::orderBy('name', 'asc')->pluck('name', 'id')->prepend('', '');

        $training_batch_data = TrainingBatch::where('training_batches.training_batch_status_id', 1)
            ->join('projects', 'projects.id', 'training_batches.project_id')
            ->join('training_centers', 'training_centers.id', 'training_batches.training_center_id')
            ->select('training_batches.id','training_centers.name','training_batches.received_head_count','training_batches.start_date','projects.slug')
            ->get();

//        return $training_batch_data;

        return view('attrition.edit', compact('attrition','attritionReasonList', 'attritionTypeList', 'training_batch_data'));
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
            'qat_id' => 'required',
            'training_batch_id' => 'required',
            'last_working_date' => 'required',
            'attrition_type_id' => 'required',
            'attrition_reason_id' => 'required',
        ]);

        $attrition= Attrition::findOrFail($id);
        $attrition->qat_id = $request->qat_id;
        $attrition->training_batch_id = $request->training_batch_id;
        $attrition->last_working_date = $request->last_working_date;
        $attrition->attrition_type_id = $request->attrition_type_id;
        $attrition->attrition_reason_id = $request->attrition_reason_id;
        $attrition->comment = $request->comment;
        $attrition->save();

        return redirect()->route('attrition.index');
    }

    /**
     * Returns training Bath for relevant training center.
     *
     * @return collection
     */
    public function findBatch(Request $request)
    {

        $training_batch_data = TrainingBatch::where('training_batches.training_batch_status_id', 1)
            ->where('training_batches.training_center_id', $request->id)
            ->join('projects', 'projects.id', 'training_batches.project_id')
            ->select('training_batches.id','training_batches.received_head_count','training_batches.start_date','projects.slug')
            ->get();
        return response()->json($training_batch_data);


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
