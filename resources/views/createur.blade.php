@extends('layouts.app')

@section('css')
  <link href="/css/projets.css" rel="stylesheet">
@endsection

@section('content')
<div class="headCreateur">
    <h1>{{$auteur->prenom}} {{$auteur->nom}}</h1>
    <h2>Promotion : {{$auteur->Year}}</h2>
</div>

@forelse($projets as $a)
@if($a->anonyme==0)
<article class="post">
  <div>
    <a href='/createur/{{$a->idAuteur}}'><span class="auteur">{{$a->nom}}</span></a>
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
<span class="finProjets">Cet utilisateur n'a pas posté de projet 😔</a> </span>
@endforelse
@endsection