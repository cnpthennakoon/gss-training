<?php

namespace App\Http\Controllers;

use App\Project;
use App\QatShortfall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QatShortfallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shortfalls = QatShortfall::paginate(20);

        return view('qat-shortfall.index')->withShortfalls($shortfalls);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projectsList = Project::orderBy('name', 'asc')->pluck('name', 'id')->prepend('', '');

        return view('qat-shortfall.create', compact('projectsList'));
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
            'project_id' => ['required', 'numeric', 'unique:qat_shortfalls'],
        ]);


        $qat_shortfall = new QatShortfall();
        $qat_shortfall->project_id = $request->project_id;
        $qat_shortfall->gssc_shortfall = $request->gssc_shortfall;
        $qat_shortfall->gssk_shortfall = $request->gssk_shortfall;
        $qat_shortfall->igs_shortfall = $request->igs_shortfall;
        $qat_shortfall->user_id = Auth::id();
        $qat_shortfall->save();

        return redirect()->route('qat-shortfall.index');
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
    public function edit(QatShortfall $qatShortfall)
    {
        $projectsList = Project::orderBy('name', 'asc')->pluck('name', 'id');

        return view('qat-shortfall.edit', compact('qatShortfall','projectsList'));
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
        $qat_shortfall = QatShortfall::findOrFail($id);
        $qat_shortfall->project_id = $request->project_id;
        $qat_shortfall->gssc_shortfall = $request->gssc_shortfall;
        $qat_shortfall->gssk_shortfall = $request->gssk_shortfall;
        $qat_shortfall->igs_shortfall = $request->igs_shortfall;
        $qat_shortfall->save();


        return redirect()->route('qat-shortfall.index');
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
