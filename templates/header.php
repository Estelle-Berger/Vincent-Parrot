<?php 
    require_once('./lib/config.php');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garage V. Parrot</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa&family=Hina+Mincho&family=Sarabun:wght@200&display=swap" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg border-bottom">
            <div class="m-2 container-fluid">
                <!-- logo retour sur la page index -->
                <a href="./index.php" class="navbar-brand">
                    <img src="./assets/images/logo.png" alt="logo Garage" width="100px">
                </a>
                <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="nav nav-underline me-auto mb-2 mb-lg-0">
                        <!-- navigation visiteur -->
                        <li class="nav-item"><a href="services.php" class="nav-link px-2 header-a">Services</a></li>
                        <li class="nav-item"><a href="cars.php" class="nav-link px-2 header-a">Voitures d'occasion</a></li>
                        <li class="nav-item"><a href="contact.php" class="nav-link px-2 header-a">Contact</a></li>
                        <li class="nav-item"><a href="avis.php" class="nav-link px-2 header-a">Avis</a></li>
                        <li>
                            <?php 
                            if(isset($_SESSION['isLogged']) AND $_SESSION["isLogged"]==true){
                                if (isset($_SESSION['User_Profil']) AND $_SESSION['User_Profil'] == 1){?>
                                <li class="nav-item dropdown">
                                    <!-- navigation administrateur -->
                                    <a class="nav-link dropdown-toggle header-a" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Administration</a>
                                    <ul class="dropdown-menu">
                                    <li><a class="dropdown-item header-a" href="admin_cars.php">Gestion des voitures d'occasion</a></li>
                                    <li><a class="dropdown-item header-a" href="admin_options.php">Gestion des options</a></li>
                                    <li><a class="dropdown-item header-a" href="admin_services.php">Gestion des services</a></li>
                                    <li><a class="dropdown-item header-a" href="admin_rdv.php">Gestion des rendez-vous</a></li>
                                    <li><a class="dropdown-item header-a" href="admin_avis.php">Gestion des avis</a></li>
                                    <li><a class="dropdown-item header-a" href="admin_employes.php">Gestion des employés</a></li>
                                    <li><a class="dropdown-item header-a" href="admin_times.php">Gestion des horaires d'ouverture</a></li>
                                    </ul>
                                </li>
                            <?php }
                                else {?>
                            <li class="nav-item dropdown">
                                <!-- navigation employé -->
                            <a class="nav-link dropdown-toggle header-a" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Employé</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item header-a" href="admin_avis.php">Gestion des avis</a></li>
                                        <li><a class="dropdown-item header-a" href="admin_options.php">Création des options</a></li>
                                        <li><a class="dropdown-item header-a" href="admin_car.php">Création des voitures d'occasion</a></li>
                                        <li><a class="dropdown-item header-a" href="admin_rdv.php">Gestion des rendez-vous</a></li>
                                    </ul>
                            <?php }}?>
                    </ul>
                    <div class="login p-2">
                        <!-- bouton de login espace pro -->
                        <?php if(isset($_SESSION['isLogged']) AND $_SESSION['isLogged']==true){?>
                            <a href="./logout.php" class="btn btn-outline-secondary" type="submit">Déconnexion</a>
                        <?php } else {?>
                            <a href="./login.php" class="btn btn-outline-secondary" type="submit">Espace<br>professionnel</a>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>