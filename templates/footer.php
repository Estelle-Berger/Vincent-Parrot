<?php 
    require_once('./templates/header.php');
    require_once('./lib/config.php');
$requete = $bdd->prepare("SELECT * FROM opening_hours");
$requete->execute();
$times = $requete->fetchAll();
?>

<div class="container-fluid">
    <footer class="d-flex flex-wrap justify-content-between align-items-center my-2 border-top">
        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th class="text-center">Matin</th>
                        <th class="text-center">Après-midi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($times as $time){?>
                    <tr>
                        <td><?=$time['day_name'];?></td>
                        <td><?=$time['open_am'];?> - <?=$time['closed_am'];?></td>
                        <td><?=$time['open_pm'];?> - <?=$time['closed_pm'];?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div>
            <a href="mentions-legales.php" class="link-dark" role="button" style="text-decoration: none;">Mention légale</a><br> 
        </div>
        <div class="col-md-4 d-flex justify-content-end align-items-center">
            <a href="index.php" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
                <img src="./assets/images/logo.png" width="100px" alt="Logo garage">
            </a>
        <span class="mb-3 mb-md-0 text-body-secondary">© 2023 Company, Inc</span>
        </div>
    </footer>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="./scripts/script.js"></script>
</body>
</html>