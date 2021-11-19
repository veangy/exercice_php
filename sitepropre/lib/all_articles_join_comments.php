                         
<?php 
 
$sqlArticlesAll = "SELECT * FROM `article`";
$tableArticlesAll = mysqli_query($connexion, $sqlArticlesAll);
$resultatArticlesAll = mysqli_fetch_all($tableArticlesAll, MYSQLI_ASSOC);



// echo "<pre>";
// print_r($resultatArticlesAll);
// echo "</pre>";

// echo "<pre>";
// print_r($resultatCommentsAll);
// echo "</pre>";



// $test = 2;
// $test2 = 5;
// echo $test;
// echo "<br>";
// echo $test2;
// echo "<br>";
// $test2 += $test;
// echo $test2;
// echo "<br>";

	$sqlCommentsAll = "SELECT * FROM `comment` WHERE `id_article` ='".$_GET['id_article']."'";
	$tableCommentsAll = mysqli_query($connexion, $sqlCommentsAll);
	$resultatCommentsAll = mysqli_fetch_all($tableCommentsAll, MYSQLI_ASSOC);
 	// requete SQL pour table vote

	// je crée un nouveau tableau

	$nombre_de_vote = mysqli_num_rows($tableCommentsAll);


	// exit;
	error_reporting(0); 
	if($nombre_de_vote > 0){

		$star_result = array();

		foreach ($resultatCommentsAll as $key_comment => $value_comment) {
		// je lance un foreach pour parcourir le tableau de la requete SQL

			// echo "<pre>";
			// print_r($value_comment);
			// echo "</pre>";
				$star_result[$_GET['id_article']]['vote'] += $value_comment['star_comment'];
			// on insert les données du tableau de la requete SQL
			// dans un nouveau tableau créer au préalable 
			// tableau[clé que l'on définit] += (on additionne à chaque boucle) le vote de l'id_article
	 
		}
	}
	error_reporting(E_ALL); 

	// echo $nombre_de_vote;

	// echo "<pre>";
	// print_r($resultatCommentsAll);
	// echo "</pre>";

	
	// REQUETE pour recuper ALL vote
	
	$sqlCommentsAll = "SELECT * FROM `comment` WHERE `id_article` ='".$_GET['id_article']."'";
	$tableCommentsAll = mysqli_query($connexion, $sqlCommentsAll);
	$resultatCommentsAll = mysqli_fetch_all($tableCommentsAll, MYSQLI_ASSOC);

