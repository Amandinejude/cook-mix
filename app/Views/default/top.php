<?php 
//debug($_SESSION);
if(isset($_SESSION['msg'])) {
    $message = $_SESSION['msg']['message'];
    $type = $_SESSION['msg']['type'];

    unset($_SESSION['msg']);
}
else $message = null;

?>
<!--<i class="fa fa-heart" aria-hidden="true"></i>-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
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
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <link href=<?= $this->assetUrl('css/plugins/magnific-popup.css')?> rel="stylesheet" type="text/css">
    <link href=<?= $this->assetUrl('css/plugins/background.css')?> rel="stylesheet" type="text/css">
    <link href=<?= $this->assetUrl('css/plugins/animate.css')?> rel="stylesheet" type="text/css">
    
    <!-- IE8 support for HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body id="page-top">
    <nav class="navbar navbar-inverse navbar-fixed-top navbar-expanded">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                    <img src=<?= $this->assetUrl('img/creative/logo.png')?> class="img-responsive" alt="">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">

                <?php if(isset($_SESSION['user'])) : ?>
                    <li><a href="<?= $this->url('showProfil') ?>" ><?= $_SESSION['user']['us_name']?></a></li>                                        
                    <li>
                        <a href="<?= $this->url('testLogout') ?>" data-toggle="modal" >Déconnexion</a
                    </li>

                <?php else :?>
                    <li><a href="#signIn" data-toggle="modal" data-target="#signIn">Sign In</a></li>                                        
                    <li>
                        <a href="#signUp" data-toggle="modal" data-target="#signUp">Sign Up</a
                    </li>
                <?php endif ?>
                </ul>
    </nav>



            <div class="modal fade" id="signIn">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title">Sign In</h4>
                    </div>
                    <form id="loginForm" method="POST" action="<?= $this->url('testLogin')?>">
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
                            <p>Sign up to try our cook and mix app!!!!</p>
                             <div id="signUpModalAlertMsg" class="alert hide"></div>
                            <form id="signupForm" method="POST" action="<?= $this->url('testRegister')?>">
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

            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
     <?php 
     if($message!=null) : ?>
     <div id="alertMsg2" class="alert alert-<?= $type ?>"><?= $message ?> </div>
     <?php endif; ?>
     <div id="alertMsg" class="alert hide"> </div>
    <header style="background-image: url('assets/img/creative/bg-header.jpg');">
        <div class="intro-content">
            <div class="brand-name">COOK&MIX</div>
            <hr class="colored">
            <div class="brand-name-subtext">Des recettes & des endroits pour les déguster.</div>
    
        </div>
       
<!--Fenêtre modal d'inscription à la newsletter-->
               
        <div id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Subscribe our Newsletter</h4>
                    </div>
                    <div class="modal-body">
                        <p>Subscribe to our mailing list to get the latest updates straight in your inbox.</p>
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