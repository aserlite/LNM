@extends('layouts.appV1')


@section('content')
  <div class="login">
    <form action='/loginT' method='POST'>
      <input type='mail' name='mail' placeholder='e-mail'>
      <input type='password' name='pwd' placeholder='Mot de passe'>
      @csrf
      <label class="rememberme" for="rememberme"><input type="checkbox" id="rememberme" name="rememberme" value="rememberme"> Se souvenir de moi</label>
      <input type='submit' name='connecter' value='Connexion'>
    </form>
  </div>

  <div class="register">
    <span>Vous n'avez pas de compte ? <a href='/register'>Inscrivez-vous</a></span>
  </div>
@endsection('content')
