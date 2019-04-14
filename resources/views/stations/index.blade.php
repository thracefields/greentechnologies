@extends('layouts.app')

@section('content')
    @if ($stations->count() > 0)
        <p>
            <a href="{{ route('stations.create') }}" class="btn btn-primary">Добави станция</a>
        </p>
        <table class="table table-hover table-responsive-sm">
            <thead>
                <tr>
                    <th scope="col">Метеорологична станция</th>
                    <th scope="col">Местоположение</th>
                    <th>Добавена на:</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stations as $station)
                    <tr>
                        <td>{{ $station->name }}</td>
                        <td>{{ $station->location ? $station->location : 'Все още не е добавено.' }}</td>
                        <td>{{ $station->created_at->format('j.m.Y') }}</td>
                        <td><a href="{{ route('indicators.index', $station->id) }}" class="btn btn-primary">Днешни измервания</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="alert alert-info">Все още няма добавени метеорологични станции!</p>
    @endif
   
@endsection