<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Auth;
use \Carbon\Carbon;

use App\Requirement;

class RequirementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requirements = Requirement::all();
        return view('requirements.index')->withRequirements($requirements);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('requirements.create');
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
            'name' => 'required',
            'humidity'=> 'required|numeric|min:0|max:100',
            'temperature'=> 'required|numeric',
            'wind'=> 'required|numeric|min:0',
            'wind_direction'=> 'required',
            'pressure'=> 'required|numeric|min:0'
        ]);

        $requirement = new Requirement;
        $requirement->name = $request->name;
        $requirement->humidity = $request->humidity;
        $requirement->temperature = $request->temperature;
        $requirement->wind = $request->wind;
        $requirement->wind_direction = $request->wind_direction;
        $requirement->pressure = $request->pressure;

        $requirement->save();

        Session::flash('success', 'Успешно добавихте данни за земеделска култура!');

        return redirect()->route('requirements.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $station = Station::findOrFail($id);

        return view('stations.show')->withStation($station);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $station = Station::findOrFail($id);

        return view('stations.edit')->withStation($station);
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
            'name' => 'required',
        ]);

        $station = Station::findOrFail($id);
        $station->name = $request->name;
        $station->location = $request->location;

        $station->save();

        Session::flash('success', 'Успешно редактирахте метеорологична станция!');

        return redirect()->route('stations.index');
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
