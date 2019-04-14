@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2>Редактиране на изисквания към земеделска култура</h2>
            <form method="POST" action="{{ route('requirement.update') }}">
                @csrf
                <fieldset class="form-group">
                    <label>Име на културата</label>
                    <input type="text" name="name" class="form-control" value="{{ $requirement->name }}">
                    @if ($errors->has('name'))
                        <p class="m-1 alert alert-danger">{{ $errors->first('name') }}</p>
                    @endif
                </fieldset>
                <fieldset class="form-group">
                    <label>Влажност (%)</label>
                    <input class="form-control" type="number" min="0" max="100" name="humidity" value="{{ $requirement->humidity }}">
                    @if ($errors->has('humidity'))
                        <p class="m-1 alert alert-danger">{{ $errors->first('humidity') }}</p>
                    @endif
                </fieldset>
                <fieldset class="form-group">
                    <label>Температура (°C)</label>
                    <input class="form-control" type="number" name="temperature" value="{{ $requirement->temperature }}">
                    @if ($errors->has('temperature'))
                        <p class="m-1 alert alert-danger">{{ $errors->first('temperature') }}</p>
                    @endif
                </fieldset>
                <fieldset class="form-group">
                    <label>Вятър (км/ч)</label>
                    <input class="form-control" type="number" min="0" name="wind" value="{{ $requirement->wind }}>
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
                    <input class="form-control" type="number" min="0" name="pressure" value="{{ $requirement->pressure }}">
                    @if ($errors->has('pressure'))
                        <p class="m-1 alert alert-danger">{{ $errors->first('pressure') }}</p>
                    @endif
                </fieldset>
                <fieldset class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Редактирай!</button>
                </fieldset>
            </form>
        </div>
    </div>
</div>
@endsection