<?php

namespace App\Http\Controllers;

use App\TrainingBatchStatus;
use Illuminate\Http\Request;

class TrainingBatchStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainingBatchStatus = TrainingBatchStatus::paginate(20);

        return view('master-data.training-batch-status.index')->withTrainingBatchStatus($trainingBatchStatus);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master-data.training-batch-status.create');
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
            'name' => 'required|max:255',
        ]);

        $trainingBatchStatus = new TrainingBatchStatus();
        $trainingBatchStatus->name = $request->name;
        $trainingBatchStatus->save();

        return redirect()->route('training-batch-status.index');
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
    public function edit(TrainingBatchStatus $trainingBatchStatus)
    {
        return view('master-data.training-batch-status.edit', compact('trainingBatchStatus'));
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
            'name' => 'required|max:255',
        ]);



        $trainingBatchStatus = TrainingBatchStatus::findOrFail($id);
        $trainingBatchStatus->name = $request->name;
        $trainingBatchStatus->save();


        return redirect()->route('training-batch-status.index');
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
