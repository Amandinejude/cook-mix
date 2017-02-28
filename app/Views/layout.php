<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">    
		<title>Cook and mix</title>
	    <!-- Bootstrap Core CSS -->
	    <link href=<?= $this->assetUrl('css/bootstrap/bootstrap.min.css')?> rel="stylesheet" type="text/css">
	    <!-- Retina.js - Load first for faster HQ mobile images. -->
	    <script src=<?= $this->assetUrl('js/plugins/retina/retina.min.js')?>></script>
	    <!-- Font Awesome -->
	    <link href=<?= $this->assetUrl('font-awesome/css/font-awesome.min.css')?> rel="stylesheet" type="text/css">
	    <!-- Default Fonts -->
	    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,600,500,700,800,900' rel='stylesheet' type='text/css'>
	     <!-- Plugin CSS -->
	    <link href=<?= $this->assetUrl('css/vitality-turquoise.css')?> rel="stylesheet" type="text/css"> 
	    <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css">
	    <link href=<?= $this->assetUrl('css/plugins/magnific-popup.css')?> rel="stylesheet" type="text/css">
	    <link href=<?= $this->assetUrl('css/plugins/background.css')?> rel="stylesheet" type="text/css">
	    <link href=<?= $this->assetUrl('css/plugins/animate.css')?> rel="stylesheet" type="text/css">
		
	    <script language="javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.min.js" type="text/javascript"></script>
	</head>
	<body>
		<div class="container">
			<header>
				<nav class="navbar navbar-inverse navbar-fixed-top navbar-expanded">
					<div style=" margin-left: 5%; margin-right: 5%; ">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand page-scroll" href=<?= $this->url('default_home') ?>><img src=<?= $this->assetUrl('img/creative/logo.png')?> class="img-responsive" alt=""></a>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right">
								<?php if(isset($_SESSION['user'])) : ?>
									<li><a href=<?= $this->url('showProfil') ?> ><?= $_SESSION['user']['us_name']?></a></li>
									<?php if($_SESSION['user']['us_type'] == "admin") 
										 echo '<li><a href='.$this->url('adminHome').'>Admin</a></li>';
										?>
									<li><a href=<?= $this->url('logout') ?> data-toggle="modal" >Déconnexion</a></li>
								<?php else :?>
									<li><a href="#signIn" data-toggle="modal" data-target="#signIn">Sign In</a></li>                                        
									<li><a href="#signUp" data-toggle="modal" data-target="#signUp">Sign Up</a></li>
								<?php endif ?>
							</ul>
						</div>
					</div>
				</nav>



				<div class="modal fade" id="signIn">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h4 class="modal-title">Sign In</h4>
							</div>
							<form id="loginForm" method="POST" action="<?= $this->url('login')?>">
								<div class="modal-body">
									<div id="signInModalAlertMsg" class="alert hide"></div>
									<div class="form-group">
										<label for="exampleInputEmail1">Email address</label>
										<input class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" type="text">
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Password</label>
										<input class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" type="password">
									</div>
								</div>
								<div class="modal-footer">
									<a href="#" data-dismiss="modal" class="btn">Close</a>
									<button type="submit" href="#" class="btn btn-primary">Log-in</button>
								</div>
							</form>
						</div>
					</div>
				</div>


				<div id="signUp" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title">Sign up</h4>
							</div>

							<div class="modal-body">
								<p>Inscrivez-vous pour essayer notre cook and mix app !!!!</p>
								<div id="signUpModalAlertMsg" class="alert hide"></div>
								<form id="signupForm" method="POST" action="<?= $this->url('register')?>">
									<div class="form-group">
										<input name="firstname" type="text" class="form-control" placeholder="First Name">
									</div>

									<div class="form-group">
										<input name="name" type="text" class="form-control" placeholder="Last Name">
									</div>
									<div class="form-group">
										<input name="email" type="email" class="form-control" placeholder="Email Address">
									</div>
									<div class="form-group">
										<input name="password" type="text" class="form-control" placeholder="Password">
									</div>
									<button type="submit" class="btn btn-primary">Submit</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</header>

			<section style="padding:0px">
			    </div>
			    <header style="background-image: url('assets/img/creative/bg-header.jpg');">
			        <div class="intro-content">
			            <div class="brand-name"> COOK&MIX </div>
			            <hr class="colored">
			            <div class="brand-name-subtext">Des recettes & des endroits pour les déguster.</div>
			        </div>

			        <!--Fenêtre modal d'inscription à la newsletter-->

			        <div id="myModal" class="modal fade">
			            <div class="modal-dialog">
			                <div class="modal-content">
			                    <div class="modal-header">
			                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			                        <h4 class="modal-title">Abonnez-vous à notre Newsletter</h4>
			                    </div>
			                    <div class="modal-body">
			                        <p>Abonnez-vous à notre liste de diffusion pour obtenir les dernières mises à jour directement dans votre boîte de réception.</p>
			                        <form>
			                            <div class="form-group">
			                                <input type="text" class="form-control" placeholder="Name">
			                            </div>
			                            <div class="form-group">
			                                <input type="email" class="form-control" placeholder="Email Address">
			                            </div>
			                            <button type="submit" class="btn btn-primary">Subscribe</button>
			                        </form>
			                    </div>
			                </div>
			            </div>
			        </div>     
			    </header>
				<?= $this->section('main_content') ?>
			</section>

			<footer class="footer" style="background-image: url('assets/img/bg-footer.jpg')">
				<div class="container text-center">
					<div class="row">
						<div class="col-md-4 contact-details">
							<h4><i class="fa fa-phone"></i> Téléphone</h4>
							<p><a href="tel:0142012554">+33 1 42 01 25 54</a></p>
						</div>
						<div class="col-md-4 contact-details">
							<h4><i class="fa fa-map-marker"></i> Adresse</h4>
							<p><a href="https://goo.gl/maps/8XqzxaiiiEk">8 rue Saint Vincent de Paul
							<br>Paris, 75014.</a></p>
						</div>
						<div class="col-md-4 contact-details">
							<h4><i class="fa fa-envelope"></i> Email</h4>
							<p><a href="mailto:mail@example.com">mail@cookandmix.com</a></p>
						</div>
					</div>

					<div class="row copyright">
						<div class="col-lg-12">
							<p class="small">&copy; 2017 Mike Christopher SYLVESTRE - Mon ROI et mon Dieu</p>
						</div>
					</div>
				</div>
			</footer>
		</div>
		    
	    <!-- Core Scripts -->
	    <script src=<?= $this->assetUrl('js/jquery.js')?>></script>
	    <script src=<?= $this->assetUrl('js/bootstrap/bootstrap.min.js')?>></script>
	    <!-- Plugin Scripts -->
	    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	    <script src=<?= $this->assetUrl('js/plugins/jquery.easing.min.js')?>></script>
	    <script src=<?= $this->assetUrl('js/plugins/classie.js')?>></script>
	    <script src=<?= $this->assetUrl('js/plugins/cbpAnimatedHeader.js')?>></script>
	    <script src=<?= $this->assetUrl('js/plugins/owl-carousel/owl.carousel.js')?>></script>
	    <script src=<?= $this->assetUrl('js/plugins/jquery.magnific-popup/jquery.magnific-popup.min.js')?>></script>
	    <script src=<?= $this->assetUrl('js/plugins/background/core.js')?>></script>
	    <script src=<?= $this->assetUrl('js/plugins/background/transition.js')?>></script>
	    <script src=<?= $this->assetUrl('js/plugins/background/background.js')?>></script>
	    <script src=<?= $this->assetUrl('js/plugins/jquery.mixitup.js')?>></script>
	    <script src=<?= $this->assetUrl('js/plugins/wow/wow.min.js')?>></script>
	    <script src=<?= $this->assetUrl('js/contact_me.js')?>></script>
	    <script src=<?= $this->assetUrl('js/plugins/jqBootstrapValidation.js')?>></script>
	    <!-- Vitality Theme Scripts -->
	    <script src=<?= $this->assetUrl('js/vitality.js')?>></script>
		<script src=<?= $this->assetUrl('js/script.js')?>></script>
	    <!--Pop up newsletter-->
	</body>
</html>