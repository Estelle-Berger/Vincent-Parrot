<?php 
    require_once('header.php');
?>

<div class="container">
    <form method="post" action="" enctype="multipart/form-data">
    <legend>Les horaires d'ouverture</legend>
    <div class="d-flex justify-content-evenly">
        <div class="p-2 col">
            <div class="row">
                    <p class="col align-self-center text-center">Lundi</p>
                <div class="col">
                    <input type="text" class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2" placeholder="open / matin">
                </div>
                <div class="col">
                    <input type="text" class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2" placeholder="close / matin">
                </div>
                <div class="col">
                    <input type="text" class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2" placeholder="open /après-midi">
                </div>
                <div class="col">
                    <input type="text" class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2" placeholder="close / après-midi">
                </div>
            </div>
        </div>
    </div>
    </form>
</div>

<?php 
    require_once('footer.php');
?>