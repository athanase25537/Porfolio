<?php
$title = 'Porfolio';
ob_start();
?>

<?php if($success): ?>
  <div class="alert alert-success"><?= $message ?></div>
<?php endif ?>

<div class="card1">
  <div class="row">
    <?php foreach($contents as $content): ?>
      <div class="col-4" style="margin: 1% 0%;">
        <div class="card">
          <div class="card-body">
            <center>
            <h5 class="card-title" style="color: red;"><?= $content->year ?></b>: <?= strtoupper($content->title) ?></h5>
            <p class="card-text"><?= $content->description?></p>
            <a href="index.php?action=update&amp;id=<?= htmlentities($content->id) ?>" class="btn btn-primary">Editer</a>
            <a href="index.php?action=delete&amp;id=<?= htmlentities($content->id) ?>" class="btn btn-danger">Supprimer</a>
            </center>
          </div>
        </div>
      </div>
    <?php endforeach ?>
  </div>
  <?php if($page > 1): ?>
    <a href="index.php?page=<?= htmlentities($page) - 1 ?>&amp;year=<?= htmlentities($content->year) ?>&amp;btn=prev" class="btn btn-primary">Precedent</a>
  <?php endif ?>
  <?php if($page < $maxPage): ?>
    <a href="index.php?page=<?= htmlentities($page) + 1 ?>&amp;year=<?= htmlentities($content->year) ?>&amp;btn=next" class="btn btn-secondary">Suivant</a>
  <?php endif ?>
  <a href="index.php?action=add" class="btn btn-info" style="float: right;">Ajouter</a>
</div>
<?php
$pageContent = ob_get_clean();
require 'layout.php';
?>
