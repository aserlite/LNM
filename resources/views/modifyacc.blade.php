@extends('layouts.app')

@section('css')
  <link href="/css/modify.css" rel="stylesheet">
@endsection

@section('content')
<div class="modifyacc">
    <a href="/createur/{{$id}}" class="lienretour">Retour</a>
    <form action='/modifyaccT' method='POST'>
        @csrf
        <input type="link" name='linkedin' placeholder="Lien vers votre compte linkedin">
        <input type="link" name='portfolio' placeholder="Lien vers votre portfolio">
        <input type="submit" value="Envoyer">
    </form>
</div>
@endsection
