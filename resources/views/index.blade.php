@extends('layouts.app')

@section('content')

<!-- About Section -->
<div class="bgimg-2 w3-container" style="padding:128px 16px" id="about">
  <h1 class="display-5 w3-center p-5">ACERCA DE NOSOTROS</h1>
  <div class="container jumbotron-fluid">
    <div class="w3-row-padding w3-justify p-5" style="margin-top:64px">
      <div class="w3-col">
        <p class="h1"><b>Somos un gran equipo de profesionales en las áreas de medicina, educación y trabajo
            comunitario, comprometidos a ofrecer nuestros mejores servicios, caracterizándonos con acciones de ayuda
            social y acompañamiento a las familias más vulnerables que buscan nuevas alternativas para el cuidado y la
            prevención de su salud. </b></p>
      </div>
    </div>
  </div>
</div>

<!-- Work Section -->
<div class="bgimg-3 w3-container" style="padding:128px 16px" id="work">
  <h3 class="display-5 w3-center p-5">Atenciones Médicas y Servicios</h3>

  <div class="container">
    <div class="row row-cols-2">
      <div class="col">
        <ul class="w3-ul w3-card-4 w3-black" style="opacity: 0.5">
          <li class="h5">Médicina General</li>
          <li class="h5">Médicina Familiar</li>
          <li class="h5">Gerontología</li>
          <li class="h5">Odontología</li>
          <li class="h5">Urología</li>
          <li class="h5">Ginecología</li>
          <li class="h5">Traumatología</li>
          <li class="h5">Optometría</li>
        </ul>
      </div>
      <div class="col">
        <ul class="w3-ul w3-card-4 w3-black" style="opacity: 0.5">
          <li class="h5">Psicología</li>
          <li class="h5">Terapia de Lenguaje</li>
          <li class="h5">Terapia Respiratoria</li>
          <li class="h5">Terapia Física</li>
          <li class="h5">Laboratorio Clínico</li>
          <li class="h5">Ecografía</li>
          <li class="h5">Enfermería</li>
          <li class="h5">Farmacía</li>
        </ul>
      </div>
    </div>
  </div>
</div>

<!-- Modal for full size images on click-->
<div id="modal01" class="w3-modal w3-black" onclick="this.style.display='none'">
  <span class="w3-button w3-xxlarge w3-black w3-padding-large w3-display-topright"
    title="Close Modal Image">&times;</span>
  <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
    <img id="img01" class="w3-image">
    <p id="caption" class="w3-opacity w3-large"></p>
  </div>
</div>

<!-- Contact Section -->
<div class="w3-container w3-light-grey" style="padding:128px 16px" id="contact">
  <h3 class="w3-center">¿Dónde nos encontramos?</h3>
  <p class="w3-center w3-large">Puede contactarnos por estos medios:</p>
  <div style="margin-top:48px">
    <p><i class="fa fa-map-marker fa-fw w3-xxlarge w3-margin-right"></i> By Pass y Calle "0" 120102 Babahoyo, Ecuador
    </p>
    <p><i class="fa fa-phone fa-fw w3-xxlarge w3-margin-right"></i> Télefono: (05) 257-2066</p>
    <p><i class="fa fa-envelope fa-fw w3-xxlarge w3-margin-right"> </i> Correo electrónico: cafsi0307cmlr@gmail.com</p>
    <br>
  </div>
</div>
@endsection