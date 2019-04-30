<?php

namespace App\Http\Controllers;

use App\Country;
use App\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (isset($request->country)){

            $countries = Country::where('name', $request->country)->orderBy('name', 'asc')->paginate(20)->appends($request->query());

        }elseif(isset($request->region) ){

            $region = Region::where('name', $request->region)->pluck('id');

            $countries = Country::where('region_id', $region)->orderBy('name', 'asc')->paginate(20)->appends($request->query());

        }else{

            $countries = Country::orderBy('name', 'asc')->paginate(20);
        }

        return view('master-data.countries.index')->withCountries($countries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regionsList = Region::pluck('name', 'id')->prepend('', '');

        return view('master-data.countries.create', compact('regionsList'));
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
            'region_id' => 'required',
            'slug' => 'sometimes|max:255|unique:countries'
        ]);

        $slug = strtolower(preg_replace("/[^a-zA-Z]/", "", $request->slug));

        $country = new Country();
        $country->name = $request->name;
        $country->slug = $slug;
        $country->region_id = $request->region_id;
        $country->user_id = Auth::id();
        $country->save();

        return redirect()->route('country.index');

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
    public function edit(Country $country)
    {
        $regionsList = Region::pluck('name', 'id');

        return view('master-data.countries.edit', compact('country','regionsList'));
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
        ]);



        $country = Country::findOrFail($id);
        $country->name = $request->name;
        $country->region_id = $request->region_id;
        $country->save();


        return redirect()->route('country.index');
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
