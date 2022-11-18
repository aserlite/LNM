@extends('layouts.appV2')

@section('css')
  <link href="/css/invitation.css" rel="stylesheet">
@endsection

@section('content')
<div class="contentqrcode">
<span class="checkedfc">❌</span>
<p>{{$result}}</p>
</div>
@endsection
