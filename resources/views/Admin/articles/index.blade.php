@extends('layouts.app')

@section('content')
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Titolo</th>
        <th scope="col">Slug</th>
        <th scope="col">Contenuto</th>
        <th>Azioni</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($articles as $article)
        <tr>
          <td>{{$article->title}}</td>
          <td>{{$article->slug}}</td>
          <td>{{$article->content}}</td>
          <td><a href="{{route('articles.show', $article->slug)}}">View</a>
            Edit Delete</td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
