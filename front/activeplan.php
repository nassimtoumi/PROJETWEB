<?php
// On prolonge la session
session_start();
include "../ghaith/config.php";

// On teste si la variable de session existe et contient une valeur
if(empty($_SESSION['e']))
{
    // Si inexistante ou nulle, on redirige vers le formulaire de login
    header('Location: ../ghaith/views/connexion.php');
   }
   $sql="SELECT id_user FROM Utilisateur where email='" . $_SESSION['e']."' ";
      $db = config::getConnexion();
      
      try{
        //$liste = $db->query($sql);
        $req = $db->prepare($sql);
        $req->execute();
        $donnees = $req->fetch();
        $_SESSION['id']=$donnees['id_user'];
        
}

      catch (Exception $e){
        die('Erreur: '.$e->getMessage());
      }
      $sqll="SELECT type FROM abonnement where id_perso='" . $_SESSION['id']."' ";
      $dbb = config::getConnexion();
         try{
         //$liste = $db->query($sql);
        $reqq = $dbb->prepare($sqll);
        $reqq->execute();
        $donneess = $reqq->fetch();
        $_SESSION['type']=$donneess['type'];
            }

      catch (Exception $e){
        die('Erreur: '.$e->getMessage());
      }

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>projet</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400|Roboto:300,400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400|Roboto:300,400,700">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Article-List.css">
    <link rel="stylesheet" href="assets/css/Dark-Mode-Switch.css">
    <link rel="stylesheet" href="assets/css/Effective-Pricing-Cards-1.css">
    <link rel="stylesheet" href="assets/css/Effective-Pricing-Cards.css">
    <link rel="stylesheet" href="assets/css/Features-Boxed.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <link rel="stylesheet" href="assets/css/Multi-step-form.css">
    <link rel="stylesheet" href="assets/css/Neon.css">
    <link rel="stylesheet" href="assets/css/News-Cards-1.css">
    <link rel="stylesheet" href="assets/css/News-Cards.css">
    <link rel="stylesheet" href="assets/css/Parallax-Scroll-Effect.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/Social-Icons.css">
    <link rel="stylesheet" href="assets/css/sticky-dark-top-nav-with-dropdown.css">
    <link rel="stylesheet" href="assets/css/Testimonials.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>

<body style="background-image: url('assets/img/header1.jpg');">
    <div class="article-list">
        <div class="container">
            <div class="intro"></div>
        </div>
    </div>
    <div class="features-boxed"></div>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top" id="mainNav">
        <div class="container"><img src="assets/img/logo.png"><button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-align-justify"></i></button>
            <div
                class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="indexsession.html">About</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Services</a></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="nav-item"></li>
                    <li class="nav-item"><a class="nav-link" href="login.html">Profil</a></li>
                </ul>
        </div>
        </div>
    </nav>
    <div class="invisible social-icons"><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-youtube"></i></a></div>
    <div class="text-effect"></div><div class="pricing8 py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 text-center">
        <h3 class="mb-3">Active plan</h3>
        <h6 class="subtitle font-weight-normal"></h6>
      </div>
    </div>
    <!-- row  -->
    <div class="row mt-4">
      <!-- column  -->
        <?php
          if ($_SESSION['type']=="regular")
             {
               ?>
                <div class="col-md-4 ml-auto pricing-box align-self-center">
        <div class="card mb-4">
          <div class="card-body p-4 text-center">
                      <br>
            <h5 class="font-weight-normal">Regular Plan</h5>
            <sup>dt</sup><span class="text-dark display-5">0</span>
            <h6 class="font-weight-light font-14"></h6><br>
            <p class="mt-4">Get access to livestreams and participate in different events, forums and article section</p>
          </div><br>
        
          
        </div>
      </div>
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

              <?php

             }
          else if ($_SESSION['type']=="premium")

          {
            ?>
               <div class="col-md-4 ml-auto pricing-box align-self-center">
        <div class="card mb-4">
          <div class="card-body p-4 text-center"><br>
            <h5 class="font-weight-normal">Premium Plan</h5>
            <sup>dt</sup><span class="text-dark display-5">90</span><br>
            <h6 class="font-weight-light font-14">MONTHLY</h6><br>
            <div class="mt-4">get your regular plan activation + private coach +   full dietary guidance</div>
          </div><br>
         
        </div>
      </div>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             <?php
          }
           else if ($_SESSION['type']=="master")

          {
            ?>

            <div class="col-md-4 ml-auto pricing-box align-self-center">
        <div class="card mb-4">
          <div class="card-body p-4 text-center"><br>
            <h5 class="font-weight-normal">Master Plan</h5>
            <sup>dt</sup><span class="text-dark display-5">70</span><br>
            <h6 class="font-weight-light font-14">MONTHLY</h6><br>
            <div class="mt-4">get your regular plan + private coach</div>
          </div>
           
        </div>
      </div>
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             <?php
          }

         ?>
      <!-- column  -->

    </div><div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <form action="../front/updateab.html" ><button class="btn btn-info-gradiant p-3 btn-block border-0 text-white" name="type1" value="regular">modifier abonnement </button></form>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
      <div><form action="../me/views/supprimerabonnement.php" ><button class="btn btn-info-gradiant p-3 btn-block border-0 text-white" name="type1" value="regular">supprimer abonnement </button> </form> </div>
  </div>
</div>
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="section-heading">Let's Get In Touch!</h2>
                    <hr class="my-4">
                    <p class="mb-5">Contact us for more info !</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 ml-auto text-center"><i class="fa fa-phone fa-3x mb-3 sr-contact" data-aos="zoom-in" data-aos-duration="300" data-aos-once="true"></i>
                    <p>956-423-351</p>
                </div>
                <div class="col-lg-4 mr-auto text-center"><i class="fa fa-envelope-o fa-3x mb-3 sr-contact" data-aos="zoom-in" data-aos-duration="300" data-aos-delay="300" data-aos-once="true"></i>
                    <p><a href="mailto:your-email@your-domain.com">sporthub@gmail.com</a></p>
                </div>
            </div>
        </div>
    </section>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/creative.js"></script>
    <script src="assets/js/Dark-Mode-Switch.js"></script>
    <script src="assets/js/Multi-step-form.js"></script>
</body>

</html>