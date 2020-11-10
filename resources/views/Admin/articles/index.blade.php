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
          <td>
            <a href="{{route('articles.show', $article->slug)}}">View</a>
            <a href="{{route('articles.edit', $article->slug)}}">Edit</a>
            <form class="" action="{{route('articles.destroy', $article->slug)}}" method="POST">
              @csrf
              @method("DELETE")

              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
