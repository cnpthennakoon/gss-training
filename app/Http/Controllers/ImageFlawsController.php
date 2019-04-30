<?php

namespace App\Http\Controllers;

use App\ImageFlaw;
use Illuminate\Http\Request;

class ImageFlawsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imageFlaws = ImageFlaw::paginate(20);

        return view('master-data.image-flaws.index')->withImageFlaws($imageFlaws);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master-data.image-flaws.create');
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
            'name' => 'required|max:255|unique:image_flaws',
        ]);

        $slug = strtolower(preg_replace("/[^a-zA-Z]/", "", $request->name));

        $imageFlaw = new ImageFlaw();
        $imageFlaw->slug = $slug;
        $imageFlaw->name = $request->name;
        $imageFlaw->save();

        return redirect()->route('image-flaw.index');
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
    public function edit(ImageFlaw $imageFlaw)
    {
        return view('master-data.image-flaws.edit', compact('imageFlaw'));
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
            'name' => 'required|max:255|unique:image_flaws',
        ]);



        $imageFlaw = ImageFlaw::findOrFail($id);
        $imageFlaw->name = $request->name;
        $imageFlaw->save();


        return redirect()->route('image-flaw.index');
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
