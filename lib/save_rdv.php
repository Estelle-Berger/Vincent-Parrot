<?php
require_once('config.php');

    $id = $_GET['id'];
    $by = $_SESSION['lastname'];
    $requete_deal = $bdd->prepare("UPDATE rdv SET deal = 0, dealby = UPPER(:dealby) WHERE rdv_id = :rdv_id");
    $requete_deal->execute(
        array(
            "rdv_id" => $id,
            "dealby" => $by
        )
    );
    header("Location: ../rdv.php");
    exit();
    



