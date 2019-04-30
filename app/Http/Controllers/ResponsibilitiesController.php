<?php

namespace App\Http\Controllers;

use App\Responsibility;
use Illuminate\Http\Request;

class ResponsibilitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $responsibilities = Responsibility::paginate(20);

        return view('master-data.responsibilities.index')->withResponsibilities($responsibilities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master-data.responsibilities.create');
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
            'name' => 'required|max:255|unique:responsibilities',
        ]);

        $slug = strtolower(preg_replace("/[^a-zA-Z]/", "", $request->name));

        $errorType = new Responsibility();
        $errorType->name = $request->name;
        $errorType->slug = $slug;
        $errorType->save();

        return redirect()->route('responsibility.index');
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
    public function edit(Responsibility $responsibility)
    {
        return view('master-data.responsibilities.edit', compact('responsibility'));
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
            'name' => 'required|max:255|unique:responsibilities',
        ]);



        $responsibility = Responsibility::findOrFail($id);
        $responsibility->name = $request->name;
        $responsibility->save();


        return redirect()->route('responsibility.index');
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
