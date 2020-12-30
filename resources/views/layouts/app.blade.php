<!DOCTYPE html>
<html>
<title>CAFSI | CLMR</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/css/app.css">
<style>
  body,
  h1,
  h2,
  h3,
  h4,
  h5,
  h6 {
    font-family: "Raleway", sans-serif
  }

  body,
  html {
    height: 100%;
    line-height: 1.8;
    background-color: whitesmoke;
  }

  /* Full height image header */
  .bgimg-1 {
    background-position: center;
    background-size: cover;
    background-image: url("img/photo-360622.jpg");
    min-height: 100%;
  }

  .bgimg-2 {
    background-position: center;
    background-size: cover;
    background-image: url("img/photo-48604.jpg");
    min-height: 100%;
  }

  .bgimg-3 {
    background-position: center;
    background-size: cover;
    background-image: url("img/photo-4299436.jpg");
    min-height: 100%;
  }

  .w3-bar .w3-button {
    padding: 16px;
  }
</style>

<body>

  <!-- Navbar (sit on top) -->
  <div class="w3-top">
    <div class="w3-bar w3-green w3-card" id="myNavbar">
      <a href="#home" class="w3-bar-item w3-wide"><img src="{{ asset('img/logoCAFSI.png') }}"
          class="rounded mx-auto d-block" style="width:40px;"></a>
      <div class="w3-left w3-hide-small">
        <a href="#home" class="w3-bar-item w3-button">Inicio</a>
        <a href="#about" class="w3-bar-item w3-button"><i class="fa fa-user"></i> Nosotros</a>
        <a href="#work" class="w3-bar-item w3-button"><i class="fa fa-th"></i> Servicios</a>
        <a href="#contact" class="w3-bar-item w3-button"><i class="fa fa-map-marker"></i> Localización</a>
      </div>
      <!-- Right-sided navbar links -->
      <div class="w3-right w3-hide-small">
        <a href="{{ url('/login') }}" class="w3-bar-item w3-button"><i class="fa fa-user"></i> Iniciar Sesión</a>
      </div>
      <!-- Hide right-floated links on small screens and replace them with a menu icon -->

      <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium"
        onclick="w3_open()">
        <i class="fa fa-bars"></i>
      </a>
    </div>
  </div>

  <!-- Sidebar on small screens when clicking the menu icon -->
  <nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large"
    style="display:none" id="mySidebar">
    <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close
      &times;</a>
    <a href="#home" onclick="w3_close()" class="w3-bar-item w3-button">Inicio</a>
    <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">Nosotros</a>
    <a href="#work" onclick="w3_close()" class="w3-bar-item w3-button">Servicios</a>
    <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button">Localización</a>
    <a href="{{ url('/login') }}" onclick="w3_close()" class="w3-bar-item w3-button">Iniciar Sesión</a>
  </nav>

  <!-- Header with full-height image -->
  <header class="bgimg-1 w3-display-container w3-grayscale-min" id="home">
    <div class="w3-display-left w3-text-white" style="padding:48px">
      <div class="container">
        <h1><span class="w3-jumbo w3-hide-small w3-hide-medium text text-dark">Centro de Atención y Formación en Salud
            Integral</span></h1>
        <h1><span class="w3-jumbo w3-hide-small w3-hide-medium text text-dark">"Carlos Luis Morales Reina"</span></h1>
      </div>
      <h1><span class="w3-xxlarge w3-hide-large text text-dark">Centro de Atención y Formación en Salud Integral</span>
      </h1>
      <h1><span class="w3-xxlarge w3-hide-large text text-dark">"Carlos Luis Morales Reina"</span></h1>
      <em><span class="w3-large text text-dark">Una opción, una alternativa para Usted y su familia.</span></em>
      <p><a href="#about"
          class="w3-button w3-white w3-padding-large w3-large w3-margin-top w3-opacity w3-hover-opacity-off">Conoce más
          de nosotros</a></p>
    </div>
    <div class="w3-display-bottomleft w3-text-grey w3-large" style="padding:24px 48px">
      <a href="https://www.facebook.com/CAFSICLMR"><i class="fa fa-facebook-official w3-hover-opacity"></i></a>
      <a href="https://www.youtube.com/channel/UC3nWTALubXI8zgdjHG4EOuA"><i
          class="fa fa-youtube w3-hover-opacity"></i></a>
      <a href="https://twitter.com/CAFSI_CLMR"><i class="fa fa-twitter w3-hover-opacity"></i></a>
    </div>
  </header>

  <div>
    @yield('content')
  </div>

  <!-- Footer -->
  <footer class="w3-black w3-padding-64">
    <div class="row">
      <div class="col-6 ml-5">
        <!-- Contact Section -->
        <div class="w3-container" style="padding:26px 0px 16px 40px" id="contact">
          <h3>¿Dónde nos encontramos?</h3>
          <p class="w3-large">Puede contactarnos por estos medios:</p>
          <div style="margin-top:48px">
            <p><i class="fa fa-map-marker fa-fw w3-xxlarge w3-margin-right"></i> By Pass y Calle "0" 120102 Babahoyo,
              Ecuador
            </p>
            <p><i class="fa fa-phone fa-fw w3-xxlarge w3-margin-right"></i> Télefono: (05) 257-2066</p>
            <p><i class="fa fa-envelope fa-fw w3-xxlarge w3-margin-right"> </i> Correo electrónico:
              cafsi0307cmlr@gmail.com</p>
            <br>
          </div>
        </div>
      </div>
      <div class="col-4">
        <div class="w3-container" style="padding:26px 0px 16px 40px">
          <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>Ir al Inicio</a>
          <div class="input-group mb-3 mt-5">
            <input type="text" class="form-control" placeholder="Email" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <button class="btn btn-primary" id="suscribe_button">Suscríbete al boletín</span>
          </div>
        </div>
      </div>
    </div>
    <p class="w3-center">Copyright ©2020-{{ date('Y')+1 }} All right Reserved | This web design was made with ♥ by
      Andreina Pérez</p>
  </footer>

  <script>
    // Modal Image Gallery
  function onClick(element) {
    document.getElementById("img01").src = element.src;
    document.getElementById("modal01").style.display = "block";
    var captionText = document.getElementById("caption");
    captionText.innerHTML = element.alt;
  }
  
  
  // Toggle between showing and hiding the sidebar when clicking the menu icon
  var mySidebar = document.getElementById("mySidebar");
  
  function w3_open() {
    if (mySidebar.style.display === 'block') {
      mySidebar.style.display = 'none';
    } else {
      mySidebar.style.display = 'block';
    }
  }
  
  // Close the sidebar with the close button
  function w3_close() {
      mySidebar.style.display = "none";
  }
  </script>
  <script src="/plugin/bootstrap/bootstrap.min.js"></script>
  <script src="/plugin/popper/popper.min.js"></script>
</body>

</html>