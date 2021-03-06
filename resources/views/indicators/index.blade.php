@extends('layouts.app')

@section('content')
    @if($indicators->count() > 0) 
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <p>Измервания от днес</p>
                    <p class="alert alert-info">
                        <strong>Метеорологична станция: </strong> {{ $station->name }}
                    </p>
                    <p class="alert alert-info"><strong>Местоположение: </strong> {{ $station->location ? $station->location : 'Все още не е добавено.' }}</p>                    
                </div>
            </div>
        </div>
       
        <table class="table table-hover table-responsive-sm">
            <thead>
                <tr>
                    <th scope="col">Време на измерване</th>
                    <th scope="col">Влажност (%)</th>
                    <th scope="col">Teмпература (°C)</th>
                    <th scope="col">Вятър (км/ч)</i></th>
                    <th scope="col">Вятър (посока)</th>
                    <th scope="col">Атмосферно налягане (hPa)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($indicators as $indicator)
                    <tr>
                        <td>{{ $indicator->created_at->format('H:i:s') }}</td>
                        <td>{{ $indicator->humidity }}</td>
                        <td>{{ $indicator->temperature }}</td>
                        <td>{{ $indicator->wind }}</td>
                        <td>{{ $indicator->wind_direction }}</td>
                        <td>{{ $indicator->pressure }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @foreach ($requirements as $requirement)
            <p class="alert alert-info">{{ $requirement->name }}</p>
            Влажност
            @if($indicators->sum('humidity') > $requirement->humidity)
            <p class="alert alert-success">Културата е запасена с влажност и ще се развива добре.</p>
            @else
            <p class="alert alert-danger">
                Не достига влага и се очаква културата да загине, ако не се полее.
            </p>
            @endif
            Температура
            @if($indicators->sum('temperature') > $requirement->temperature)
            <p class="alert alert-success">Културата се развива на умерена температура, но не трябва да се повишава много.</p>
            @else
            <p class="alert alert-danger">
                Температура е много ниска и културата може да загине.
            </p>
            @endif
            @if($indicators->sum('wind') > $requirement->wind)
            <p class="alert alert-success">Вятърът не е силен и се понася добре от културата.</p>
            @else
            <p class="alert alert-danger">
                Много силен вятър. Може да компорметира реколтата.
            </p>
            @endif
        @endforeach
    @else
        <p class="alert alert-info">Все още няма направени измервания днес!</p>
    @endif
@endsection