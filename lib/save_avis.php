<?php
require_once('config.php');

    $id = $_GET['id'];
    $requete = $bdd->prepare("INSERT INTO save_avis
    SELECT
        send_avis_id,
        avis,
        note,
        name,
        comment
    FROM send_avis
    WHERE send_avis_id=:id;
    DELETE FROM send_avis WHERE send_avis_id = :id;");

    $requete->bindParam(':id', $id, PDO::PARAM_INT);

    $requete->execute();
    header("Location: ../admin_avis.php");
    exit();


