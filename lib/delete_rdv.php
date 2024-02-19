<?php
require_once('config.php');
$id = $_GET['id'];
$requete = $bdd->prepare("DELETE FROM rdv WHERE rdv_id = :id");
$requete->bindParam(':id', $id, PDO::PARAM_INT);
$requete->execute();
header("Location: ../admin_rdv.php");
exit();
?>