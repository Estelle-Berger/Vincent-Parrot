<?php 
    require_once('./templates/header.php');
?>
<div class="p-2 container-fluid">
    <form method="post" action="">
        <legend>Contactez-moi :</legend>
        <div class="d-flex justify-content-center">
            <div class="p-2 row border rounded d-flex justify-content-center">
                <div class="row">
                    <div class="col-4">
                        <label for="lastname"class="form-label">Nom</label>
                        <input type="text"class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2"
                        placeholder="Nom" id="lastname" name="lastname" required>
                    </div>
                    <div class="col-4">
                        <label for="firstname"class="form-label">Prénom</label>
                        <input type="text"class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2"
                        placeholder="Prénom" id="firstname" name="firstname" required>
                    </div>
                    <div class="col-4">
                        <label for="marques"class="form-label">Marques</label>
                        <input type="text"class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2"
                        id="marques" name="marques"value="< recuperer id de la page encour ">
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="phone"class="form-label">Téléphone</label>
                        <input type="tel"class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2"
                        placeholder="00.00.00.00.00" id="phone" name="phone" required>
                    </div>
                    <div class="col-6">
                        <label for="mail"class="form-label">Mail</label>
                        <input type="mail"class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2"
                        placeholder="exemple@gmail.com" id="mail" name="mail" required>
                    </div>
                </div>
                <div class="row">
                    <div  class="col">
                        <label for="message"class="form-label">Message</label>
                        <textarea type="text"class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2"
                        placeholder="Votre message..." id="message" name="message" required></textarea>
                    </div>
                </div>
                    <div class="d-flex justify-content-center">
                        <input class="btn btn-outline-secondary" type="submit" id="mybutton" name="valide_cars" value="Envoyer" >
                    </div>
            </div>
        </div>
    </form>
</div>

<?php 
    require_once('./templates/footer.php');
?>