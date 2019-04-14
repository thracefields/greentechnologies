@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2 class="alert alert-info">Привет, <strong>{{ Auth::user()-> name }}</strong>!</h2>
        </div>
    </div>
</div>
@endsection
