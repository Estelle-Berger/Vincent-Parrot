
<div class="m-2 container-fluid">
    <form method="post" action="">
        <legend>Laisser un avis :</legend>
            <div class="p-2 d-flex justify-content-center">
                <div class=" border rounded">
                    <div class="p-2 d-flex justify-content-between">
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
                        <div class="row d-flex align-items-center stars">
                            <div class="text-center">
                                <label class="px-2 form-label" for="note">Note</label>
                            </div>
                            <div class="d-flex justify-content-end">
                                <i class="px-2 star stargrey fas fa-star" data-index="0"></i>
                                <i class="px-2 star stargrey fas fa-star" data-index="1"></i>
                                <i class="px-2 star stargrey fas fa-star" data-index="2"></i>
                                <i class="px-2 star stargrey fas fa-star" data-index="3"></i>
                                <i class="px-2 star stargrey fas fa-star" data-index="4"></i>
                            </div>
                        </div>
                    </div>
                    <div class="p-2">
                        <label for="name" class="form-label">Nom*</label>
                        <input type="text"class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded"
                                id="name" name="name"required>
                    </div>
                    <div class="p-2">
                        <label for="comment" class="form-label">Message*</label>
                        <textarea  class="avis form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border 
                        rounded" name="comment" id="comment" cols="20" rows="5"required></textarea>
                    </div>
                    <div class="p-2 d-flex justify-content-center">
                        <input class="btn btn-outline-secondary" type="submit" id="mybutton" name="send_avis" value="Envoyer" >
                    </div>
                </div>
            </div>
    </form>
</div>
