<?php

namespace App\Http\Controllers;

use App\ErrorType;
use Illuminate\Http\Request;

class ErrorTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $errorTypes = ErrorType::paginate(20);

        return view('master-data.error-types.index')->withErrorTypes($errorTypes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master-data.error-types.create');
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
            'name' => 'required|max:255|unique:error_types',
        ]);

        $slug = strtolower(preg_replace("/[^a-zA-Z]/", "", $request->name));

        $errorType = new ErrorType();
        $errorType->name = $request->name;
        $errorType->slug = $slug;
        $errorType->save();

        return redirect()->route('error-type.index');
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
    public function edit(ErrorType $errorType)
    {
        return view('master-data.error-types.edit', compact('errorType'));
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
            'name' => 'required|max:255|unique:error_types',
        ]);



        $errorType = ErrorType::findOrFail($id);
        $errorType->name = $request->name;
        $errorType->save();


        return redirect()->route('error-type.index');
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
