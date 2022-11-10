@extends('layouts.app')

@section('css')
  <link href="/css/subscription.css" rel="stylesheet">
@endsection



@section('topMenu')
<nav class="top">
<form class=search action='index.php' method='GET'>
  <input type='hidden' name='action' value="subscription">
  <input type='text' name='v' placeholder='Rechercher un compte' value="{{$v}}">
  <button type='submit' name='search' value='rechercher'><i class='bx bx-search'></i></button>
</form>
</nav>
@endsection


@section('content')
    <section class="search">
    @if(!empty($searchUsers))
      <h2>Ma recherche</h2>
    @endif
    @foreach($searchUsers as $user)
      <div class=user>
          <span>
          <a href="/articles&id={{$user['id']}}">{{ $user['login']}}</a>
          @isset($user['dateAbonnement'])
            depuis le {{date('j F, Y', strtotime($user['dateAbonnement']))}}
          @endisset
          </span>
          @if(isset($user['idAmi']))
            <a class="subscribe" href="/delFriend&id={{$user['id']}}">se désabonner</a>
          @else
            <a class="subscribe" href="/addFriend&id={{$user['id']}}">s'abonner</a>
          @endif

      </div>

    @endforeach
    </section>
    <section class="friends">
    <h2>Mes abonnements</h2>
    @foreach($friendUsers as $user)
    <div class=user>
        <span>
        <a href="/articles&id={{$user['id']}}">{{ $user['login']}}</a>
        @isset($user['dateAbonnement'])
          depuis le {{date('j F, Y', strtotime($user['dateAbonnement']))}}
        @endisset
        </span>
          <a class="subscribe" href="/delFriend&id={{$user['id']}}">se désabonner</a>
      </div>
    @endforeach
    </section>
@endsection
