@extends('layouts.topjc')

@section('css')
  <link href="/css/invitation.css" rel="stylesheet">
@endsection

@section('content')
<div class="bvnhead">
  <span>On se revoit le 5 Janvier {{$prenom}}</span>
  {{$qrcode}}
</div>

<a href='{{$url}}'>test</a>
<a href='/billet' class="dlinvit">Voir mon billet</a>
<a href='/dlbillet' class="dlinvit">Télecharger mon billet</a>
@endsection
