@extends('landing.layout')

@section('content')
  @include('partials.nav')
  @include('partials.header')
  <!-- About Section -->
  <div class="bgimg-2 w3-container" style="padding:128px 16px" id="about">
    <h1 class="display-5 w3-center p-5">ACERCA DE NOSOTROS</h1>
    <div class="container jumbotron-fluid">
      <div class="w3-row-padding w3-justify" style="margin-top:64px">
        <div class="w3-col-5">
          <p class="h1 ls-5"><b>Somos un gran equipo de profesionales en las áreas de medicina, educación y trabajo
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
</div>
@include('partials/footer')
@endsection