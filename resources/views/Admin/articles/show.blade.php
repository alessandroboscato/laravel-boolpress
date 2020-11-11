@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <h1>{{$article->title}}</h1>
      <div class="">
        <img src="{{asset('storage/'.$article->image)}}" alt="">
      </div>
      <div>
        {{$article->content}}
      </div>
    </div>
  </div>
@endsection
