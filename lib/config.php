<?php 
session_start();
function linesToArray($string){
    return explode(PHP_EOL, $string);
}
function RandomString($nbchar)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < $nbchar; $i++) {
            $randstring = $randstring.$characters[rand(0, strlen($characters))];
        }
        return $randstring;
    }
// -----------------------------connexion à la bdd-----------------------------------
$dsn = "mysql:host=localhost;dbname=v_parrot";
$username = "root";
$password1 = "";

try{
    $bdd = new PDO($dsn, $username, $password1);
    $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo "Erreur de connexion : ".$e->getMessage();
}
#---------------------validation login-----------------
if($_SERVER["REQUEST_METHOD"] == "POST" AND isset($_POST['valid_login'])){
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    if($email != ""){
        // connexion à la bdd en tant qu'admin---------
        $requete_login = $bdd->prepare("SELECT*FROM users WHERE email = '$email' AND password = '$password'");
        $requete_login->execute();
        if ($requete_login->rowCount()==1){
            $user = $requete_login->fetch();
            if($user['password_system']==1){
                header("Location: ./password_employe.php");
                exit(); 
            }
            else{
            session_destroy();
            session_start();
            $_SESSION["isLogged"]=true;
            $_SESSION["User_Profil"]=$user['profil_categorie'];
            
            header("Location: ./admin_cars.php");
            exit(); 
        }
        }
        else{
            $error_msg = "Email ou mot de passe incorrect !";
        }
    };
}
// ----------------insertion des employés par l'administrateur---------------------------------

if(isset($_POST['save_employe'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = RandomString(8);
    if(isset($_POST['profil'])){
        $profil = $_POST['profil'];
    }
    else{
        $profil = '';
    }

    $requete = $bdd->prepare("INSERT INTO users VALUES(0, :prenom, :nom, :email, :password, 1, :profil)");
    $requete->execute(
        array(
            "prenom" => $firstname,
            "nom" => $lastname,
            "email" => $email,
            "password" => $password,
            "profil" => $profil
        )
    );
mail($email, 'V.parrot : Création de compte', "Bonjour, voici votre mot de passe temporaire : ".$password.".\n Il vous sera demandé de le modifier à la première connexion.");
}

if(isset($_POST['save_password'])){
    if((isset($_POST['password'])) AND (isset($_POST['password_confirm']))){
        $email_password = $_POST['email'];
        $password_employe = $_POST['password'];
        $password_confirm = $_POST['password_confirm'];
        if($password_employe == $password_confirm){
            $requete_email = $bdd->prepare("SELECT email FROM users WHERE email = '$email_password'");
            $requete_email->execute();
            if($requete_email-> rowCount() == 1){
                $requete_password = $bdd->prepare("UPDATE users SET password = :pass, password_system = 0 WHERE email = '$email_password'");
                $requete_password->execute(
                    array(
                        "pass" => $password_employe
                    )
                );
                header("Location:./login.php");
                exit();
            }
            else{
                $error_msg = 'Votre email est inconnu.';
            }
        }
        else {
            $error_msg = 'Vos mots de passe ne correspondent pas';
        }
    }
    else{
        $error_msg = 'Veuillez saisir et confirmer votre mot de passe.';
    }
}

// ---------------------------insertion des services---------------------------------

if(isset($_POST['save_service'])){
    unset($_SESSION["message_save"]);
    unset($_SESSION["message_delete"]);
    unset($_SESSION["message_erreur"]);
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $categorie = $_POST['categorie'];

    if(isset($_FILES['file'])){
        $tmpName = $_FILES['file']['tmp_name'];
        $image = './uploads/services/'.$title;
        move_uploaded_file($tmpName, $image);
    }
    else{
        $image = './assets/images/default_service.jpg';
    }
    try{
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
        $_SESSION["message_save"] = "Le service est rajouté";
        header("Location:./admin_services.php");
        }
        catch(PDOException $e){
            $_SESSION["message_erreur"] = "Le service n'est pas ajouté";
            header("Location: ./admin_services.php");
            }
}
//-----------------------------insertion des voitures---------------

if(isset($_POST['save_cars'])){
    unset($_SESSION["message_save"]);
    unset($_SESSION["message_delete"]);
    $marque = $_POST['marque'];
    $model = $_POST['model'];
    $kilometers = $_POST['kilometers'];
    $years = $_POST['years'];
    $price = $_POST['price'];
    $color = $_POST['color'];
    $energie = $_POST['energie'];
    
    if(isset($_FILES['file'])){
        $tmpName = $_FILES['file']['tmp_name'];
        $title = $_FILES['file']['name'];
        $image = './uploads/voitures/'.$title;
        move_uploaded_file($tmpName, $image);
    }
    else{
        $image = './assets/images/default_voiture.jpg';
    }

    //on renregistre la voiture
    $requete = $bdd->prepare("INSERT INTO cars VALUES(0, :marque, :model, :kilometers, :years, :price, :color, :energie, :image)");
    $requete->execute(
        array(
            "marque" => $marque,
            "model" => $model,
            "kilometers" => $kilometers,
            "years" => $years,
            "price" => $price,
            "color" => $color,
            "energie" => $energie,
            "image" => $image
        )
    );
    $_SESSION["message_save"] = "La voiture est rajoutée";
    header("Location:./admin_cars.php");
    //on recupere l'id de la voiture qu'on vient de créer
    $requete = $bdd->prepare("SELECT max(car_id) as id_max FROM cars");
    $requete->execute();
    $maxCars = $requete->fetch();
    $maxCars_id = $maxCars["id_max"];

    //on cherche les options checked et on les enregistre dans la table de liaison
    $requete = $bdd->prepare("SELECT * FROM options");
    $requete->execute();
    $listeOptions = $requete->fetchAll();

    foreach($listeOptions as $option){
        if (isset($_POST["option_".$option["option_id"]])){
            $requete = $bdd->prepare("INSERT INTO options_cars VALUES(:option_id, :cars_id)");
        $requete->execute(
            array(
                "option_id" => $option["option_id"],
                "cars_id" => $maxCars_id
            )
            );
        }
    }
}
//-------------------------------insertion des options---------------------------
if(isset($_POST['save_options'])){
    $option_name = $_POST['option'];

    $requete = $bdd->prepare("INSERT INTO options VALUES(0, :nom)");
    $requete->execute(
        array(
            "nom" => $option_name
        )
        );
}

$requete = $bdd->prepare("SELECT max(option_id) FROM options");
$requete->execute();
$maxOptions_id = $requete->fetchAll();

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
//----------------------------insertion des avis---------------------
if(isset($_POST['send_avis'])){
    $avis = $_POST['avis'];
    $note = $_COOKIE["valeur_etoile"];
    $name = $_POST['name'];
    $comment = $_POST['comment'];

    $requete = $bdd->prepare("INSERT INTO send_avis VALUES(0, :avis, :note, :name, :comment)");
    $requete->execute(
        array(
            "avis" => $avis,
            "note" => $note,
            "name" => $name,
            "comment" => $comment
        )
    );
} 

if(isset($_POST['save_rdv'])){
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $categorie = $_POST['categorie'];
    $comment = $_POST['comment'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $requete = $bdd->prepare("INSERT INTO rdv VALUES(0, :lastname, :firstname, :categorie, :comment, :phone, :email)");
    $requete->execute(
        array(
            "lastname" => $lastname,
            "firstname" => $firstname,
            "categorie" => $categorie,
            "comment" => $comment,
            "phone" => $phone,
            "email" => $email
        )
        );
}
