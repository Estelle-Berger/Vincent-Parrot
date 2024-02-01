<?php 
    require_once('header.php');
?>
<div class="m-2 container">
    <form action="">
        <legend>Laisser un avis :</legend>

            <div class="row border rounded d-flex justify-content-center">
                <div class="row">
                    <div class="col">
                        <label for="avis"class="form-label">Avis</label>
                        <select class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2"
                            id="avis" name="avis">
                            <option>Parfait</option>
                            <option>Très bien</option>
                            <option>Bien</option>
                            <option>Mauvais</option>
                            <option>Attroce</option>
                        </select>
                    </div>
                    <div class="col-8 px-5 d-flex align-items-center justify-content-end stars">
                        <div class="d-flex jutify-content-end">
                            <label class="form-label" for="note">Note</label>
                            <i class="px-2 star stargrey fas fa-star" data-index="0"></i>
                            <i class="px-2 star stargrey fas fa-star" data-index="1"></i>
                            <i class="px-2 star stargrey fas fa-star" data-index="2"></i>
                            <i class="px-2 star stargrey fas fa-star" data-index="3"></i>
                            <i class="px-2 star stargrey fas fa-star" data-index="4"></i>
                        </div>
                    </div>
                </div>
                <div class="p-2 row">
                    <textarea  class="avis form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border 
                    rounded-2" name="avis" id="avis" cols="20" rows="5"required></textarea>
                </div>
                <div class="p-2 d-flex justify-content-center">
                    <input class="btn btn-outline-secondary" type="submit" id="mybutton" name="valide_rdv" value="Envoyer" >
                </div>
            </div>
    </form>
</div>

<?php 
    require_once('footer.php');
?>