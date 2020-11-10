@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm">
        <h1>Crea il tuo articolo</h1>
        <form action="{{route('articles.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
          <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Inserisci il titolo" required>
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="subtitle">Sottotitolo</label>
            <input type="text" class="form-control" id="subtitle" placeholder="Inserisci un sottotitolo" required>
          </div>
          <div class="form-group">
            <label for="content">Contenuto</label>
            <textarea class="form-control" id="content" rows="3"></textarea>
          </div>
          <div class="form-group">
            <label for="excerpt">Estratto</label>
            <input type="text" class="form-control" id="excerpt" placeholder="Inserisci l'estratto" required>
          </div>
          <div class="form-group">
            <label for="keywords">Keywords</label>
            <input type="text" class="form-control" id="keywords" placeholder="Inserisci le keywords (max 5)" required>
            <div class="input-group mb-3">
          </div>
          <div class="input-group-prepend">
            <span class="input-group-text">Upload</span>
          </div>
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="image" accept="image/*" required>
            <label class="custom-file-label" for="image">Scegli il file</label>
          </div>
        </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
      </div>
    </div>
  </div>

@endsection
