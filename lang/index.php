<?php 
include "login/model/conn.php";

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Food Health</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="../Chef/assets/css/sweetalert2.all.min.js"></script>
	<script src="../Chef/assets/css/sweetalert2.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../Chef/assets/css/sweetalert2.min.css">
  </head>
  <body>
				<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	    	<a class="navbar-brand" href="index.html">Food <span>Health<i class="fa fa-leaf"></i></span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="fa fa-bars"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	        	<li class="nav-item active"><a href="#" class="nav-link">Inicio</a></li>
	        	<li class="nav-item"><a href="about.html" class="nav-link">Acerca de</a></li>
	        	<li class="nav-item"><a href="pricing.html" class="nav-link">Planes</a></li>
	        	<li class="nav-item"><a href="services.html" class="nav-link">Servicios</a></li>
	            <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
	            <li class="nav-item"><a href="contact.html" class="nav-link">Contáctanos</a></li>
	            <li class="nav-item"><a href="login.html" class="nav-link">Iniciar Sesión</a></li>
	            <li class="nav-item"><a href="registrar.php" class="nav-link">Registrarse</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

    <div class="hero-wrap js-fullheight">
	    <div class="home-slider owl-carousel js-fullheight">
	      <div class="slider-item js-fullheight" style="background-image:url(images/bg_1.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row no-gutters slider-text align-items-center">
		          <div class="col-md-7 ftco-animate">
		          	<div class="text w-100">
		          		<h2>Bienvenido a Food Health</h2>
			            <h1 class="mb-4">Alimentate bien, vive tu vida feliz</h1>
			            <p><a href="#" class="btn btn-primary">ver mas</a> <a href="#" class="btn btn-white">Contáctanos</a></p>
		            </div>
		          </div>
		        </div>
	        </div>
	      </div>

	      <div class="slider-item js-fullheight" style="background-image:url(images/bg_2.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row no-gutters slider-text align-items-center">
		          <div class="col-md-7 ftco-animate">
		          	<div class="text w-100">
		          		<h2>Vida Feliz</h2>
			            <h1 class="mb-4 color-white">Conoce tu potencial con una buena nutrición</h1>
			            <p><a href="#" class="btn btn-primary">ver mas</a> <a href="#" class="btn btn-white">Contáctanos</a></p>
		            </div>
		          </div>
		        </div>
	        </div>
	      </div>

	      <div class="slider-item js-fullheight" style="background-image:url(images/bg_3.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row no-gutters slider-text align-items-center justify-content-end">
		          <div class="col-md-6 ftco-animate">
		          	<div class="text w-100">
		          		<h2>Bienvenido a Food Health</h2>
			            <h1 class="mb-4">Puedes transformar tu salud si cambias tus habitos</h1>
			            <p><a href="#" class="btn btn-primary">ver mas</a> <a href="#" class="btn btn-white">Contáctanos</a></p>
		            </div>
		          </div>
		        </div>
	        </div>
	      </div>
	    </div>
	  </div>
		
    <section class="ftco-section ftco-services">
    	<div class="container">
    		<div class="row">
          <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
            <div class="d-block services-wrap text-center">
              <div class="img" style="background-image: url(images/services-1.jpg);"></div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Programa de ejercicios</h3>
                <p>Disfruta de los videos que tenemos para que mejores tu condicion física</p>
                <p><a href="#" class="btn btn-primary btn-outline-primary">leer mas</a></p>
              </div>
            </div>      
          </div>
          <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
            <div class="d-block services-wrap text-center">
              <div class="img" style="background-image: url(images/services-2.jpg);"></div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Planes Nutricionales</h3>
                <p>Lleva una buena alimentacion, con los planes nutricionales que brindamos.</p>
                <p><a href="#" class="btn btn-primary btn-outline-primary">leer mas</a></p>
              </div>
            </div>    
          </div>
          <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
            <div class="d-block services-wrap text-center">
              <div class="img" style="background-image: url(images/services-3.jpg);"></div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Otras Opciones</h3>
                <p>Aqui va otra cosa</p>
                <p><a href="#" class="btn btn-primary btn-outline-primary">leer mas</a></p>
              </div>
            </div>      
          </div>
        </div>
    	</div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb bg-light">
			<div class="container">
				<div class="row no-gutters">
					<div class="col-md-5 p-md-5 img img-2 mt-5 mt-md-0" style="background-image: url(images/coach-1.jpg);">
					</div>
					<div class="col-md-7 wrap-about py-4 py-md-5 ftco-animate">
	          <div class="heading-section mb-5">
	          	<div class="pl-md-5">
		          	<span class="subheading mb-2">Bienvenido a Food Healt</span>
		            <h2 class="mb-2">Hola! Tú salud es lo mas importante para nosotros.</h2>
	            </div>
	          </div>
	          <div class="pl-md-5">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea ipsam ex eveniet possimus error aliquam magnam placeat, doloremque odit nesciunt maxime ullam saepe reprehenderit facilis, a totam, eligendi, sunt voluptatibus!</p>
							<div class="founder d-flex align-items-center mt-5">
								<div class="img" style="background-image: url(images/coach-1.jpg);"></div>
								<div class="text pl-3">
									<h3 class="mb-0">Alber Arango</h3>
									<span class="position">Personal Dietitian</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="ftco-section ftco-no-pt ftco-no-pb">
			<div class="container-fluid px-md-0">
				<div class="row no-gutters">
					<div class="col-md-3 d-flex align-items-stretch">
						<div class="consultation w-100 text-center px-4 px-md-5">
							<h3 class="mb-4">FoodHealth Servicios</h3>
							<p>A small river named Duden flows by their place and supplies</p>
							<a href="#" class="btn-custom">See Services</a>
						</div>
					</div>
					<div class="col-md-6 d-flex align-items-stretch">
						<div class="consultation consul w-100 px-4 px-md-5">
							<div class="text-center">
								<h3 class="mb-4">Consulta Gratis</h3>
							</div>

							<form action="registrar.php" class="appointment-form"  method="post" onsubmit="return registroCita();">
								<div class="row">
									<div class="col-md-12 col-lg-6 col-xl-4">
										<div class="form-group">
				    					<input type="text" id="nombreC" name="nombreC" class="form-control" placeholder="Nombre Completo" >
				    				</div>
									</div>
									<div class="col-md-12 col-lg-6 col-xl-4">
										<div class="form-group">
				    					<input type="text" id="apellidoC" name="apellidoC" class="form-control" placeholder="Apellido Completo">
				    				</div>
									</div>
									<div class="col-md-12 col-lg-6 col-xl-4">
										<div class="form-group">
				    					<div class="form-field">
		          					<div class="select-wrap">
		                      <div class="icon"><span class="fa fa-chevron-down"></span></div>
		                      <select class="form-control" name="sede" id="sede" >
		                      	<option value="" >Seleccione Sede</option>
							<?php 
                             $query = $conn -> query("SELECT * from sede");
                             while($row = mysqli_fetch_array($query))
                             	echo '<option value="'.$row[idSede] .'">'.$row[nombre].'</option>';
							 ?>
						   </select>
		                    </div>
				              </div>
				    				</div>
									</div>
									<div class="col-md-12 col-lg-6 col-xl-4">
										<div class="form-group">
				    					<div class="form-field">
		          					<div class="select-wrap">
		                      <div class="icon"><span class="fa fa-chevron-down"></span></div>
		                      <select class="form-control" name="nutri" id="nutri" >
		                      	<option value="" >Seleccione Nutricionista</option>
							<?php 
                             $query = $conn -> query("SELECT * from nutricionista");
                             while($row = mysqli_fetch_array($query))
                             	echo '<option value="'.$row[idNutricionista] .'">'.$row[nombres].' '.$row[apellidos].'</option>';
							 ?>
						   </select>
		                    </div>
				              </div>
				    				</div>
									</div>
									<div class="col-md-12 col-lg-6 col-xl-4">
										<div class="form-group">
				    					<div class="input-wrap">
				            		<div class="icon"><span class="ion-md-calendar"></span></div>
				            		<input type="text" name="date" id="date" class="form-control appointment_date" placeholder="Date">
			            		</div>
				    				</div>
									</div>
									<div class="col-md-12 col-lg-6 col-xl-4">
										<div class="form-group">
				    					<div class="input-wrap">
				            		<div class="icon"><span class="ion-ios-clock"></span></div>
				            		<input type="time" name="time" id="time" class="form-control " placeholder="Time">
			            		</div>
				    				</div>
									</div>
									<input name="valor" value="1" type="hidden">
									<div class="col-md-12 col-lg-6 col-xl-4">
										<div class="form-group">
				              <input type="submit" id="cita" name="cita" value="Cita" class="btn btn-white py-2 px-4" onclick="registroCita();">
				            </div>
									</div>
								</div>
		    			</form>
		    	  </div>
					</div>
					<div class="col-md-3 d-flex align-items-stretch">
						<div class="consultation w-100 text-center px-4 px-md-5">
							<h3 class="mb-4">Find A Health Expert</h3>
							<p>A small river named Duden flows by their place and supplies</p>
							<a href="#" class="btn-custom">Meet our food health</a>
						</div>
					</div>
				</div>
			</div>
		</section>


    <section class="ftco-section testimony-section bg-light">
      <div class="container">
        <div class="row justify-content-center pb-5 mb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading mb-3">Testimonios</span>
            <h2>Clientes Satisfechos &amp; Comentarios</h2>
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel">
							<div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img" style="background-image: url(images/person_1.jpg)">
                  </div>
                  <div class="text pl-4">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="fa fa-quote-left"></i>
                    </span>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Racky Henderson</p>
                    <span class="position">Father</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img" style="background-image: url(images/person_2.jpg)">
                  </div>
                  <div class="text pl-4">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="fa fa-quote-left"></i>
                    </span>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Henry Dee</p>
                    <span class="position">Businesswoman</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img" style="background-image: url(images/person_3.jpg)">
                  </div>
                  <div class="text pl-4">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="fa fa-quote-left"></i>
                    </span>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Mark Huff</p>
                    <span class="position">Businesswoman</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img" style="background-image: url(images/person_4.jpg)">
                  </div>
                  <div class="text pl-4">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="fa fa-quote-left"></i>
                    </span>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Rodel Golez</p>
                    <span class="position">Businesswoman</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img" style="background-image: url(images/person_1.jpg)">
                  </div>
                  <div class="text pl-4">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="fa fa-quote-left"></i>
                    </span>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Ken Bosh</p>
                    <span class="position">Businesswoman</span>
                  </div>
                </div>
              </div>
			</div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row justify-content-center pb-5 mb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading mb-3">Precios &amp; Planes</span>
            <h2>Elige Tus Planes Perfectos</h2>
          </div>
        </div>
    		<div class="row">
    			<div class="col-md-6 col-lg-3 ftco-animate">
	          <div class="block-7">
	            <div class="text-center">
	            	<h4 class="heading-2">Starter</h4>
	            	<span class="excerpt d-block">A Beautiful Healthcare</span>
		            <span class="price"><sup>$</sup> <span class="number">49</span></span>
		            
		            <ul class="pricing-text mb-5">
		              <li><span class="fa fa-check mr-2"></span>20 Workouts</li>
		              <li><span class="fa fa-check mr-2"></span>Meal plans in mobile</li>
		              <li><span class="fa fa-check mr-2"></span>One Coaching</li>
		              <li><span class="fa fa-check mr-2"></span>-50% Group coaching</li>
		              <li><span class="fa fa-check mr-2"></span>24/7 Customer support</li>
		            </ul>

		            <a href="#" class="btn btn-primary px-4 py-3">Get Started</a>
	            </div>
	          </div>
	        </div>
	        <div class="col-md-6 col-lg-3 ftco-animate">
	          <div class="block-7">
	            <div class="text-center">
            	<h4 class="heading-2">Standard</h4>
            	<span class="excerpt d-block">A Beautiful Healthcare</span>
	            <span class="price"><sup>$</sup> <span class="number">79</span></span>
	            
	            <ul class="pricing-text mb-5">
		              <li><span class="fa fa-check mr-2"></span>20 Workouts</li>
		              <li><span class="fa fa-check mr-2"></span>Meal plans in mobile</li>
		              <li><span class="fa fa-check mr-2"></span>One Coaching</li>
		              <li><span class="fa fa-check mr-2"></span>-50% Group coaching</li>
		              <li><span class="fa fa-check mr-2"></span>24/7 Customer support</li>
		            </ul>

	            <a href="#" class="btn btn-primary px-4 py-3">Get Started</a>
	            </div>
	          </div>
	        </div>
	        <div class="col-md-6 col-lg-3 ftco-animate">
	          <div class="block-7">
	            <div class="text-center">
            	<h4 class="heading-2">Premium</h4>
            	<span class="excerpt d-block">A Beautiful Healthcare</span>
	            <span class="price"><sup>$</sup> <span class="number">109</span></span>
	            
	            <ul class="pricing-text mb-5">
		              <li><span class="fa fa-check mr-2"></span>20 Workouts</li>
		              <li><span class="fa fa-check mr-2"></span>Meal plans in mobile</li>
		              <li><span class="fa fa-check mr-2"></span>One Coaching</li>
		              <li><span class="fa fa-check mr-2"></span>-50% Group coaching</li>
		              <li><span class="fa fa-check mr-2"></span>24/7 Customer support</li>
		            </ul>

	            <a href="#" class="btn btn-primary px-4 py-3">Get Started</a>
	            </div>
	          </div>
	        </div>
	        <div class="col-md-6 col-lg-3 ftco-animate">
	          <div class="block-7">
	            <div class="text-center">
            	<h4 class="heading-2">Platinum</h4>
            	<span class="excerpt d-block">A Beautiful Healthcare</span>
	            <span class="price"><sup>$</sup> <span class="number">159</span></span>
	            
	            <ul class="pricing-text mb-5">
		              <li><span class="fa fa-check mr-2"></span>20 Workouts</li>
		              <li><span class="fa fa-check mr-2"></span>Meal plans in mobile</li>
		              <li><span class="fa fa-check mr-2"></span>One Coaching</li>
		              <li><span class="fa fa-check mr-2"></span>-50% Group coaching</li>
		              <li><span class="fa fa-check mr-2"></span>24/7 Customer support</li>
		            </ul>

	            <a href="#" class="btn btn-primary px-4 py-3">Get Started</a>
	            </div>
	          </div>
	        </div>
	      </div>
    	</div>
    </section>

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center pb-5 mb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2>Ultimas Noticias De Nuestro Blog</h2>
            <span class="subheading">Noticias &amp; Blog</span>
          </div>
        </div>
        <div class="row d-flex">
          <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20 rounded" style="background-image: url('images/image_1.jpg');">
              </a>
              <div class="text mt-3">
              	<div class="meta mb-2">
                  <div><a href="#">January 30, 2020</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div>
                </div>
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20 rounded" style="background-image: url('images/image_2.jpg');">
              </a>
              <div class="text mt-3">
              	<div class="meta mb-2">
                  <div><a href="#">January 30, 2020</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div>
                </div>
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20 rounded" style="background-image: url('images/image_3.jpg');">
              </a>
              <div class="text mt-3">
              	<div class="meta mb-2">
                  <div><a href="#">January 30, 2020</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div>
                </div>
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
		

    <!-- <section class="ftco-section ftco-no-pb ftco-no-pt">
      <div class="container">
      	<div class="row">
	      	<div class="col-md-12">
	      		<div class="bg-secondary w-100 rounded p-4">
	        		<div class="row">
			          <div class="col-md-7 d-flex align-items-center">
			            <h2 class="mb-3 mb-sm-0" style="color:black; font-size: 18px;">Subcribe for our weekly tips</h2>
			          </div>
			          <div class="col-md-5 d-flex align-items-center">
			            <form action="#" class="subscribe-form">
			              <div class="form-group d-flex">
			                <input type="text" class="form-control" placeholder="Enter email address">
			                <input type="submit" value="Subscribe" class="submit px-3">
			              </div>
			            </form>
			          </div>
		          </div>
			      </div>
			    </div>
			  </div>
      </div>
    </section> -->



    <footer class="footer">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-10 col-lg-6">
						<div class="subscribe mb-5">
							<form action="#" class="subscribe-form">
                <div class="form-group d-flex">
                  <input type="text" class="form-control rounded-left" placeholder="Enter email address">
                  <input type="submit" value="Subscribe" class="form-control submit px-3">
                </div>
              </form>
						</div>
					</div>
				</div>

					
	
				<div class="row mt-5">
          <div class="col-md-6 col-lg-8">

            <p class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> Food Health</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
          <div class="col-md-6 col-lg-4 text-md-right">
          	<p class="mb-0 list-unstyled">
          		<a class="mr-md-3" href="#">Terms</a>
          		<a class="mr-md-3" href="#">Privacy</a>
          		<a class="mr-md-3" href="#">Compliances</a>
          	</p>
          </div>
        </div>
			</div>
		</footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="login/js/Mo.js"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>


    
  </body>
</html>