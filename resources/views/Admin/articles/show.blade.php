@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <h1>{{$article->title}}</h1>
      <div>
        {{$article->content}}
      </div>
    </div>
  </div>
@endsection
