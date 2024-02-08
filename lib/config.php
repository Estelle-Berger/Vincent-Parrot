<?php 

function linesToArray($string){
    return explode(PHP_EOL, $string);
}
// -----------------------------connexion à la bdd-----------------------------------
$dsn = "mysql:host=localhost;dbname=v_parrot";
$username = "root";
$password = "";

try{
    $bdd = new PDO($dsn, $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo "Erreur de connexion : ".$e->getMessage();
}
// ---------------------------insertion des services---------------------------------

if(isset($_POST['save_service'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $categorie = $_POST['categorie'];

    if(isset($_FILES['file'])){
        $tmpName = $_FILES['file']['tmp_name'];
        $image = './uploads/services/'.$title;
        move_uploaded_file($tmpName, $image);
    }
    else
        $image = './assets/images/default_service.jpg';


    $requete = $bdd->prepare("INSERT INTO services VALUES(0,:service_title, :service_description, :service_price, :image, :service_categorie)");
    $requete->execute(
        array(
            "service_title" => $title,
            "service_description" => $description,
            "service_price" => $price,
            "image" => $image,
            "service_categorie" => $categorie
        )
    );
    $_SESSION["message_delete"] = "Le service est supprimé";
    header("Location: ../admin_services.php");
}
// -----------------------------------les horaires---------------------------------------

if(isset($_POST['save_times'])){
    $hour_1 = $_POST['monday_open_am'];
    $hour_2 = $_POST['monday_closed_am'];
    $hour_3 = $_POST['monday_open_pm'];
    $hour_4 = $_POST['monday_closed_pm'];

    $requete = $bdd->prepare("DELETE FROM opening_hours; INSERT INTO opening_hours VALUES('Lundi', :hour_1, :hour_2, :hour_3, :hour_4)");
    $requete->execute(
        array(
            "hour_1" => $hour_1,
            "hour_2" => $hour_2,
            "hour_3" => $hour_3,
            "hour_4" => $hour_4
        )
        );

    $hour_1 = $_POST['tuesday_open_am'];
    $hour_2 = $_POST['tuesday_closed_am'];
    $hour_3 = $_POST['tuesday_open_pm'];
    $hour_4 = $_POST['tuesday_closed_pm'];

    $requete = $bdd->prepare("INSERT INTO opening_hours VALUES('Mardi', :hour_1, :hour_2, :hour_3, :hour_4)");
    $requete->execute(
        array(
            "hour_1" => $hour_1,
            "hour_2" => $hour_2,
            "hour_3" => $hour_3,
            "hour_4" => $hour_4
        )
        );

    $hour_1 = $_POST['wednesday_open_am'];
    $hour_2 = $_POST['wednesday_closed_am'];
    $hour_3 = $_POST['wednesday_open_pm'];
    $hour_4 = $_POST['wednesday_closed_pm'];

    $requete = $bdd->prepare("INSERT INTO opening_hours VALUES('Mercredi', :hour_1, :hour_2, :hour_3, :hour_4)");
    $requete->execute(
        array(
            "hour_1" => $hour_1,
            "hour_2" => $hour_2,
            "hour_3" => $hour_3,
            "hour_4" => $hour_4
        )
        );

    $hour_1 = $_POST['thursday_open_am'];
    $hour_2 = $_POST['thursday_closed_am'];
    $hour_3 = $_POST['thursday_open_pm'];
    $hour_4 = $_POST['thursday_closed_pm'];

    $requete = $bdd->prepare("INSERT INTO opening_hours VALUES('Jeudi', :hour_1, :hour_2, :hour_3, :hour_4)");
    $requete->execute(
        array(
            "hour_1" => $hour_1,
            "hour_2" => $hour_2,
            "hour_3" => $hour_3,
            "hour_4" => $hour_4
        )
        );

    $hour_1 = $_POST['friday_open_am'];
    $hour_2 = $_POST['friday_closed_am'];
    $hour_3 = $_POST['friday_open_pm'];
    $hour_4 = $_POST['friday_closed_pm'];

    $requete = $bdd->prepare("INSERT INTO opening_hours VALUES('Vendredi', :hour_1, :hour_2, :hour_3, :hour_4)");
    $requete->execute(
        array(
            "hour_1" => $hour_1,
            "hour_2" => $hour_2,
            "hour_3" => $hour_3,
            "hour_4" => $hour_4
        )
        );

    $hour_1 = $_POST['saturday_open_am'];
    $hour_2 = $_POST['saturday_closed_am'];
    $hour_3 = $_POST['saturday_open_pm'];
    $hour_4 = $_POST['saturday_closed_pm'];

    $requete = $bdd->prepare("INSERT INTO opening_hours VALUES('Samedi', :hour_1, :hour_2, :hour_3, :hour_4)");
    $requete->execute(
        array(
            "hour_1" => $hour_1,
            "hour_2" => $hour_2,
            "hour_3" => $hour_3,
            "hour_4" => $hour_4
        )
        );

    $hour_1 = $_POST['sunday_open_am'];
    $hour_2 = $_POST['sunday_closed_am'];
    $hour_3 = $_POST['sunday_open_pm'];
    $hour_4 = $_POST['sunday_closed_pm'];
    
    $requete = $bdd->prepare("INSERT INTO opening_hours VALUES('Dimanche', :hour_1, :hour_2, :hour_3, :hour_4)");
    $requete->execute(
        array(
            "hour_1" => $hour_1,
            "hour_2" => $hour_2,
            "hour_3" => $hour_3,
            "hour_4" => $hour_4
        )
    );
}