<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Auth;
use \Carbon\Carbon;

use App\Station;
use App\Indicator;

class IndicatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $station = Station::findOrFail($id);
        $indicators = Indicator::where('station_id', $id)->whereDate('created_at', Carbon::today())->get();
        return view('indicators.index')->withIndicators($indicators)->withStation($station);
    }

    public function sort($id, $date)
    {
        $station = Station::findOrFail($id);
        $indicators = Indicator::where('station_id', $id)->whereDate('created_at', $date)->get();
        return view('indicators.sort')->withIndicators($indicators)->withStation($station)->withDate($date);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stations = Station::all();
        return view('indicators.create')->withStations($stations);
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
            'station' => 'required',
            'humidity'=> 'required|numeric|min:0|max:100',
            'temperature'=> 'required|numeric',
            'wind'=> 'required|numeric|min:0',
            'wind_direction'=> 'required',
            'pressure'=> 'required|numeric|min:0'
        ]);

        $indicator = new Indicator;
        $indicator->station_id = $request->station;
        $indicator->humidity = $request->humidity;
        $indicator->temperature = $request->temperature;
        $indicator->wind = $request->wind;
        $indicator->wind_direction = $request->wind_direction;
        $indicator->pressure = $request->pressure;

        $indicator->save();

        Session::flash('success', 'Успешно добавихте данни от станция!');

        return redirect()->route('stations.index');
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
