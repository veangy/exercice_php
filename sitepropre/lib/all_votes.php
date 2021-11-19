<?php 

// recuperations de tous les votes
$sqlAllCommentsAll = "SELECT * FROM `comment`";
$tableAllCommentsAll = mysqli_query($connexion, $sqlAllCommentsAll);
$resultatAllCommentsAll = mysqli_fetch_all($tableAllCommentsAll, MYSQLI_ASSOC);

// echo "<pre>";
// print_r($resultatAllCommentsAll);
// echo "</pre>";


// echo "<pre>";
// print_r($resultatArticlesAll);
// echo "</pre>";
