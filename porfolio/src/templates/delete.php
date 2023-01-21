<?php
$title = 'Supprimer';
ob_start();
?>

<div class="alert alert-danger">
    Voulez-vous vraiment supprimer?
</div>
<form action="" method="post">
    <button class="btn btn-success" name="btn" value="cancel">Anuler</button>
    <button class="btn btn-danger" name="btn" value="confirm">Confirmer</button>
</form>
<?php
$pageContent = ob_start();
require 'layout.php';
?>