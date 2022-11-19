@extends('layouts.appV2')

@section('css')
  <link href="/css/invitation.css" rel="stylesheet">
@endsection

@section('content')
<span class='baduser'>
    Cet utilisateur n'a pas l'autorisation de vérifier les invitations.
</span>
<a href="{{$url}}" class="baduserL">Retour</a>
@endsection
