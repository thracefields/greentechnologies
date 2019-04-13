@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2>Вход</h2>
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                @csrf
                <fieldset class="form-group">
                    <label for="email" class="col-md-4">Имейл</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <p class="m-1 alert alert-danger">{{ $errors->first('email') }}</p>
                    @endif
                </fieldset>
                <fieldset class="form-group">
                    <label for="password" class="col-md-4">Парола</label>
                    <input id="password" type="password" class="form-control" name="password" required>
                    @if ($errors->has('password'))
                        <p class="m-1 alert alert-danger">{{ $errors->first('password') }}</p>
                    @endif
                </fieldset>
                <fieldset class="form-group">
                    <label for="cb">
                        <input id="cb" type="checkbox"> Запомни ме
                    </label>
                </fieldset>
                <fieldset class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Влез!</button>
                </fieldset>                                                        
            </form>
        </div>
    </div>
</div>
@endsection
