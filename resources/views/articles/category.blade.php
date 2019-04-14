@extends('layouts.app')

@section('content')

<h2>{{ $category->name }}</h2>
@if ($articles->count() > 0)
    <div class="container">
        <div class="row">
                <div class="col-md-10">
            @foreach($articles as $article)
            <div class="row align-items-center pt-2">
                <div class="col-md-4">
                    <img class="rounded" src="{{ asset('images/uploads/' . $article->image) }}" alt="">
                </div>
                <div class="col-md">
                    <h4>{{ $article->name }}</h4>
                    @isset($article->category->name)
                        <h6 class="text-muted font-italic">{{ $article->category->name }}</h6>
                    @endisset
                    <p>{{ mb_strlen($article->description) > 100 ? mb_substr($article->description, 0, 100) . '...' : $article->description }} <a href="{{ route('articles.show', $article->id) }}">Прочети повече</a></p>
                </div>
        </div>
            @endforeach

            <div class="p-2">{{ $articles->onEachSide(3)->links() }}</div>
            </div>
        </div>
    </div>            
    @else
    <p class="alert alert-info">Все още няма публикувани статии в тази категория. Очаквайте скоро!</p>
    @endif


   
@endsection