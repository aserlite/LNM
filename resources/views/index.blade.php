@extends('layouts.topj')

@section('css')
<link rel="stylesheet" href="/css/index.css">
@endsection

@section('content')

<div class="intro" >
  
  <h1>IUT de Lens</h1>
    <h1>5 Janvier 2023</h1>
    
    
    <h2>La nuit MMI</h2>
    <p>Événement communautaire pour le BUT MMI de Lens</p>
    <h1>19h - 23h</h1>


    <img src="images/lune.png">

    <section class="buttons">
      <a id="buttonresa">Je réserve mon billet</a>
    </section>
</div>

<i id="arrow" class='bx bxs-down-arrow' ></i>

<!-- concept -->
<div id="elements">
  <div class="toggleconcept">
    <h2>Concept</h2>
    <div class="concept">
      <p>La nuit MMI regroupe la communauté des étudiants, des anciens étudiants et des professeurs de la formation autour d’un événement haut en couleurs.</p>  
      <p>4 salles libre à la découverte exposeront les projets des actuels et anciens étudiants sur volontariat. </p>
      <p>L'occasion révée pour montrer vos talents.</p>
      <section class="buttons">
        <a id="button2">Fermer</a>
      </section>
    </div>
  </div>

<!-- programme -->
  <div class="toggleprogramme">
    <h2>Programme</h2>
    <div class="programme">
    <p>19h30 Amphitéatre MMI: début de la soirée.</p>  
    <p>20h00 salles X: Ouverture de l'exposition des travaux pendant toute la soirée et accès au buffet.</p>
    <p>22h00 Amphitéatre MMI: projection d'un court-métrage étudiant.</p>
    <section class="buttons">
      <a id="button2">Fermer</a>
      
    </section>
  </div>
@endsection