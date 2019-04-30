<?php

namespace App\Http\Controllers;

use App\Country;
use App\GlobalProject;
use App\Manufacturer;
use App\Project;
use App\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (isset($request->project)){

            $projects = Project::where('slug', $request->project)->orderBy('name', 'asc')->paginate(20)->appends($request->query());

        }elseif(isset($request->region) ){

            $region = Region::where('name', $request->region)->pluck('id');

            $projects = Project::where('region_id', $region)->orderBy('name', 'asc')->paginate(20)->appends($request->query());

        }else{

            $projects = Project::orderBy('name', 'asc')->paginate(20);
        }

        return view('master-data.projects.index')->withProjects($projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $globalProjectsList = GlobalProject::orderBy('name', 'asc')->pluck('name', 'id')->prepend('', '');
        $regionsList = Region::orderBy('name', 'asc')->pluck('name', 'id')->prepend('', '');
        $countriesList = Country::orderBy('name', 'asc')->pluck('name', 'id')->prepend('', '');
        $manufacturersList = Manufacturer::orderBy('name', 'asc')->pluck('name', 'id')->prepend('', '');

        return view('master-data.projects.create', compact('regionsList', 'globalProjectsList', 'countriesList', 'manufacturersList'));
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
            'slug' => 'sometimes|max:255|unique:projects',
            'region_id' => 'required',
            'global_project_id' => 'required',
            'country_id' => 'required',
            'manufacturer_id' => 'required',
        ]);

        $slug = strtolower(preg_replace("/[^a-zA-Z]/", "", $request->slug));

        $country = new Project();
        $country->name = $request->name;
        $country->slug = $slug;
        $country->region_id = $request->region_id;
        $country->global_project_id = $request->global_project_id;
        $country->country_id = $request->country_id;
        $country->manufacturer_id = $request->manufacturer_id;
        $country->user_id = Auth::id();
        $country->save();

        return redirect()->route('project.index');
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
    public function edit(Project $project)
    {
        $globalProjectsList = GlobalProject::pluck('name', 'id');
        $regionsList = Region::pluck('name', 'id');
        $countriesList = Country::pluck('name', 'id');
        $manufacturersList = Manufacturer::pluck('name', 'id');

        return view('master-data.projects.edit', compact('project','regionsList', 'globalProjectsList', 'countriesList', 'manufacturersList'));
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
            'region_id' => 'required',
            'global_project_id' => 'required',
            'country_id' => 'required',
            'manufacturer_id' => 'required',
        ]);


        $country = Project::findOrFail($id);
        $country->name = $request->name;
        $country->region_id = $request->region_id;
        $country->global_project_id = $request->global_project_id;
        $country->country_id = $request->country_id;
        $country->manufacturer_id = $request->manufacturer_id;
        $country->save();

        return redirect()->route('project.index');
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
