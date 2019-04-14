@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2>Добавяне на данни от станция</h2>
            <form method="POST" action="{{ route('indicators.store') }}">
                @csrf
                <fieldset class="form-group">
                    <label>Метеорологична станция</label>
                    <select name="station" class="form-control">
                        @foreach ($stations as $station)
                            <option value="{{ $station->id }}">{{ $station->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('name'))
                        <p class="m-1 alert alert-danger">{{ $errors->first('name') }}</p>
                    @endif
                </fieldset>
                <fieldset class="form-group">
                    <label>Влажност (%)</label>
                    <input class="form-control" type="number" min="0" max="100" name="humidity">
                    @if ($errors->has('humidity'))
                        <p class="m-1 alert alert-danger">{{ $errors->first('humidity') }}</p>
                    @endif
                </fieldset>
                <fieldset class="form-group">
                    <label>Температура (°C)</label>
                    <input class="form-control" type="number" name="temperature">
                    @if ($errors->has('temperature'))
                        <p class="m-1 alert alert-danger">{{ $errors->first('temperature') }}</p>
                    @endif
                </fieldset>
                <fieldset class="form-group">
                    <label>Вятър (км/ч)</label>
                    <input class="form-control" type="number" min="0" name="wind">
                    @if ($errors->has('wind'))
                        <p class="m-1 alert alert-danger">{{ $errors->first('wind') }}</p>
                    @endif
                </fieldset>
                <fieldset class="form-group">
                    <label>Вятър (посока)</label>
                    <select name="wind_direction" class="form-control">
                        <option value="N">север</option>
                        <option value="S">юг</option>
                        <option value="W">запад</option>
                        <option value="E">изток</option>
                        <option value="NW">северозапад</option>
                        <option value="NE">североизток</option>
                        <option value="SE">югозапад</option>
                        <option value="SE">югоизток</option>
                    </select>
                    @if ($errors->has('wind_direction'))
                        <p class="m-1 alert alert-danger">{{ $errors->first('wind_direction') }}</p>
                    @endif
                </fieldset>
                <fieldset class="form-group">
                    <label>Атмосферно налягане (hPa)</label>
                    <input class="form-control" type="number" min="0" name="pressure">
                    @if ($errors->has('pressure'))
                        <p class="m-1 alert alert-danger">{{ $errors->first('pressure') }}</p>
                    @endif
                </fieldset>
                <fieldset class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Добави!</button>
                </fieldset>
            </form>
        </div>
    </div>
</div>
@endsection