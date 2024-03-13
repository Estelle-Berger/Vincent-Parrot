<?php 
session_start();
// ---------csrf-------------
function generate_token(){
    return bin2hex((random_bytes(32)));
}
function is_valid_token($token){
    return isset($_SESSION['token']) && hash_equals($_SESSION['token'],$token);
}
if (!isset($_SESSION['token'])){
    $_SESSION['token'] = generate_token();
}
// -------------------------------------------
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
    if(!is_valid_token($_POST['token'])){
        die("erreur CSRF détectée");
    }
    else{
    $email = $_POST['email'];
    $email_save = htmlspecialchars($email, ENT_QUOTES,'UTF-8');
    $password = $_POST['password'];
    $password_save = htmlspecialchars($password, ENT_QUOTES,'UTF-8');
    if($email != ""){
        // connexion à la bdd en tant qu'admin---------
        $requete_login = $bdd->prepare("SELECT*FROM users WHERE email = '$email_save' AND password = '$password_save'");
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
                $_SESSION["lastname"]=$user['lastname'];
                $_SESSION["User_Profil"]=$user['profil_categorie'];
                
                header("Location: ./admin_cars.php");
                exit(); 
            }
        }
        else{
            $error_msg = "Email ou mot de passe incorrect !";
        }
    };}
}
// ----------------insertion des employés par l'administrateur---------------------------------

if(isset($_POST['save_employe'])){
    if(!is_valid_token($_POST['token'])){
        die("erreur CSRF détectée");
    }
    else{
    unset($_SESSION[$error_msg]);
    $firstname = $_POST['firstname'];
    $firstname_save = htmlspecialchars($firstname, ENT_QUOTES,'UTF-8');
    $lastname = $_POST['lastname'];
    $lastname_save = htmlspecialchars($lastname, ENT_QUOTES,'UTF-8');
    $email = $_POST['email'];
    $email_save = htmlspecialchars($email, ENT_QUOTES,'UTF-8');
// ---------------------------------------------------------------------florian est ce que htmlspecialchars ici est utile puisqu'il y a randomstring??-------------------------------------------------------
    $password = RandomString(8);
    $password_save = htmlspecialchars($password, ENT_QUOTES,'UTF-8');

    if(isset($_POST['profil'])){
        $profil = $_POST['profil'];
        $profil_save = htmlspecialchars($profil, ENT_QUOTES,'UTF-8');
    }
    else{
        $profil_save = '';
    }

    $requete = $bdd->prepare("INSERT INTO users VALUES(0, :prenom, :nom, :email, :password, 1, :profil)");
    $requete->execute(
        array(
            "prenom" => $firstname_save,
            "nom" => $lastname_save,
            "email" => $email_password,
            "password" => $password_save,
            "profil" => $profil_save
        )
    );}
mail($email_save, 'V.parrot : Création de compte', "Bonjour, voici votre mot de passe temporaire : ".$password_save.".\n Il vous sera demandé de le modifier à la première connexion.");
}

if(isset($_POST['save_password'])){
    if(!is_valid_token($_POST['token'])){
        die("erreur CSRF détectée");
    }
    else{
    if((isset($_POST['password'])) AND (isset($_POST['password_confirm']))){
        $email_password = $_POST['email'];
        $email_password_save = htmlspecialchars($email_password, ENT_QUOTES,'UTF-8');
        $password_employe = $_POST['password'];
        $password_employe_save = htmlspecialchars($password_employe, ENT_QUOTES,'UTF-8');
        $password_confirm = $_POST['password_confirm'];
        $password_confirm_save = htmlspecialchars($password_confirm, ENT_QUOTES,'UTF-8');
        if($password_employe_save == $password_confirm_save){
            $requete_email = $bdd->prepare("SELECT email FROM users WHERE email = '$email_password_save'");
            $requete_email->execute();
            if($requete_email-> rowCount() == 1){
                $requete_password = $bdd->prepare("UPDATE users SET password = :pass, password_system = 0 WHERE email = '$email_password_save'");
                $requete_password->execute(
                    array(
                        "pass" => $password_employe_save
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
    };}
}

// ---------------------------insertion des services---------------------------------

if(isset($_POST['save_service'])){
    if(!is_valid_token($_POST['token'])){
        die("erreur CSRF détectée");
    }
    else{
    unset($_SESSION["message_save"]);
    unset($_SESSION["message_delete"]);
    unset($_SESSION["message_erreur"]);
    $title = $_POST['title'];
    $title_save = htmlspecialchars($title, ENT_QUOTES,'UTF-8');
    $description = $_POST['description'];
    $description_save = htmlspecialchars($description, ENT_QUOTES,'UTF-8');
    $price = $_POST['price'];
    $price_save = htmlspecialchars($price, ENT_QUOTES,'UTF-8');
    $categorie = $_POST['categorie'];
    $categorie_save = htmlspecialchars($categorie, ENT_QUOTES,'UTF-8');

    if(isset($_FILES['file'])){
        $tmpName = $_FILES['file']['tmp_name'];
        $image = './uploads/services/'.$title_save;
        $image_save = htmlspecialchars($image, ENT_QUOTES,'UTF-8');
        move_uploaded_file($tmpName, $image_save);
    }
    else{
        $image_save = './assets/images/default_service.jpg';
    }
    try{
    $requete = $bdd->prepare("INSERT INTO services VALUES(0,:service_title, :service_description, :service_price, :image, :service_categorie)");
    $requete->execute(
        array(
            "service_title" => $title_save,
            "service_description" => $description_save,
            "service_price" => $price_save,
            "image" => $image_save,
            "service_categorie" => $categorie_save
        )
        
        );
        $_SESSION["message_save"] = "Le service est rajouté";
        header("Location:./admin_services.php");
        }
        catch(PDOException $e){
            $_SESSION["message_erreur"] = "Le service n'est pas ajouté";
            header("Location: ./admin_services.php");
            };}
}
//-----------------------------insertion des voitures---------------

if(isset($_POST['save_cars'])){
    if(!is_valid_token($_POST['token'])){
        die("erreur CSRF détectée");
    }
    else{
    unset($_SESSION["message_save"]);
    unset($_SESSION["message_delete"]);
    $marque = $_POST['marque'];
    $marque_save = htmlspecialchars($marque, ENT_QUOTES,'UTF-8');
    $model = $_POST['model'];
    $model_save = htmlspecialchars($model, ENT_QUOTES,'UTF-8');
    $kilometers = $_POST['kilometers'];
    $kilometers_save = htmlspecialchars($kilometers, ENT_QUOTES,'UTF-8');
    $years = $_POST['years'];
    $years_save = htmlspecialchars($years, ENT_QUOTES,'UTF-8');
    $price = $_POST['price'];
    $price_save = htmlspecialchars($price, ENT_QUOTES,'UTF-8');
    $color = $_POST['color'];
    $color_save = htmlspecialchars($color, ENT_QUOTES,'UTF-8');
    $energie = $_POST['energie'];
    $energie_save = htmlspecialchars($energie, ENT_QUOTES,'UTF-8');
    
    if(isset($_FILES['file'])){
        $tmpName = $_FILES['file']['tmp_name'];
        $title = $_FILES['file']['name'];
        $title_save = htmlspecialchars($title, ENT_QUOTES,'UTF-8');
        $image = './uploads/voitures/'.$title_save;
        $image_save = htmlspecialchars($image, ENT_QUOTES,'UTF-8');
        move_uploaded_file($tmpName, $image_save);
    }
    else{
        $image_save = './assets/images/default_voiture.jpg';
    }

    //on renregistre la voiture
    $requete = $bdd->prepare("INSERT INTO cars VALUES(0, :marque, :model, :kilometers, :years, :price, :color, :energie, :image)");
    $requete->execute(
        array(
            "marque" => $marque_save,
            "model" => $model_save,
            "kilometers" => $kilometers_save,
            "years" => $years_save,
            "price" => $price_save,
            "color" => $color_save,
            "energie" => $energie_save,
            "image" => $image_save
        )
    );
    $_SESSION["message_save"] = "La voiture est rajoutée";
    header("Location:./admin_cars.php");
    //on recupere l'id de la voiture qu'on vient de créer
    $requete = $bdd->prepare("SELECT max(car_id) as id_max FROM cars");
    $requete->execute();
    $maxCars = $requete->fetch();
    $maxCars_id = $maxCars["id_max"];

    //on cherche les options checked et on les enregistres dans la table de liaison
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
    }}
}
//-------------------------------insertion des options---------------------------
if(isset($_POST['save_options'])){
    if(!is_valid_token($_POST['token'])){
        die("erreur CSRF détectée");
    }
    else{
    $option_name = $_POST['option'];
    $option_name_save = htmlspecialchars($option_name, ENT_QUOTES,'UTF-8');

    $requete = $bdd->prepare("INSERT INTO options VALUES(0, :nom)");
    $requete->execute(
        array(
            "nom" => $option_name_save
        )
        );}
}

$requete = $bdd->prepare("SELECT max(option_id) FROM options");
$requete->execute();
$maxOptions_id = $requete->fetchAll();

// -----------------------------------les horaires---------------------------------------

if(isset($_POST['save_times'])){
    $hour_1 = $_POST['monday_open_am'];
    $hour_1_save = htmlspecialchars($hour_1, ENT_QUOTES,'UTF-8');
    $hour_2 = $_POST['monday_closed_am'];
    $hour_2_save = htmlspecialchars($hour_2, ENT_QUOTES,'UTF-8');
    $hour_3 = $_POST['monday_open_pm'];
    $hour_3_save = htmlspecialchars($hour_3, ENT_QUOTES,'UTF-8');
    $hour_4 = $_POST['monday_closed_pm'];
    $hour_4_save = htmlspecialchars($hour_4, ENT_QUOTES,'UTF-8');

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
    $hour_1_save = htmlspecialchars($hour_1, ENT_QUOTES,'UTF-8');
    $hour_2 = $_POST['tuesday_closed_am'];
    $hour_2_save = htmlspecialchars($hour_2, ENT_QUOTES,'UTF-8');
    $hour_3 = $_POST['tuesday_open_pm'];
    $hour_3_save = htmlspecialchars($hour_3, ENT_QUOTES,'UTF-8');
    $hour_4 = $_POST['tuesday_closed_pm'];
    $hour_4_save = htmlspecialchars($hour_4, ENT_QUOTES,'UTF-8');

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
    $hour_1_save = htmlspecialchars($hour_1, ENT_QUOTES,'UTF-8');
    $hour_2 = $_POST['wednesday_closed_am'];
    $hour_2_save = htmlspecialchars($hour_2, ENT_QUOTES,'UTF-8');
    $hour_3 = $_POST['wednesday_open_pm'];
    $hour_3_save = htmlspecialchars($hour_3, ENT_QUOTES,'UTF-8');
    $hour_4 = $_POST['wednesday_closed_pm'];
    $hour_4_save = htmlspecialchars($hour_4, ENT_QUOTES,'UTF-8');

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
    $hour_1_save = htmlspecialchars($hour_1, ENT_QUOTES,'UTF-8');
    $hour_2 = $_POST['thursday_closed_am'];
    $hour_2_save = htmlspecialchars($hour_2, ENT_QUOTES,'UTF-8');
    $hour_3 = $_POST['thursday_open_pm'];
    $hour_3_save = htmlspecialchars($hour_3, ENT_QUOTES,'UTF-8');
    $hour_4 = $_POST['thursday_closed_pm'];
    $hour_4_save = htmlspecialchars($hour_4, ENT_QUOTES,'UTF-8');

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
    $hour_1_save = htmlspecialchars($hour_1, ENT_QUOTES,'UTF-8');
    $hour_2 = $_POST['friday_closed_am'];
    $hour_2_save = htmlspecialchars($hour_2, ENT_QUOTES,'UTF-8');
    $hour_3 = $_POST['friday_open_pm'];
    $hour_3_save = htmlspecialchars($hour_3, ENT_QUOTES,'UTF-8');
    $hour_4 = $_POST['friday_closed_pm'];
    $hour_4_save = htmlspecialchars($hour_4, ENT_QUOTES,'UTF-8');

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
    $hour_1_save = htmlspecialchars($hour_1, ENT_QUOTES,'UTF-8');
    $hour_2 = $_POST['saturday_closed_am'];
    $hour_2_save = htmlspecialchars($hour_2, ENT_QUOTES,'UTF-8');
    $hour_3 = $_POST['saturday_open_pm'];
    $hour_3_save = htmlspecialchars($hour_3, ENT_QUOTES,'UTF-8');
    $hour_4 = $_POST['saturday_closed_pm'];
    $hour_4_save = htmlspecialchars($hour_4, ENT_QUOTES,'UTF-8');

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
    $hour_1_save = htmlspecialchars($hour_1, ENT_QUOTES,'UTF-8');
    $hour_2 = $_POST['sunday_closed_am'];
    $hour_2_save = htmlspecialchars($hour_2, ENT_QUOTES,'UTF-8');
    $hour_3 = $_POST['sunday_open_pm'];
    $hour_3_save = htmlspecialchars($hour_3, ENT_QUOTES,'UTF-8');
    $hour_4 = $_POST['sunday_closed_pm'];
    $hour_4_save = htmlspecialchars($hour_4, ENT_QUOTES,'UTF-8');
    
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
if(isset($_POST['avis'])){
    if(!is_valid_token($_POST['token'])){
        die("erreur CSRF détectée");
    }
    else{
    $avis = $_POST['avis'];
    $avis_save = htmlspecialchars($avis, ENT_QUOTES,'UTF-8');
    $note = $_COOKIE["valeur_etoile"];
    $note_save = htmlspecialchars($note, ENT_QUOTES,'UTF-8');
    $name = $_POST['name'];
    $name_save = htmlspecialchars($name, ENT_QUOTES,'UTF-8');
    $comment = $_POST['comment'];
    $comment_save = htmlspecialchars($comment, ENT_QUOTES,'UTF-8');

    $requete = $bdd->prepare("INSERT INTO avis VALUES(0, :avis, :note, :name, :comment, 1)");
    $requete->execute(
        array(
            "avis" => $avis_save,
            "note" => $note_save,
            "name" => $name_save,
            "comment" => $comment_save
        )
    );}
} 

if(isset($_POST['save_rdv'])){
    if(!is_valid_token($_POST['token'])){
        die("erreur CSRF détectée");
    }
    else{
    $lastname = $_POST['lastname'];
    $lastname_save = htmlspecialchars($lastname, ENT_QUOTES,'UTF-8');
    $firstname = $_POST['firstname'];
    $firstname_save = htmlspecialchars($firstname, ENT_QUOTES,'UTF-8');
    $categorie = $_POST['categorie'];
    $categorie_save = htmlspecialchars($categorie, ENT_QUOTES,'UTF-8');
    $comment = $_POST['comment'];
    $comment_save = htmlspecialchars($comment, ENT_QUOTES,'UTF-8');
    $phone = $_POST['phone'];
    $phone_save = htmlspecialchars($phone, ENT_QUOTES,'UTF-8');
    $email = $_POST['email'];
    $email_save = htmlspecialchars($email, ENT_QUOTES,'UTF-8');

    $requete = $bdd->prepare("INSERT INTO rdv VALUES(0, :lastname, :firstname, :categorie, :comment, :phone, :email, 1,'')");
    $requete->execute(
        array(
            "lastname" => $lastname_save,
            "firstname" => $firstname_save,
            "categorie" => $categorie_save,
            "comment" => $comment_save,
            "phone" => $phone_save,
            "email" => $email_save
        )
        );}
}
// ----------------------------recuperer rendez-vous------------------------------
$requete = $bdd->prepare("SELECT * FROM rdv");
    $requete->execute();
    $rdvAll = $requete->fetchAll();

    
if(isset($_POST['send_cars'])){
    if(!is_valid_token($_POST['token'])){
        die("erreur CSRF détectée");
    }
    else{
    $lastname = $_POST['lastname'];
    $lastname_save = htmlspecialchars($lastname, ENT_QUOTES,'UTF-8');
    $firstname = $_POST['firstname'];
    $firstname_save = htmlspecialchars($firstname, ENT_QUOTES,'UTF-8');
    $categorie = $_POST['marque'];
    $categorie_save = htmlspecialchars($categorie, ENT_QUOTES,'UTF-8');
    $comment = $_POST['comment'];
    $comment_save = htmlspecialchars($comment, ENT_QUOTES,'UTF-8');
    $phone = $_POST['phone'];
    $phone_save = htmlspecialchars($phone, ENT_QUOTES,'UTF-8');
    $email = $_POST['email'];
    $email_save = htmlspecialchars($email, ENT_QUOTES,'UTF-8');

    $requete = $bdd->prepare("INSERT INTO rdv VALUES(0, :lastname, :firstname, :categorie, :comment, :phone, :email, 1,'')");
    $requete->execute(
        array(
            "lastname" => $lastname_save,
            "firstname" => $firstname_save,
            "categorie" => $categorie_save,
            "comment" => $comment_save,
            "phone" => $phone_save,
            "email" => $email_save
        )
        );}
}