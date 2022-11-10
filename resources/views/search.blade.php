@extends('layouts.app')

@section('css')
  <link href="/css/articles.css" rel="stylesheet">
@endsection

@section('topMenu')
<nav class="top">
<form class=search action='index.php' method='GET'>
  <input type='hidden' name='action' value="search">
  <input type='text' name='v' placeholder='Votre recherche' value="{{$v}}">
  <button type='submit' name='search' value='rechercher'><i class='bx bx-search'></i></button>
</form>
</nav>
@endsection

@section('content')
  @forelse($articles as $a)
    <article class="post">
      <div>
        <span class="auteur">{{$a['login']}}</span>
      </div>
      <a href="/articles&id={{$a['idAuteur']}}"><img src="{{$a['img_url']}}" /></a>
      <h3>{{$a['titre']}}</h3>
      <div class="desc">
        <span class="tags">{{$a['tags']}}</span>
        <a href="index.php"><i class='bx bx-message-rounded-dots'></i></a>
        <a href="index.php"><i class='bx bx-heart'></i></a>
      </div>
    </article>
  @empty
    <span>Aucun article</span>
  @endforelse
@endsection
