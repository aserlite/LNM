@extends('layouts.app')

@section('css')
  <link href="/css/invitation.css" rel="stylesheet">
@endsection

@section('content')
<div class="bvnhead">
  <span>On se revoit le 5 Janvier {{$prenom}}</span>
</div>
{{$qrcode}}
<span class="warningspan">Merci de ne pas essayer de lire le qr code (ça serait dommage de ne pas pouvoir rentrer)</span>
<a href='{{$url}}'>test</a>
<a href='/' class="dlinvit">Télecharger mon billet</a>
@endsection
