@extends('layouts.app')

@section('content')
    @foreach ($stations as $station)
        <p class="alert alert-info">
            <strong>Метеорологична станция: </strong> {{ $station->name }}
        </p>
        <p class="alert alert-info"><strong>Местоположение: </strong> {{ $station->location ? $station->location : 'Все още не е добавено.' }}</p>
    @endforeach
@endsection