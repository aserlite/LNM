<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram</title>
    <link href="/css/normalize.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link href="/public/css/style.css" rel="stylesheet">
    @section('css')

    @show


    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">

</head>

<body>

@section('topMenu')
  @include('layouts.topMenu')
@show

  <section class="content">
    @yield('content')
  </section>

@section('bottomMenu')
  @include('layouts.bottomMenu')
@show

</body>
</html>
