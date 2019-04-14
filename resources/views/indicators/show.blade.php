@extends('layouts.app')

@section('content')
    <div class="alert alert-success">
        <h2>Метеорологична станция: {{ $station->name }}</h2>
    </div>
    <p>Местоположение: {{ $station->location ? $station->location : 'Все още не е добавено.' }}</p>
@endsection