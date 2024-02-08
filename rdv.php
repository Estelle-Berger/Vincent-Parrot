<?php 
    require_once('./templates/header.php');
?>
<div class="m-2 container-fluid">
    <h1>Gérer les rendez-vous des clients</h1>
    <div class="row d-flex jutify-content-center">
        <div class="d-flex justify-content-center flex-wrap">
            <div class="col-6 p-3">
                <div class="card w-75 m-3">
                    <div class="d-flex jutify-content-between card-header">
                        <div class="col-8 d-flex align-items-center"><h2>Sujet</h2></div>
                        <div class="col-4 text-end">
                            <div class=" border rounded p-2">
                                <p class="border-bottom">Traité</p>
                                <p>Nom employé</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Message</p>
                        <p>Nom du client :</p>
                        <p>Mail :</p>
                        <p>Téléphone :</p>
                    </div>
                    <div class="d-flex flex-row-reverse">
                        <div class="p-2">   
                            <a href="#" class="btn btn-secondary">Supprimer</a>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="col-6 p-3">
                <div class="card w-75 m-3">
                    <div class="d-flex jutify-content-between card-header">
                        <div class="col-8 d-flex align-items-center"><h2>Sujet</h2></div>
                        <div class="col-4 text-end">
                            <div class="border rounded p-2">
                                <p class="border-bottom">Traité</p>
                                <p>Nom employé</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Message</p>
                        <p>Nom du client :</p>
                        <p>Mail :</p>
                        <p>Téléphone :</p>
                    </div>
                    <div class="d-flex flex-row-reverse">
                        <div class="p-2">   
                            <a href="#" class="btn btn-secondary">Supprimer</a>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    require_once('./templates/footer.php');
?>