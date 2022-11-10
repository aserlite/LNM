@extends('layouts.app')

@section('css')
  <link href="/css/actualites.css" rel="stylesheet">
@endsection


@section('content')
  <section class="actu">
  @forelse($articles as $a)
      <a href="/articles&id={{$a['idAuteur']}}">
        <img src="{{$a['img_url']}}" />
        <span>{{$a['login']}}</span>
      </a>
  @empty
    <span>Aucun article</span>
  @endforelse
</section>
@endsection
