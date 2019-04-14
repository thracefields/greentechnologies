@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-8">
            <h2>Вход</h2>
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                @csrf
                <fieldset class="form-group">
                    <label for="email">Имейл</label>
                    <div class="col-12 col-md-8">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                    </div>
                    @if ($errors->has('email'))
                        <p class="m-1 alert alert-danger">{{ $errors->first('email') }}</p>
                    @endif
                </fieldset>
                <fieldset class="form-group">
                    <label for="password">Парола</label>
                    <div class="col-12 col-md-8">
                        <input id="password" type="password" class="form-control" name="password" required>
                    </div>
                    @if ($errors->has('password'))
                        <p class="m-1 alert alert-danger">{{ $errors->first('password') }}</p>
                    @endif
                </fieldset>
                <fieldset class="form-group">
                    <div class="col-12 col-md-8">
                        <label for="cb">
                            <input id="cb" type="checkbox"> Запомни ме
                        </label>
                    </div> 
                </fieldset>
                <fieldset class="form-group">
                    <div class="col-12 col-md-8">
                        <button type="submit" class="btn btn-primary btn-block">Влез!</button>
                    </div>
                </fieldset>                                                        
            </form>
        </div>
    </div>
</div>
@endsection
