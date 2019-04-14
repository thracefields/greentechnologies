<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Auth;

use App\Station;

class StationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stations = Station::paginate(20);
        return view('stations.index')->withStations($stations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stations.create');
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
        ]);

        $station = new Station;
        $station->name = $request->name;
        $station->location = $request->location;

        $station->save();

        Session::flash('success', 'Успешно добавихте метеорологична станция!');

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
