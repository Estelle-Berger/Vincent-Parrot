<?php
require_once('config.php');
$id = $_GET['id'];
$requete = $bdd->prepare("DELETE FROM avis WHERE avis_id = :id");
$requete->bindParam(':id', $id, PDO::PARAM_INT);
$requete->execute();
header("Location: ../admin_avis.php");
exit();
?>