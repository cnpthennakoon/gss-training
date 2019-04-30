<?php

namespace App\Http\Controllers;

use App\TrainingBatchType;
use Illuminate\Http\Request;

class TrainingBatchTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $trainingBatchTypes = TrainingBatchType::paginate(20);

        return view('master-data.training-batch-types.index')->withTrainingBatchTypes($trainingBatchTypes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master-data.training-batch-types.create');
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

        $trainingBatchType = new TrainingBatchType();
        $trainingBatchType->name = $request->name;
        $trainingBatchType->save();

        return redirect()->route('training-batch-type.index');
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
    public function edit(TrainingBatchType $trainingBatchType)
    {
        return view('master-data.training-batch-types.edit', compact('trainingBatchType'));
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



        $trainingBatchType = TrainingBatchType::findOrFail($id);
        $trainingBatchType->name = $request->name;
        $trainingBatchType->save();


        return redirect()->route('training-batch-type.index');
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
