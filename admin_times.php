<?php 
    require_once('./templates/header.php');
    require_once('./lib/config.php');
?>

<div class="container-fluid">
    <form method="post" action="">
    <legend>Les horaires d'ouverture</legend>
    <label name="Lundi" class="px-3 text-start">Lundi</label>
    <div class="d-flex justify-content-evenly gap-2 flex-wrap">
        <div class="p-2 col">
            <div class="row">
                <div class="col">
                    <input type="time" class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2"
                    id="monday_open_am" name="monday_open_am">
                </div>
                <div class="col">
                    <input type="time" class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2"
                    id="monday_closed_am" name="monday_closed_am">
                </div>
                <div class="col">
                    <input type="time" class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2"
                    id="monday_open_pm" name="monday_open_pm">
                </div>
                <div class="col">
                    <input type="time" class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2"
                    id="monday_closed_pm" name="monday_closed_pm">
                </div>
            </div>
        </div>
    </div>
    <label name="Mardi" class="px-3 text-start">Mardi</label>
    <div class="d-flex justify-content-evenly gap-2 flex-wrap">
        <div class="p-2 col">
            <div class="row">
                <div class="col">
                    <input type="time" class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2"
                    name="tuesday_open_am">
                </div>
                <div class="col">
                    <input type="time" class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2"
                    name="tuesday_closed_am">
                </div>
                <div class="col">
                    <input type="time" class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2"
                    name="tuesday_open_pm">
                </div>
                <div class="col">
                    <input type="time" class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2"
                    name="tuesday_closed_pm">
                </div>
            </div>
        </div>
    </div>
    <label class="px-3 text-start">Mercredi</label>
    <div class="d-flex justify-content-evenly gap-2 flex-wrap">
        <div class="p-2 col">
            <div class="row">
                <div class="col">
                    <input type="time" class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2"
                    name="wednesday_open_am">
                </div>
                <div class="col">
                    <input type="time" class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2"
                    name="wednesday_closed_am">
                </div>
                <div class="col">
                    <input type="time" class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2"
                    name="wednesday_open_pm">
                </div>
                <div class="col">
                    <input type="time" class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2"
                    name="wednesday_closed_pm">
                </div>
            </div>
        </div>
    </div>
    <label class="px-3 text-start">Jeudi</label>
    <div class="d-flex justify-content-evenly gap-2 flex-wrap">
        <div class="p-2 col">
            <div class="row">
                <div class="col">
                    <input type="time" class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2"
                    name="thursday_open_am">
                </div>
                <div class="col">
                    <input type="time" class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2"
                    name="thursday_closed_am">
                </div>
                <div class="col">
                    <input type="time" class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2"
                    name="thursday_open_pm">
                </div>
                <div class="col">
                    <input type="time" class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2"
                    name="thursday_closed_pm">
                </div>
            </div>
        </div>
    </div>
    <label class="px-3 text-start">Vendredi</label>
    <div class="d-flex justify-content-evenly gap-2 flex-wrap">
        <div class="p-2 col">
            <div class="row">
                <div class="col">
                    <input type="time" class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2"
                    name="friday_open_am">
                </div>
                <div class="col">
                    <input type="time" class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2"
                    name="friday_closed_am">
                </div>
                <div class="col">
                    <input type="time" class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2"
                    name="friday_open_pm">
                </div>
                <div class="col">
                    <input type="time" class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2"
                    name="friday_closed_pm">
                </div>
            </div>
        </div>
    </div>
    <label class="px-3 text-start">Samedi</label>
    <div class="d-flex justify-content-evenly gap-2 flex-wrap">
        <div class="p-2 col">
            <div class="row">
                <div class="col">
                    <input type="time" class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2"
                    name="saturday_open_am">
                </div>
                <div class="col">
                    <input type="time" class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2"
                    name="saturday_closed_am">
                </div>
                <div class="col">
                    <input type="time" class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2"
                    name="saturday_open_pm">
                </div>
                <div class="col">
                    <input type="time" class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2"
                    name="saturday_closed_pm">
                </div>
            </div>
        </div>
    </div>
    <label class="px-3 text-start">Dimanche</label>
    <div class="d-flex justify-content-evenly gap-2 flex-wrap">
        <div class="p-2 col">
            <div class="row">
                <div class="col">
                    <input type="time" class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2"
                    name="sunday_open_am">
                </div>
                <div class="col">
                    <input type="time" class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2"
                    name="sunday_closed_am">
                </div>
                <div class="col">
                    <input type="time" class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2"
                    name="sunday_open_pm">
                </div>
                <div class="col">
                    <input type="time" class="form-control d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2"
                    name="sunday_closed_pm">
                </div>
            </div>
        </div>
    </div>
    <div class="p-2 d-flex justify-content-end">
            <input class="btn btn-outline-secondary" type="submit" name="save_times" value="Mise à jour" >
        </div>
    </form>
</div>

<?php 
    require_once('./templates/footer.php');
?>