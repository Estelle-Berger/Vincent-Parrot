<?php 
    require_once('./templates/header.php');
?>
<div class="p-2">
        <div class="text-center">
            <div class="row d-flex align-items-center justify-content-around">
                <div class="col-md-4 ">
                    <img src="assets/images/contact.jpg" alt="image contact" width="100%">
                </div>
                <div class="p-4 col-md-4 text-start">
                    <ul>
                        <li class="p-2"style="list-style-image:url(./assets/images/icone-telephone.png)">04 22 33 44 01</li>
                        <li class="p-2"style="list-style-image:url(./assets/images/icone-maison.png)">66 route du motard<br> 31200 Toulouse</li>
                        <li class="p-2"style="list-style-image:url(./assets/images/icone-mail.png)">vincent.parrot@garagiste.fr</li>
                    </ul> 
                </div>
            </div>
        </div>
    </div>

<?php 
    require_once('./form_rdv.php');
    require_once('./templates/footer.php');
?>