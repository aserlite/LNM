@extends('layouts.app')

@section('css')
  <link href="/css/invitation.css" rel="stylesheet">
@endsection

@section('content')
<div class="bvnhead">
  <span>On se revoit le 5 Janvier {{$prenom}}</span>
  {{$qrcode}}
</div>

<a href='{{$url}}'>test</a>
<a href='/test' class="dlinvit">Télecharger mon billet</a>
@endsection
