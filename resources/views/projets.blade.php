@extends('layouts.app')

@section('css')
  <link href="/css/projets.css" rel="stylesheet">
@endsection


@section('content')

  @forelse($projets as $a)
    @if($a->anonyme==1)
    <article class="post">
      <div>
        <span class="auteur">anonyme</span>
      </div>
      <img src=".{{$a->img_url}}" />
      <h3>{{$a->titre}}</h3>
      <div class="desc">
        <span class="tags">{{$a->tags}}</span>
      </div>
    </article>
    @else
    <article class="post">
      <div>
        <a href='/createur/{{$a->idAuteur}}'><span class="auteur">{{$a->prenom}} {{$a->nom}}</span></a>
      </div>
      @if(isset($a->lien))
        <a href="{{$a->lien}}"><img src=".{{$a->img_url}}" /></a>
      @else
      <img src=".{{$a->img_url}}" />
      @endif
      <h3>{{$a->titre}}</h3>
      <div class="desc">
        <span class="tags">{{$a->tags}}</span>
        {{-- <a href=""><i class='bx bx-message-rounded-dots'></i></a>
        <a href=""><i class='bx bx-heart'></i></a> --}}
      </div>
    </article>
  @endif
  @empty
    <span class="finProjets">Vous avez atteint nos limites, aidez nous a les dépasser en  <a href="/publish">déposant vos projets</a> </span>
  @endforelse
  <div class="selectpage">
    <a href="{{$url}}{{$nbpage-1}}" class="selectorP">-</a>
    <span>{{$nbpage}}</span>
    <a href="{{$url}}{{$nbpage+1}}" class="selectorP">+</a>
  </div>
@endsection
