<?php
require_once('config.php');
$id = $_GET['id'];
$requete_cars = $bdd->prepare("DELETE FROM cars WHERE car_id = :id");
$requete_cars->bindParam(':id', $id, PDO::PARAM_INT);
$requete_cars->execute();
$requete_options_cars = $bdd->prepare("DELETE FROM options_cars WHERE car_id = :id");
$requete_options_cars->bindParam(':id', $id, PDO::PARAM_INT);
$requete_options_cars->execute();
header("Location: ../admin_cars.php");
exit();

?>