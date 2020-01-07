<?php  // mail('thomasrenaud533@gmail.com','test','Je suis le message de test')  
?>
<?php // header('content-type: text/html; charset=utf-8'); 
?>
<?php
require_once('functions/epreuvesFunctions.php') ?>


<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Testrequest</title>
    <link rel="icon" href="public/img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="public/css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="public/css/owl.carousel.min.css">
    <!-- themify CSS -->
    <link rel="stylesheet" href="public/css/themify-icons.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="public/css/flaticon.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="public/css/magnific-popup.css">
    <!-- swiper CSS -->
    
    <!-- style CSS -->
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/home.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
    <link rel="stylesheet" href="public/css/testimony_slide.css">
    <!--Link for modal--->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!--Link for reasearch SingIn traitement in Js-->
    <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="public/css/swiper.min.css">

</head>
<style>
    .inputFormulaire {
        margin-bottom: 5px;
    }

    @import url(https://fonts.googleapis.com/css?family=Noto+Sans);


    .input {
        position: relative;
        left: -9999px;
    }

    .label {
        display: block;
        position: relative;

        padding: 15px 30px 15px 62px;
        border: 3px solid #fff;
        border-radius: 100px;
        color: #fff;
        background-color: #28A745;
        box-shadow: 0 0 10px #F0500C;
        white-space: nowrap;
        cursor: pointer;
        user-select: none;
        transition: background-color .2s, box-shadow .2s;
        right: 40px;
    }

    .label::before {
        content: '';
        display: block;
        position: absolute;
        top: 10px;
        bottom: 10px;
        left: 10px;
        width: 32px;
        border: 3px solid #fff;
        border-radius: 100px;
        transition: background-color .2s;
    }

    .label:first-of-type {
        transform: translateX(-40px);
    }

    .label:last-of-type {
        transform: translateX(40px);
    }

    .label:hover,
    .input:focus+.label {
        box-shadow: 0 0 20px rgba(0, 0, 0, .6);
    }

    .input:checked+.label {
        background-color: #F0500C;
    }

    .input:checked+.label::before {
        background-color: white;
    }

    .sousDiv {
        display: none;
        width: 100%;
        margin-bottom: 10px;
    }


    .swiper-container {
      width: 100%;
      padding-top: 50px;
      padding-bottom: 50px;
    }
    .swiper-slide {
      background-position: center;
      background-size: cover;
      width: 200px;
      height: 200px;
      background-color:#fff;
    }


</style>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <img src="public/img/favicon.png" alt="logo"><span id='headerSiteName'>Testrequest</span>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item justify-content-end" id="navbarSupportedContent">
                            <ul class="navbar-nav align-items-center">
                                <li class="nav-item active">
                                    <a class="nav-link" href="index.php">Home</a>
                                </li>

                                <li class=" nav-item active ">
                                    <a class='btn_1 menuButton' href="#">Login</a>
                                </li>

                                <li class=" nav-item active  ">
                                    <a class="btn_1  menuButton" href="#" onclick="document.getElementById('id01').style.display='block'"> S'inscrire</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->

    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-xl-6">
                    <div class="banner_text">
                        <div class="banner_text_iner">

                            <h1>TestRequest</h1>
                            <p>Nous sommes une plate-forme qui vous accompagne dans vos études en mettant à votre disposition
                                des épreuves et des documents afin que vous ne manquiez de rien dans vos parcours académiques.</p>
                            <a href="#" class="btn_1">S'inscrire </a>
                            <a href="#voir_epreuve" class="btn_2">Voir les épreuves </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div></div>
    </section>
    <!-- banner part start-->
    <!--signIn code statart--->
    <?php require_once('public/signIn.php') ?>
    <!--End of signIn code --->

    <!-- upcoming_event part start-->
    <?php $packInfo = selectionDesEcolesNiveauxMatiere()  ?>
    <section>

        <div class="container">

            <div class='row'>
                <div class="col-lg-5">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form id="formulaireDeRecherche" method="POST" action="public/recherche.php">
                                <div>
                                    <!--  Niveaux Input--->
                                    <div><input id='niveauInput' name="niveaux" Autocomplete="off" type="text" class='ressearch_input inputFormulaire' placeholder='Niveaux'>
                                        <div id='sousNiveauInput' class='sousDiv ' style='overflow:auto ;display:none'>
                                            <?php
                                            sort($packInfo[0]);
                                            foreach ($packInfo[0]  as $Niveau) {
                                                echo '<p  class="sousDivElement aTraiter"  >' . $Niveau . '</p>';
                                            }
                                            ?>

                                        </div>
                                    </div>
                                    <!-- End  Niveaux Input -->
                                    <!--Formation Input-->
                                    <div><input id='formationInput' name="formation" Autocomplete="off" type="text" class='ressearch_input inputFormulaire' placeholder='Formation' style="display:none">
                                        <div id='sousFormationInput' class='sousDiv' style='overflow:auto ;display:none'>
                                            <?php
                                            sort($packInfo[3]);
                                            foreach ($packInfo[3] as $formation) {
                                                echo '<p  class="sousDivElement"  >' . $formation . '</p>';
                                            }
                                            ?>

                                        </div>
                                    </div>
                                    <!--End Formation Input-->

                                    <!--Matiere Input-->
                                    <div><input id='matiereInput' name="matiere" Autocomplete="off" type="text" class='ressearch_input inputFormulaire' placeholder='Matière'>
                                        <div id='sousMatiereInput' class='sousDiv' style='overflow:auto ;display:none'>
                                            <?php
                                            sort($packInfo[2]);
                                            foreach ($packInfo[2] as $matiere) {
                                                echo '<p  class="sousDivElement"  >' . $matiere . '</p>';
                                            }
                                            ?>

                                        </div>
                                    </div>
                                    <!--End Matiere Input-->

                                    <!-- Ecole Input -->
                                    <div><input id='ecoleInput' name="ecole" Autocomplete="off" type="text" class='ressearch_input inputFormulaire' placeholder='Ecole'>
                                        <div id='sousMatiereInput' class='sousDiv' style='overflow:auto ;display:none'>
                                            <?php
                                            sort($packInfo[1]);
                                            foreach ($packInfo[1] as $ecole) {
                                                echo '<p  class="sousDivElement"  >' . $ecole . '</p>';
                                            }
                                            ?>

                                        </div>
                                    </div>
                                    <!-- End Ecole Input-->

                                    <!--  Année Input -->
                                    <input name="annee" id='anneeInput' Autocomplete="off" class='ressearch_input inputFormulaire ' type="number" placeholder="Année" min="1995" max="2020">
                                    <!--End Année Input-->

                                    <!--Notion Input-->
                                    <input name="notion" id='notionInput' Autocomplete="off" class='ressearch_input inputFormulaire ' type="text" placeholder="Notions">

                                    <!--End Notion Input-->


                                </div>


                                <div>
                                    <input id="toggle1" type="checkbox" class="input" name="aller_loin" checked>
                                    <label for="toggle1" class="label" id="allerPlusLoin">Aller plus loin !</label>
                                </div>
                                <div><button class="button rounded-0 primary-bg text-white w-100 btn_1" type="submit" id="bouttonDeRecherche" name='bouttonDeRecherche'> Rechercher</button></div>



                            </form>
                        </aside>

                    </div>
                </div>
                <div class="col-lg-2">

                </div>
                <div class="col-lg-5" id="textMouvantDiv">
                    <div class="div">
                        <h1 id="h1Mouvant">Recherchez</h1>
                    </div><br>
                    <div class="div" style="top:30px;">
                        <h1 id="h1Mouvant">Et <span> Téléchargez <br> </span>Les épreuves <br> De votre choix <span>.</span></h1>
                    </div>
                </div>
            </div>
        </div>
        <section>

        </section>

        <!--Gestion de la recherche-->

        <!--Fin-->


        <!--Fin de la gestion de la recherche-->
        <!--::review_part start::-->
        <section id='voir_epreuve' class="special_cource padding_top" style='position:relative; bottom:85px;'>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5">
                        <div class="section_tittle text-center">

                            <h2>Les épreuves à la une</h2>
                        </div>
                    </div>
                </div>
        </section>
        <section style='position:relative;bottom:120px;'>
            <div class='container section_epreuve' >
                <!--//      Début de la premiere d'affichage des epreuves     //-->
                <?php afficherLesEpreuves() ?>
                <!--Fin-->
            </div>


        </section>

        <!-- learning part end-->

        <!-- member_counter counter start -->
        <section class="member_counter">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="single_member_counter">
                            <span class="counter">9024</span>
                            <h4>Nombre de téléchargement</h4>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="single_member_counter">
                            <span class="counter">160</span>
                            <h4> Nombre de travailleurs sur la plate-forme</h4>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="single_member_counter">
                            <span class="counter">1005</span>
                            <h4>Nombre d'épreuves disponible</h4>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="single_member_counter">
                            <span class="counter">720</span>
                            <h4>Nombre d'élève inscrit</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- member_counter counter end -->

        <!--::review_part start::-->
        <section class="testimonial_part" style="position:relative;top:100px">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xl-5">
                        <div class="section_tittle text-center">
                            <p>Avis de nos utilisateurs</p>
                            <h2>Que pensez vous de Test request ?</h2>
                        </div>
                    </div>
                </div>
                <!--Zone pour les témoignages-->
                <div class="row">
                    <div class="col-md-12">
                        <div id="testimonial-slider" class="owl-carousel">
                            <div class="testimonial">
                                <div class="pic">
                                    <img src="public/img/test_request_icone/etudiant_1.jpg">
                                    <h3 class="title">Romain</h3>
                                </div>
                                <div class="testimonial-profile">

                                    <span class="post">Etudiant à la FSA</span>
                                </div>
                                <p class="description">
                                    Coucou la famille , Test request m'a sauvé la vie .Je dispose maintenant grâce à cette plate-forme de toutes les ressources dont j'ai besoins dans mon apprentissage.Je recommande vraiment.Merci
                                </p>
                            </div>
                            <div class="testimonial">
                                <div class="pic">
                                    <img src="public/img/test_request_icone/etudiant_1.jpg">
                                    <h3 class="title">Florence</h3>
                                </div>
                                <div class="testimonial-profile">

                                    <span class="">Elève en Terminale</span>
                                </div>
                                <p class="description">
                                    Je suis élève en classe de Terminale et utilisateur de la plateforme TestRequest grâce à laquelle j'ai accès à de nombreuses épreuves .Je remercie et encourage les initiateurs de la-dite plateforme.Merci
                                </p>
                            </div>
                            <div class="testimonial">
                                <div class="pic">
                                    <img src="public/img/test_request_icone/etudiant_1.jpg">
                                    <h3 class="title">Bénédicte</h3>
                                </div>
                                <div class="testimonial-profile">

                                    <span class="post">Etudiante en Administration des Finances</span>
                                </div>
                                <p class="description">
                                    Salut , j'ai découvert tout récemment Test request et dès lors je l'ai adopté. Elle me facilite vraiment la vie.De ma chambre j'ai accès à une banque imprèssionnante de ressources .Je ne peux que remercié les initiateurs.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!--////           Fin du témoignage       //////-->
                </div>
        </section>


        <!-- footer part start-->
        <!-- footer part start-->
        <footer class="footer-area" style='position:relative;top:50px;'>
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-sm-6 col-md-4 col-xl-3">
                        <div class="single-footer-widget footer_1">
                            <a class="navbar-brand" href="index.html"> <img src="public/img/favicon.png" alt="logo" id='footerLogo'><span id='footerSiteName'>TestRequeste </span> </a>
                            <p>Petit text à mettre ou une note ,je ne sais pas encore </p>

                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-xl-4">
                        <div class="single-footer-widget footer_2">
                            <h4>Newsletter</h4>
                            <p>S'inscrire à notre Newsletter
                            </p>
                            <form action="#">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder='Enter email address' onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
                                        <div class="input-group-append">
                                            <button class="btn btn_1" type="button"><i class="ti-angle-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="social_icon">
                                <a href="#"> <i class="ti-facebook"></i> </a>
                                <a href="#"> <i class="ti-twitter-alt"></i> </a>
                                <a href="#"> <i class="ti-instagram"></i> </a>
                                <a href="#"> <i class="ti-skype"></i> </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-md-4">
                        <div class="single-footer-widget footer_2">
                            <h4>Nous contactez</h4>
                            <div class="contact_info">
                                <p><span> Addresse :</span> A remplir </p>
                                <p><span> Numéro :</span> +229 --------</p>
                                <p><span> Email : </span>a_remplir.com </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright_part_text text-center">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p class="footer-text m-0">
                                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                        Copyright &copy; 2019 All rights reserved </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- footer part end-->

        <!-- jquery plugins here-->
        <!-- jquery     -->


        <!-- popper js -->
        <script src="public/js/jquery-1.12.1.min.js"></script>
        <!-- bootstrap js -->
        <script src="public/js/bootstrap.min.js"></script>
        <!-- easing js -->
        <script src="public/js/jquery.magnific-popup.js"></script>
        <!-- swiper js -->

        <!-- swiper js -->
        <script src="public/js/masonry.pkgd.js"></script>
        <!-- particles js -->
        <script src="public/js/owl.carousel.min.js"></script>
        <script src="public/js/jquery.nice-select.min.js"></script>
        <!-- swiper js -->
        <script src="public/js/jquery.counterup.min.js"></script>
        <script src="public/js/waypoints.min.js"></script>
        <!-- custom js -->
        <script src="public/js/custom.js"></script>
        <script src="public/js/testimoy_slide.js"></script>
        <script src="./public/slick/slick.js" type="text/javascript" charset="utf-8"></script>
        <!--         <script src='./public/js/research.js'></script> -->

        <!-- Gestion de l'inscription des utilisateurs -->
        <script src='./public/js/signInCode.js'></script>

        <!---script for research-->
        <!--<script src='public/js/GestionRechercheDepreuve.js'></script>--->


        <script>
            var champsInput = document.querySelectorAll(".ressearch_input");
            var elementPourAfficherLeChampFormation = document.querySelectorAll(".aTraiter");
            var formationInput = document.querySelector("#formationInput");
            var ressearchInput = document.querySelectorAll(".ressearch_input");
            var allerPlusLoin = document.querySelector("#allerPlusLoin");
            var matiereInput = document.querySelector("#matiereInput") ; 
            var anneeInput = document.querySelector("#anneeInput") ; 
            var notionInput = document.querySelector("#notionInput") ;
            var ecoleInput = document.querySelector("#ecoleInput") ;
            var statusDesChampsDuBas = false ;  
            for (var k = 3; k < 6; k++) {
                ressearchInput[k].style.display = "none";
            }

            allerPlusLoin.addEventListener("click", function() {
                
                if (statusDesChampsDuBas == false) {
                   ecoleInput.style.display ="block" ;
                   anneeInput.style.display ="block" ; 
                   notionInput.style.display = "block" ; 
                   statusDesChampsDuBas = true ;  
                }
                else{
                    ecoleInput.style.display ="block" ;
                   anneeInput.style.display ="none" ; 
                   notionInput.style.display = "none" ; 
                   statusDesChampsDuBas = false ;  
                }
            })

            // Code pour la disparition et apparition du champ formation
            for (var l = 0; l < elementPourAfficherLeChampFormation.length; l++) {
                console.log(elementPourAfficherLeChampFormation[l]);
                var regex = /Licence/;
                if (regex.test(elementPourAfficherLeChampFormation[l].textContent) == true) {
                    elementPourAfficherLeChampFormation[l].addEventListener("click", function() {
                        formationInput.style.display = "block";
                    })
                } else {
                    elementPourAfficherLeChampFormation[l].addEventListener("click", function() {
                        formationInput.style.display = "none";
                    })
                }

            }




            // Gestion de l'affichage et de la disparrition des sous div





            for (var i = 0; i < 4; i++) {

                champsInput[i].addEventListener("click", function() {
                    var parent = this.parentNode;
                    sousDiv = parent.querySelector(".sousDiv");



                    if (sousDiv.style.display == "none") {
                        sousDiv.style.display = "block";
                        sousDivElement = sousDiv.querySelectorAll(".sousDivElement");
                        for (var j = 0; j < sousDivElement.length; j++) {
                            sousDivElement[j].addEventListener("click", function() {
                                var parent1 = this.parentNode;
                                var ancetre = parent1.parentNode;
                                var leChampInput = ancetre.children[0];
                                leChampInput.value = this.textContent;
                                parent1.style.display = "none";



                            })
                        }


                    } else if (sousDiv.style.display == "block") {
                        sousDiv.style.display = "none";
                    }
                })
            }



            var status = 0;
            var label = document.querySelector(".label");
            label.addEventListener("click", function() {
                if (status == 0) {
                    status = 1;

                } else {
                    status = 0;
                }

                if (status == 0) {
                    ;
                } else if (status == 1) {

                }
            })
        </script>

</body>

</html>