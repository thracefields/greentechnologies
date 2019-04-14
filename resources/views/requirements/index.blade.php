@extends('layouts.app')

@section('content')
    @if($requirements->count() > 0) 
        <table class="table table-hover table-responsive-sm">
            <thead>
                <tr>
                    <th>Име на културата</th>
                    <th scope="col">Влажност (%)</th>
                    <th scope="col">Teмпература (°C)</th>
                    <th scope="col">Вятър (км/ч)</i></th>
                    <th scope="col">Вятър (посока)</th>
                    <th scope="col">Атмосферно налягане (hPa)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($requirements as $requirement)
                    <tr>
                        <td>{{ $requirement->name }}</td>
                        <td>{{ $requirement->humidity }}</td>
                        <td>{{ $requirement->temperature }}</td>
                        <td>{{ $requirement->wind }}</td>
                        <td>{{ $requirement->wind_direction }}</td>
                        <td>{{ $requirement->pressure }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="alert alert-info">Все още няма добавени изисквания към земеделски култури!</p>
    @endif
@endsection