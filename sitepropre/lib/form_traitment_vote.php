<?php 

if(!empty($_POST)){

	if(!empty($_POST['vote'])){
		
		$sqlInsertVote = "INSERT INTO `comment`(`id_comment`, `star_comment`, `id_article`, `id_user`) VALUES (NULL,'".$_POST['vote']."','".$_GET['id_article']."','".$_SESSION['id_user']."')";
		// echo $sqlInsertVote;
		// exit;

		if(mysqli_query($connexion, $sqlInsertVote)){

			// echo "Vote ajouté";

		}else{

			// echo "Erreur de requete SQL";
		}       	
	}
}