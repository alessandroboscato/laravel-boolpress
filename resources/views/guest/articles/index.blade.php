{{-- Index guests --}}
@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-sm">
      @foreach ($articles as $article)
        <div class="card text-center">
          <div class="card-header">
            {{$article->user->name}} {{$article->user->lastname}}
          </div>
          <div class="card-body">
            <h5 class="card-title">{{$article->title}}</h5>
            <p class="card-text">{{$article->subtitle}}</p>
            <a href="{{route('guests.articles.show', $article->slug)}}" class="btn btn-primary">Go to the article</a>
          </div>
          <div class="card-footer text-muted">
            {{$article->updated_at}}
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
