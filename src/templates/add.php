<?php
$title = 'Ajouter';
echo '<pre>';
var_dump($_POST);
echo '</pre>';
ob_start();
?>

<div class="card1">
    <div class="card-body">
        <form action="index.php?action=add" method="post" class="form-group">
            <label for="title">Titre</label>
            <input type="text" class="form-control" name="title" id="title" required>

            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description" required></textarea>

            <label for="year">Annee de realisation</label>
            <input type="number" name="year" id="year" class="form-control" required>

            <a href="../public/index.php" class="btn btn-secondary" style="margin-top: 2%">Anuler</a>
            <button type="submit" class="btn btn-primary" style="float: right;margin-top: 2%">Ajouter</div>
        </form>
    </div>
</div>

<?php
$pageContent = ob_get_clean();
require 'layout.php';
?>