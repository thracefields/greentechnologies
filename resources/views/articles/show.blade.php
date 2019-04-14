@extends('layouts.app')

@section('title', 'Природните кътчета на България')

@section('content')
    @if (Session::has('success'))
        <p class="m-1 alert alert-success"><i class="fas fa-check"></i> {{ Session::get('success') }}</p>
    @endif
        <div class="row">
            <div class="col-md-8">
                <h1>{{ $article->name }}</h1>
                <div class="d-flex">
                    <span class="p-1">
                        <i class="fas fa-sitemap"></i> {{ $article->category->name }}
                    </span>
                    <span class="p-1">
                        <i class="far fa-clock"></i> {{ $article->created_at->format('d.m.Y G:i') }}</p>
                    </span>
                    <span class="p-1">
                        <i class="fas fa-eye"></i> {{  views($article)->count() }}
                    </span>
                </div>
                <img class="d-block mx-auto rounded" src="{{ asset('images/uploads/' . $article->image) }}" alt="">
                <p>@markdown($article->description)</p>
            </div>
        </div>
        
        <h2>Коментари</h1>
        @auth
        <div class="row mx-auto">
            <div class="col-md-6">
            <h3>Добави коментар</h3>
        <form action="{{ route('comments.store', $article->id) }}" method="POST">
            @csrf
            <fieldset class="form-group">
                <textarea class="form-control" name="comment" id="comment" cols="20" rows="5" required></textarea>
                @if ($errors->has('comment'))
                    <p class="m-1 alert alert-danger">{{ $errors->first('comment') }}</p>
                @endif
            </fieldset>
            <fieldset class="form-group">
                <button class="btn btn-success btn-block" type="submit">Изпрати</button>
            </fieldset>
        </form>
            </div>
        </div>
        @endauth
        @guest
         <p class="alert alert-danger">Само регистрирани потребители могат да пишат коментари.</p>
        @endguest
        @if($approved->count() > 0)
            @foreach($approved as $comment) 
            <div class="p-2">
                <p><strong>{{ $comment->commented->name }}</a></strong> | <span class="text-muted">{{ $comment->created_at->format('d.m.Y G:i') }}</span>
                    <p>{{ $comment->comment }}</p>
            </div>
            @endforeach
            {{ $approved->links() }}
        @else
            <p class="alert alert-info">Все още няма коментари. Напишете първия!</p>
        @endif
        
@endsection