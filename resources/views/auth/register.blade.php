@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-8">
            <h2>Регистрация</h2>
            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name">Име</label>

                            <div class="col-12 col-md-8">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                     <p class="m-1 alert alert-danger"> {{ $errors->first('name') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Имейл</label>

                            <div class="col-12 col-md-8">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <p class="m-1 alert alert-danger"> {{ $errors->first('email') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password">Парола</label>

                            <div class="col-12 col-md-8">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <p class="m-1 alert alert-danger"> {{ $errors->first('password') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">Повторете паролата</label>

                            <div class="col-12 col-md-8">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-12 col-md-8">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Регистрирай се!
                                </button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
</div>
@endsection