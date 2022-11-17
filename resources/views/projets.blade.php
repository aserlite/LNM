@extends('layouts.app')

@section('css')
  <link href="/css/projets.css" rel="stylesheet">
@endsection


@section('content')

  @forelse($projets as $a)
    <article class="post">
      <div>
        <span class="auteur">{{$a->nom}}</span>
      </div>
      <a href="/articles&id={{$a->idAuteur}}"><img src=".{{$a->img_url}}" /></a>
      <h3>{{$a->titre}}</h3>
      <div class="desc">
        <span class="tags">{{$a->tags}}</span>
        {{-- <a href=""><i class='bx bx-message-rounded-dots'></i></a>
        <a href=""><i class='bx bx-heart'></i></a> --}}
      </div>
    </article>
  @empty
    <span class="finProjets">Vous avez atteint nos limites, aidez nous a les dépasser en  <a href="/publish">déposant vos projets</a> </span>
  @endforelse
  <div class="selectpage">
    <a href="{{$url}}{{$nbpage-1}}" class="selectorP">-</a>
    <span>{{$nbpage}}</span>
    <a href="{{$url}}{{$nbpage+1}}" class="selectorP">+</a>
  </div>
@endsection
