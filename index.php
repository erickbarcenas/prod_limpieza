<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT users.id, users.name, users.email, users.password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
  <link
    href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:wght@500;600;700;900&display=swap"
    rel="stylesheet"
  />
  <link rel="stylesheet" href="static/css/style.css">
  <link rel="stylesheet" href="static/css/medias.css">
  <title>Promedik Textil</title>

</head>
<body>
  <!-- HEADER -->
  <!--<header class="hero">
    <nav class="border__bottom">
      <a href="index.html" class="logo">Promedik Textil</a>
      <form class="search">
          <div class="input__group">
              <input type="text" class="form__search" style="width:60%;" placeholder="Search">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                  <i class="fa fa-search"></i>
                </button>
              </div>
          </div>
      </form> 
      <ul class="nav_ul">
        <li><a href="nosotros.html">Nosotros</a></li>
      </ul>
    </nav>
  </header>-->

  <?php require 'partials/header.php' ?>


  <!---->

  

  <!---->

  <!-- MAIN -->
  <main class='main__container mt-2'>
    
    

    <section class="container__carousel">
      <div id="carousel">
        <img name="slider" width="500" height="250">
      </div>
    </section>

<!--
    <section class="list_horizontal_container">
      <ul class="render__items">
        <li class="chip">
          Todo
        </li>
        <li class="chip">
          Cubrebocas
        </li>
        <li class="chip">
          Batas
        </li>
      </ul>
    </section>
-->

    <div class="input__group">
      <input type="search" 
      id="searchbox" 
      class="form__search" 
      style="width:60%;" 
      placeholder="Buscar">
  
      <div class="input-group-append">
        <button class="btn__search"
          onclick="seach_product()"
        >
          <i class="fa fa-search"></i>
        </button>
      </div>
    </div>


    
    <div id="products"></div>
    <section class="container__cards">
      <div class="card" style="background-image: url('./static/imgs/productos/cubrebocas1.jpg');">
        <div class="texts">
          <h3>Cubrebocas 1</h3>
          <p>$3.00 c/u</p>
        </div>
        <!-- any keyword -->
      <span class="is-hidden">secret</span> 

      </div>

      <div class="card" style="background-image: url('./static/imgs/productos/cubrebocas2.jpg');">
        <div class="texts">
          <h3>Cubrebocas 2</h3>
          <p>$3.00 c/u</p>
        </div>
      </div>

      <div class="card" style="background-image: url('./static/imgs/productos/cubrebocas3.jpg');">
        <div class="texts">
          <h3>Cubrebocas 3</h3>
          <p>$3.00 c/u</p>
        </div>
      </div>

      <div class="card" style="background-image: url('./static/imgs/productos/cubrebocas4.jpg');">
        <div class="texts">
          <h3>Cubrebocas 4</h3>
          <p>$3.00 c/u</p>
        </div>
      </div>

      <div class="card" style="background-image: url('./static/imgs/productos/cubrebocas1.jpg');">
        <div class="texts">
          <h3>Cubrebocas 5</h3>
          <p>$3.00 c/u</p>
        </div>
      </div>

      <div class="card" style="background-image: url('./static/imgs/productos/cubrebocas2.jpg');">
        <div class="texts">
          <h3>Cubrebocas 6</h3>
          <p>$3.00 c/u</p>
        </div>
      </div>

      <div class="card" style="background-image: url('./static/imgs/productos/cubrebocas3.jpg');">
        <div class="texts">
          <h3>Cubrebocas 7</h3>
          <p>$3.00 c/u</p>
        </div>
      </div>

      <div class="card" style="background-image: url('./static/imgs/productos/cubrebocas4.jpg');">
        <div class="texts">
          <h3>Cubrebocas 8</h3>
          <p>$3.00 c/u</p>
        </div>
      </div>

      <div class="card" style="background-image: url('./static/imgs/productos/cubrebocas4.jpg');">
        <div class="texts">
          <h3>Cubrebocas 9</h3>
          <p>$3.00 c/u</p>
        </div>
      </div>
    </section>

    

    
    
    


    <div id="contact"></div>
    <div class="row_contacto" >
        <h2 class="text-centered text-brand">Contacto</h2>
        <p class="contact__subtitle">¡Nos encantaría saber de usted!</p>
    </div>
    

    <section class="contact-wrapper js-contactWrapper">
          <div class="contact-wrapper-top">
            <button class="contact__header js-contactButton is-show" type="button" data-name="reach-us">Contacto</button>
            <button class="contact__header js-contactButton" type="button" data-name="about-us">Nosotros</button>
            <button class="contact__header js-contactButton" type="button" data-name="find-us">Ubicación</button>
          </div>
          
        
          <div class="contact-wrapper-bottom">
            <div class="contact__content contact__content--form js-contactContent is-show" data-name="reach-us">
              <form method="POST"  class="form contact-form form__contact responsive">
                <div class="input-group">
                  <input 
                    type="text" 
                    name="name"
                    required=""
                    maxlength="34"
                    value=""
                    class="form-input" 
                    placeholder="Nombre">
                </div>
                
                <div class="input-group">
                  <input 
                    type="email" 
                    name="email"
                    required=""
                    maxlength="34"
                    value="" 
                    class="form-input" 
                    placeholder="Correo">
                </div>
  
                <div class="input-group">
                  <input 
                    type="text" 
                    name="whatsapp"
                    required=""
                    maxlength="34"
                    value="" 
                    class="form-input" 
                    placeholder="Whatsapp">
                </div>
  
                <div class="input-group">
                  <select name="course" class="form-input" type="text">
                    <option selected="" value="">Selecciona un tema</option>
                    <option value="1">Uniformes</option>
                    <option value="2">Cubrebocas</option>
                    <option value="3">Guantes</option>
                  </select>
                </div>
  
                <div class="input-group">
                  <textarea class="form__input" 
                    name="message" 
                    id="message" 
                    cols="30" 
                    rows="5" 
                    required="" 
                    value=""
                    placeholder="Mensaje"
                  >
                  </textarea>
                </div>
                
  
                <button type="submit" class="form-last-idx-ar-btn btn-send w100">
                  <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="paper-plane" class="svg-inline--fa fa-paper-plane fa-w-16 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                  <path fill="currentColor" d="M476 3.2L12.5 270.6c-18.1 10.4-15.8 35.6 2.2 43.2L121 358.4l287.3-253.2c5.5-4.9 13.3 2.6 8.6 8.3L176 407v80.5c0 23.6 28.5 32.9 42.5 15.8L282 426l124.6 52.2c14.2 6 30.4-2.9 33-18.2l72-432C515 7.8 493.3-6.8 476 3.2z"></path></svg>
                </button>
              </form>
            </div>

            <div id="about"></div>
            <div class="contact__content contact__content--about js-contactContent" data-name="about-us">
              <div class="about">
                <p class="about__title">Who are we?</p>
                <p class="about__desc">We love making stuffs. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facere, exercitationem laborum, eaque aliquid rem delectus facilis eos culpa, accusantium maxime saepe magni voluptatem illum ut dicta quis quam reprehenderit. Maiores.<br>We love making stuffs. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facere, exercitationem laborum, eaque aliquid rem delectus facilis eos culpa.</p>
              </div>
            </div>

            <div class="contact__content contact__content--map js-contactContent" data-name="find-us">
              <div class="about"><p class="about__title">Let's drink a coffee together!</p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d77979.65162748775!2d4.83392109458948!3d52.35474979514094!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c63fb5949a7755%3A0x6600fd4cb7c0af8d!2sAmsterdam%2C%20Hollanda!5e0!3m2!1str!2str!4v1628799479371!5m2!1str!2str" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy">
                </iframe>
              </div>
            </div>
          </div>

    </section>

  </main>

  <br>
  <br>

      <!-- FOOTER -->
  <div data-sal="fade" class="sticky-cta sal-animate" data-sal-delay="1000" id="modal__index">
    <div class="cta-container">
        <div class="cta">
        <button class="btn__transparent btn__text_gray" onclick="show_products()" >
          Ver productos
        </button>
        </div>
        <div class="cta whatsapp-color">
          <a rel="noopener noreferrer" target="_blank" href="https://api.whatsapp.com/send?phone=5212221495577&amp;text=¡Hola equipo Promedik! Quiero saber más sobre sus productos">
            Chatea con nosotros</a>
          </div>
    </div>
  </div>

  <footer>
    <div class='social__icons'>
        <a href="">
          <i class="fab fa-facebook-f icon"></i>
        </a>
        <a href="">
          <i class="fab fa-twitter icon"></i>
        </a>
        <a href="">
          <i class="fab fa-instagram icon"></i>
        </a>
    </div>

    

    <div class="policies">
        <a href="/">Política de privacidad</a>
        <a href="/">Condiciones de uso</a>
    </div>
    <div class="attribution">
        © 2022 Promedik Textil
        <!--<a href="#">Your Name Here</a>. -->
    </div>

    
  </footer>
  <script type="text/javascript" src="static/js/app.js"></script>
</body>
</html>