@extends('layouts.app')

@section('content')
    @if($indicators->count() > 0) 
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <p>Измервания от {{ $date }}</p>
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
    @else
        <p class="alert alert-info">Няма направени измервания на тази дата!</p>
    @endif
@endsection