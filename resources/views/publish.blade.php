@extends('layouts.app')

@section('css')
  <link href="/css/publish.css" rel="stylesheet">
@endsection

@section('content')
  <div class="publish">
  <h3>Envie de faire partie de La Nuit MMI ?</h3>
  <span class="callToAction">Partagez Votre Projet</span>
  <form action='/publishT' method='POST' enctype="multipart/form-data">
    <input type='text' name='nom' placeholder='Nom de votre Projet'>
    @csrf
    <label class="file"><i class='bx bx-upload'></i>Charger une image<input type="file" id="file" name="img" accept="image/*"></label>
    <input type='number' name='anneeReal' placeholder='Année de Réalisation de votre Projet' min="1990" max="2023" >
    <input type='text' name='lien' placeholder='Lien vers votre projet (non obligatoire)'>
    <input type='submit' name='publish' value='Publier'>
  </form>
  </div>
@endsection