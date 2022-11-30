@extends('layouts.appV1')


@section('content')
<div class="register">
  <form action='/registerT' method='POST'>
    @csrf
    <input type='mail' name='mail' placeholder='E-mail' required class="champsform">
    <div class="noms2">
    <input type='text' name='Prenom' placeholder='Prenom' required class="champsform">
    <input type='text' name='Nom' placeholder='Nom' required class="champsform">
    </div>
    <input type='password' name='pwd' placeholder='Mot de passe' required class="champsform">
    <input type='password' name='pwd1' placeholder='Confirmation du mot de passe' required class="champsform">
    <select name="year" required>
      <option value="-1">--Votre Promotion--</option>
      <option value="2022-2025">2022-2025</option>
      <option value="2021-2024">2021-2024</option>
      <option value="2020-2022">2020-2022</option>
      <option value="2019-2021">2019-2021</option>
      <option value="2018-2020">2018-2020</option>
      <option value="2017-2019">2017-2019</option>
      <option value="2016-2018">2016-2018</option>
      <option value="2015-2017">2015-2017</option>
      <option value="2014-2016">2014-2016</option>
      <option value="2013-2015">2013-2015</option>
      <option value="2012-2014">2012-2014</option>
      <option value="2011-2013">2011-2013</option>
      <option value="2010-2012">2010-2012</option>
      <option value="2009-2011">2009-2011</option>
      <option value="2008-2010">2008-2010</option>
      <option value="Avant 2008">Avant 2008</option>
    </select>
    <input type='text' name='linkedin' placeholder='Votre compte linkedin (optionel)' class="champsform">
    <input type='text' name='portfolio' placeholder='Votre portfolio (optionel)' class="champsform">
    
    <input type='submit' name='inscription' value="S'enregistrer">
  </form>
</div>

<div class="login">
  <span>Déjà inscrit ? <a href='/login'>Connectez-vous</a></span>
</div>
@endsection('content')
