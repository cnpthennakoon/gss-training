<?php

namespace App\Http\Controllers;

use App\TrainingBatchType;
use App\TrainingNature;
use Illuminate\Http\Request;

class TrainingNaturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainingNatures = TrainingNature::paginate(20);

        return view('master-data.training-natures.index')->withTrainingNatures($trainingNatures);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trainingBatchTypesList = TrainingBatchType::pluck('name', 'id')->prepend('', '');

        return view('master-data.training-natures.create', compact('trainingBatchTypesList'));
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
            'training_batch_type_id' => 'required'
        ]);

        $trainingNature = new TrainingNature();
        $trainingNature->name = $request->name;
        $trainingNature->training_batch_type_id = $request->training_batch_type_id;
        $trainingNature->save();

        return redirect()->route('training-nature.index');
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
    public function edit(TrainingNature $trainingNature)
    {
        $trainingBatchTypesList = TrainingBatchType::pluck('name', 'id');

        return view('master-data.training-natures.edit', compact('trainingNature','trainingBatchTypesList'));
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
            'training_batch_type_id' => 'required'
        ]);



        $trainingNature = TrainingNature::findOrFail($id);
        $trainingNature->name = $request->name;
        $trainingNature->training_batch_type_id = $request->training_batch_type_id;
        $trainingNature->save();


        return redirect()->route('training-nature.index');
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
    /**
     * Returns training nature for relevant training types.
     *
     * @return collection
     */
    public function findTrainingNature(Request $request)
    {

        $nature_data = TrainingNature::select('name', 'id')->where('training_batch_type_id', $request->id)->get();

        return response()->json($nature_data);

    }
}
