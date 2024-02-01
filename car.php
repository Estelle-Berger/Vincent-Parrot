<?php 
    require_once('header.php');
    // $caracteristiques = linesToArray($cars['caracteristique']);
?>

<div class="m-2 container-fluid">
    <div class="d-flex justify-content-evenly">
        <div class="row">
            <div class="p-2 col">
                <h1>Marque</h1>
            </div>
            <div class="p-2 row">
                <div class="col-4">
                    <p class="text-center border rounded">Prix</p>
                </div>
                <div class="col-4">
                    <p class="text-center border rounded">Année</p>
                </div>
                <div class="col-4">
                    <p class="text-center border rounded">Kilomètres</p>
                </div>
            </div>
            <div class="p-2 d-flex justify-content-center">
                <img src="./assets/images/v2.jpg" alt="">
            </div>
            <div class="p-2 d-flex justify-content-center">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Galerie
                </button>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modèle</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div id="carouselExample" class="carousel slide">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="./assets/images/v2.jpg" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="./assets/images/v3.jpg" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="./assets/images/v4.jpg" class="d-block w-100" alt="...">
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <p>caracteristiques</p>
                <!-- <p><?=$caracteristiques;?></p> -->
            </div>
            <div>
                <?php require_once('form_cars.php') ?>
            </div>
        </div>
    </div>
</div>

<?php 
    require_once('footer.php');
?>