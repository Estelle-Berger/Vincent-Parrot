<?php 
    require_once('./templates/header.php');
    require_once('./lib/config.php');
    $id = $_GET['car_id'];
    $requete = $bdd->prepare("SELECT * FROM cars WHERE car_id = :id");
    $requete->bindParam(':id', $id, PDO::PARAM_INT);
    $requete->execute();
    $cars = $requete->fetchAll();

?>
<div class="p-2 container-fluid">
    <form method="post" action="">
        <legend>Essayer ou renseignement :</legend>
        <div class="d-flex justify-content-center">
            <div class="p-2 row border rounded d-flex justify-content-center">
                <div class="row">
                    <div class="col-4">
                        <label for="lastname"class="form-label">Nom*</label>
                        <input type="text"class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2"
                        placeholder="Nom" id="lastname" name="lastname" required>
                    </div>
                    <div class="col-4">
                        <label for="firstname"class="form-label">Prénom*</label>
                        <input type="text"class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2"
                        placeholder="Prénom" id="firstname" name="firstname" required>
                    </div>
                    <div class="col-4">
                        <?php foreach($cars as $key => $car){?>
                        <label for="marque"class="form-label">Marques</label>
                        <input type="text"class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2"
                        id="marque" name="marque"value="<?=$car['marque'];?>-<?=$car['model'];?> ">
                        <?php }?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="phone"class="form-label">Téléphone*</label>
                        <input type="tel" step="2" class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2"
                        placeholder="00.00.00.00.00" id="phone" name="phone" required>
                    </div>
                    <div class="col-6">
                        <label for="email"class="form-label">Email*</label>
                        <input type="email"class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2"
                        placeholder="exemple@gmail.com" id="email" name="email" required>
                    </div>
                </div>
                <div class="row">
                    <div  class="col">
                        <label for="comment"class="form-label">Message*</label>
                        <textarea type="text"class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2"
                        placeholder="Votre message..." id="comment" name="comment" required></textarea>
                    </div>
                </div>
                    <div class="d-flex justify-content-center">
                        <input class="btn btn-outline-secondary" type="submit" id="mybutton" name="send_cars" value="Envoyer" >
                    </div>
            </div>
        </div>
    </form>
</div>

<?php 
    require_once('./templates/footer.php');
?>