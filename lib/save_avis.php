<?php
require_once('config.php');
    $id = $_GET['id'];
    $requete_valid = $bdd->prepare("UPDATE avis SET is_valid = 0  WHERE avis_id = :id");
    $requete_valid->bindParam(':id', $id, PDO::PARAM_INT);
    $requete_valid->execute();
    header("Location: ../admin_avis.php");
    exit();


