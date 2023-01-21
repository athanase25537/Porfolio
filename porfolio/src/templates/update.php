<?php
$title = 'Mettre a jour';
ob_start();
?>

<form action="index.php?action=update" method="post" class="card1">
    <label for="title">Titre</label>
    <input type="text" class="form-control" name="title" id="title" value="<?= $content->title ?>">

    <label for="description">Description</label>
    <textarea class="form-control" name="description" id="description" >
        <?= $content->description ?>
    </textarea>

    <label for="year">Annee de realisation</label>
    <input type="number" name="year" id="year" class="form-control" value="<?= $content->year ?>">

    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
    
    <button type="submit" class="btn btn-primary">Modifier</div>
</form>

<?php
$pageContent = ob_get_clean();
require 'layout.php';
?>