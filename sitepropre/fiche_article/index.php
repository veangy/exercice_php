
<?php 

session_start(); 
require_once('../lib/var.php');
require_once('../lib/connexion.php');

require_once('../lib/form_traitment_connexion.php');
require_once('../lib/form_traitment_inscription.php');
require_once('../lib/form_traitment_vote.php');

require_once('../lib/single_article.php');
require_once('../lib/all_articles_join_comments.php'); 
require_once('../lib/all_articles.php'); 
require_once('../lib/all_votes.php');

if(!empty($_POST)){
    if(!empty($_POST['decosub'])){
        session_unset();
        session_destroy();
    }
}
 

if(!empty($_SESSION['id_user'])){

    $sqlSelectVoteUser = "SELECT * FROM `comment` WHERE `id_user` ='".$_SESSION['id_user']."' AND `id_article` = '".$_GET['id_article']."'";
    // echo $sqlSelectVoteUser;
    $voteResultat = mysqli_query($connexion, $sqlSelectVoteUser);
    // echo $sqlSelectVoteUser;

} 
     ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Homepage - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <style type="text/css">
            .panel{
                 width: 20px;
                 margin-top: -10px;
                 margin-left: 10px;
                 cursor: pointer;
            }
            .voted{
                color: white;
                background: #ff7676;
                width: 100%;
                max-width: fit-content;
                padding: 12px;
                border-radius: 7px;
                font-size: 19px;
                font-weight: bold;
            }
        </style>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="../index.php">Start Bootstrap</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">All Products</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                                <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex">  
                        <?php  
                        if($connexion == true){ ?>
                            <!-- <button class="btn btn-outline-dark" type="submit">
                                <i class="bi-cart-fill me-1"></i>
                                Cart
                                <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                            </button> -->
                        <?php }else{ ?>
                            <!-- <button class="btn btn-outline-dark" type="submit" style="margin-left: 10px;">
                                <span>Connexion</span>
                            </button>  -->
                        <?php } ?>
                    </form>


                    <?php if(!empty($_SESSION['firstname']) && !empty($_SESSION['lastname'])) {?>
                        <p style="font-size: 25px;">
                            <b>Bienvenue</b> 
                            <span style="font-style: italic;font-size: 20px;">
                                <?php // echo $email; ?>
                                <?php echo $_SESSION['firstname']; ?>
                                <?php echo $_SESSION['lastname']; ?>
                                    
                                <form method="post" id="deco">
                                    <input type="submit" name="decosub" value="se déconnecter" style="    font-size: 9px;font-weight: bold;margin-top: 0;margin-bottom: 10px;margin-left: 10px;">
                                </form>
                            </span>
                            <?php if($_SESSION['admin'] == 1){ ?>
                            <a href="../panel">
                                <img class="panel" src="../assets/img/admin.png">
                            </a>
                            <?php } ?>
                        </p>
                    <?php }else{ ?>
                        <form id="formulaire_connexion" method="POST"> 
                            <label>Email :</label>
                            <input type="mail" name="email_connexion"> 
                            <label>Mot de passe :</label>
                            <input type="password" name="password_connexion">
                            <input type="submit" name="envoie" value="Envoie">
                        </form> 
                    <?php } ?>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <?php $title = ""; ?> 
                    <h1 class="display-4 fw-bolder"> E-commerce </h1>

                    <?php 

                    if($title == "") {
                        echo "<p class='lead fw-normal text-white-50 mb-0'>With this shop hompeage template</p>";
                    }
                    ?>

                </div>
            </div>
        </header>
        <div>
            <?php 

                // echo "<pre>";
                // print_r($resultat);
                // echo "</pre>";

                
            ?>
        </div>


        <?php if(empty($_SESSION['firstname']) && empty($_SESSION['lastname'])) {?>
     
        <style type="text/css">
            #inscription{
                display: flex;
                flex-flow: column wrap;
                width: 100%;
                max-width: 550px;
                margin: 0 auto;
                align-items: flex-end;
                padding: 20px;
                background-color: #c3c3c394;
                margin-top: 30px;
                margin-bottom: 231px;
                display: none;
            }    

            .active_form{
                padding: 3px;
                width: 100%;
                max-width: 200px;
                margin: 0 auto;
                text-align: center;
                margin-top: 50px;
                margin-bottom: 50px;
                background-color: #212529;
                font-weight: bold;
                border: solid 8px #5b7283;
                color: white;
                cursor: pointer;
            }

            .active_form p{
                margin-bottom: 0;
            }

            .row{
                margin-top: 70px;
            }
            
            
        </style>

        <div class="active_form">
            <p>Inscription</p>
        </div>
         
        <form id="inscription" method="post">
            <div>
                <label for="firstname">Prénom*</label>
                <input type="text" name="firstname" required>               
            </div>
    

            <div>
                <label for="firstname">Nom*</label>
                <input type="text" name="lastname" required>    
            </div>

            <div>
                <label for="firstname">Email*</label>
                <input type="email" name="email" required>    
            </div>

            <div>
                <label for="firstname">Mot de passe*</label>
                <input type="password" name="password" required>
            </div>

            <div>
                <label for="firstname">Confirmer votre mot de passe*</label>
                <input type="password" name="confirm_password" required>
            </div>

            <div>
               <input type="submit" name="envoie_form_inscription" value="S'inscrire">
            </div>

        </form>

        <?php } ?>
         
        <?php
        // echo "<pre>";
        // print_r($resultatArticlesAll);
        // echo "</pre>";       
        foreach ($resultatArticlesAll as $rlt) {
            if($_GET['id_article'] == $rlt['id_article']){

        ?>
        <?php 

            if(!empty($star_result[$rlt['id_article']]['star'])){
                $rlt['commentaire']['star'] = $star_result[$rlt['id_article']]['star'];
                $rlt['commentaire']['row'] = $star_result[$rlt['id_article']]['row'];
            } 

            ?>
            <!-- Product section-->
            <!-- Article principal -->
            <!-- Article + formulaire de vote -->
            <section class="py-5">
                <div class="container px-4 px-lg-5 my-5">
                    <div class="row gx-4 gx-lg-5 align-items-center">
                        <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="../panel/uploads/<?php echo $rlt['image_article']; ?>" alt="..." /></div>
                        <div class="col-md-6">
                            <div class="small mb-1">SKU: BST-498</div>
                            <h1 class="display-5 fw-bolder"><?php echo $rlt['title_article']; ?></h1>
                            <div class="fs-5 mb-5">
                                <span><?php echo $rlt['price_article']; ?>€</span>
                                <!-- <span>$40.00</span> -->
                            </div>
                            <p class="lead"><?php echo $rlt['description_article']; ?></p>
                            <p class="lead"><?php echo $rlt['text_article']; ?></p>
                               <?php  
                                if($nombre_de_vote > 0){
                                    
                                    $somme_vote = $star_result[$_GET['id_article']]['vote'];
                                    // echo $nombre_de_vote;
      
                                    $moyenne_vote = ($somme_vote / $nombre_de_vote);
                                    // echo $moyenne_vote;
                                } 
                                ?>
                             <div class="d-flex  small text-warning mb-2">
                              
                                    <?php
                                    if($nombre_de_vote > 0){

                                        if(is_float($moyenne_vote)){

                                            for($i=0; $i <  ($moyenne_vote-1); $i++) {  
                                                echo "<div class='bi-star-fill'></div>";
                                            }    

                                            echo "<div class='bi-star-half'></div>";
                                            // nous rajoutons une demi étoile SI la moyenne est décimale

                                            for($j=0; $j < (4-$moyenne_vote); $j++){
                                                echo "<div class='bi-star'></div>";
                                            }    

                                        }else{
                                            // exemple : moyenne vote = 3
                                            for($i=0; $i <  $moyenne_vote; $i++) {  
                                                // mon 'for' va faire 3 tours, tant que 3 est supérieur à $i
                                                echo "<div class='bi-star-fill'></div>";

                                            }

                                            for($j=0; $j < (5-$moyenne_vote); $j++){
                                                // si la moyenne est de 3, logiquement nous voulons afficher 2 étoiles vides, soit : 5 - 3
                                                // nous completons avec des étoiles vides soit 
                                                echo "<div class='bi-star'></div>";

                                            } 
                                        }  
                                    }

                                  ?>
                                    
                              
                                
                             </div> 

                                <?php if(!empty($_SESSION['id_user'])){ ?>
                                    <?php 
                                        if(mysqli_num_rows($voteResultat) > 0){ 
                                            echo "<p class='voted'>Vous avez déjà voté :) !</p>";
                                        }else{ ?>
                                        <div class="d-flex">
                                            <form method="post" class="d-flex" id="vote_form">
                                                <input name="vote" class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                                                <input name="submit" type="submit" class="btn btn-outline-dark flex-shrink-0" value="Vote !"/>
                                            </form>
                                        </div> 
                                        <?php } ?> 
                                <?php } ?>
                            <!-- <div class="d-flex" style="margin-top: 20px;">
                                <form class="d-flex">
                                    <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                                    <button class="btn btn-outline-dark flex-shrink-0" type="button">
                                        <i class="bi-cart-fill me-1"></i>
                                        Add to cart
                                    </button>
                                </form>
                            </div> -->
                        </div>
                    </div>
                </div>
            </section>
            <?php } ?>
        <?php } ?>

        <!-- Related items section-->
        <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Related products</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center"> 
                    <?php
                    

                    ?>
                    <?php foreach($resultat_article as $key_allarticles) {
                            if($key_allarticles['id_article'] != $_GET['id_article']){ 

                                $iteration = 0;


                                foreach($resultatAllCommentsAll as $key_vote => $value_vote){

                                    // je parcours la table des votes
                                    // dans le but d'ajouter chaque vote à l'id article correspondant
                                    // grace au "IF" ci-dessous

                                        if($value_vote['id_article'] == $key_allarticles['id_article']){
                                            // ON VERIFIE D ETRE BIEN DANS LE BON ID ARTICLE

                                            // echo "<pre>";
                                            // print_r($value_vote);
                                            // echo "</pre>";


                                            $key_allarticles['commentaire'][$iteration] = $value_vote;

                                            // tableau_des_articles['nouveau_tableau']['nombre_de_vote']
                                            //  = la table du vote qu'on boucle

                                            $iteration++;
                                            // nouveau tableau  += '5'
                                            // nouveau tableau  += '2' resultat = 7

                                        }
                                }

                                $somme_des_votes = 0; 
                                error_reporting(0);
                                // error_reporting : fonction pour afficher ou non les erreurs type : warning / notice de php

                                foreach($key_allarticles['commentaire'] as $article_vote){
                                    $somme_des_votes += $article_vote['star_comment'];
                                }  

                                // ici je parcours un sous tableau de la table article possedant tous les votes
                                // puis j'ajoute chaque clé VOTE à un variable puis les additionnes.


                                error_reporting(E_ALL);

                                // echo $somme_des_votes;


                                error_reporting(0);
                                // ici nous avions besoin de récuperer le nombre de vote inserer dans le tableau article
                                // Avec la méthode "sizeof" qui retourne le nombre de sous-tableau OU de clés 
                                // nous obtenons le nombre de vote précis pour l'opération

                                if($key_allarticles['commentaire'][0]){
                                    $nbr_votes = sizeof($key_allarticles['commentaire']);
                                    // echo "<br>".$nbr_votes;
                                }

                                error_reporting(E_ALL);

                                // $somme_des_votes;
                                // $nbr_votes

                                if($somme_des_votes > 0){
                                    $moyenne_des_votes = ($somme_des_votes / $nbr_votes);
                                    // echo $moyenne_des_votes;
                                }

                                // echo "<pre>";
                                // print_r($key_allarticles);
                                // echo "</pre>";

                                ?>
                        <!--  SI id_article (1) != du $_GET id article de l'url (2)   -->
                        <!--  alors j'affiche mon HTML                                -->
                            <div class="col mb-5">
                                <div class="card h-100">
                                    <!-- Product image-->
                                    <img class="card-img-top" src="../panel/uploads/<?php echo $key_allarticles['image_article']; ?>" alt="..." />
                                    <!-- Product details-->
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <!-- Product name-->
                                            <h5 class="fw-bolder"><?php echo $key_allarticles['title_article']; ?></h5>
                                            <!-- Product reviews-->
                                            <div class="d-flex justify-content-center small text-warning mb-2">
                                               <?php
                                                if($somme_des_votes > 0){

                                                    if(is_float($moyenne_des_votes)){

                                                        for($i=0; $i <  ($moyenne_des_votes-1); $i++) {  
                                                            echo "<div class='bi-star-fill'></div>";
                                                        }    

                                                        echo "<div class='bi-star-half'></div>";
                                                        // nous rajoutons une demi étoile SI la moyenne est décimale

                                                        for($j=0; $j < (4-$moyenne_des_votes); $j++){
                                                            echo "<div class='bi-star'></div>";
                                                        }    

                                                    }else{
                                                        // exemple : moyenne vote = 3
                                                        for($i=0; $i <  $moyenne_des_votes; $i++) {  
                                                            // mon 'for' va faire 3 tours, tant que 3 est supérieur à $i
                                                            echo "<div class='bi-star-fill'></div>";

                                                        }

                                                        for($j=0; $j < (5-$moyenne_des_votes); $j++){
                                                            // si la moyenne est de 3, logiquement nous voulons afficher 2 étoiles vides, soit : 5 - 3
                                                            // nous completons avec des étoiles vides soit 
                                                            echo "<div class='bi-star'></div>";

                                                        } 
                                                    }  
                                                }

                                              ?>
                                            </div>
                                            <!-- Product price-->
                                            <?php echo $key_allarticles['price_article']; ?>€
                                        </div>
                                    </div>
                                    <!-- Product actions-->
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="index.php?id_article=<?php echo $key_allarticles['id_article']; ?>">Add to cart</a></div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
         <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>

        <script type="text/javascript">
            var i = 1;
            $('.active_form').click(function(){
                i++;

                if(i%2){

                $('#inscription').css('display','none');
                }else{
                $('#inscription').css('display','flex');

                }
            })
        </script>
    </body>
</html>
