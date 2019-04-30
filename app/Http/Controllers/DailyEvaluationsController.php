<?php

namespace App\Http\Controllers;

use App\Audit;
use App\DailyEvaluation;
use App\Imports\DailyEvaluationsImport;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class DailyEvaluationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projectsList = Project::orderBy('name', 'asc')->pluck('name', 'id')->prepend('Select a Project', '');

        return view('daily-evaluations.create', compact('projectsList'));
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
            'audit_date' => 'required',
        ]);

        $audit = new Audit();
        $audit->project_id = $request->project_id;
        $audit->user_id = Auth::user()->id;
        $audit->audit_date = $request->audit_date;
        $audit->save();

        Excel::import(new DailyEvaluationsImport(), $request->file('daily_audit'));

        return redirect()->route('audits.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dailyEvaluation = DailyEvaluation::findOrFail($id);
        $audit = Audit::findOrFail($dailyEvaluation->audit_id);

        return view('daily-evaluations.show')->withDailyEvaluation($dailyEvaluation)->withAudit($audit);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dailyEvaluation = DailyEvaluation::findOrFail($id);

        return view('daily-evaluations.edit', compact('dailyEvaluation'));
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
        DailyEvaluation::findOrFail($id)->update($request->input());

        $dailyEvaluation = DailyEvaluation::findOrFail($id);
        $audit = Audit::findOrFail($dailyEvaluation->audit_id);

        return view('daily-evaluations.show')->withDailyEvaluation($dailyEvaluation)->withAudit($audit);
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

    public function csv_headers(){

    }
}