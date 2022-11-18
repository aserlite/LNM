@extends('layouts.app')

@section('css')
  <link href="/css/invitation.css" rel="stylesheet">
@endsection

@section('content')
<div class="bvnhead">
  <span>On se revois le 5 Janvier {{$prenom}}</span>
</div>
<img src="https://api.qrserver.com/v1/create-qr-code/?data={{$url}}&color=254-250-221&bgcolor=13-15-44&format=png" alt="qrCodeInvitation" title="Invitation" class='qrcodeimg'/>
<span class="warningspan">Merci de ne pas essayer de lire le qr code (ça serait dommage de ne pas pouvoir rentrer)</span>
<a href='{{$url}}'>test</a>

@endsection
