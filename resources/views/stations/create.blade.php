@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2>Добавяне на метеорологична станция</h2>
            <form method="POST" action="{{ route('stations.store') }}">
                @csrf
                <fieldset class="form-group">
                    <label>Наименование</label>
                    <input class="form-control" type="text" name="name">
                    @if ($errors->has('name'))
                        <p class="m-1 alert alert-danger">{{ $errors->first('name') }}</p>
                    @endif
                </fieldset>
                <fieldset class="form-group">
                    <label>Местоположение</label>
                    <input class="form-control" type="text" name="location">
                    @if ($errors->has('location'))
                        <p class="m-1 alert alert-danger">{{ $errors->first('location') }}</p>
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