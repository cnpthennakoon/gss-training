<?php

namespace App\Http\Controllers;

use App\AttritionReason;
use Illuminate\Http\Request;

class AttritionReasonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attritionReasons = AttritionReason::orderBy('name', 'asc')->paginate(20);

        return view('master-data.attrition-reasons.index')->withAttritionReasons($attritionReasons);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master-data.attrition-reasons.create');
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

        $attritionReason = new AttritionReason();
        $attritionReason->name = $request->name;
        $attritionReason->save();

        return redirect()->route('attrition-reason.index');
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
    public function edit(AttritionReason $attritionReason)
    {
        return view('master-data.attrition-reasons.edit', compact('attritionReason'));
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



        $attritionReason = AttritionReason::findOrFail($id);
        $attritionReason->name = $request->name;
        $attritionReason->save();


        return redirect()->route('attrition-reason.index');
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
