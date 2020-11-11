
@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm">
      @foreach ($articles as $article)
        {{$article->user->name}}
      @endforeach
    </div>
  </div>
</div>
@endsection
