<?php require 'src/elements/header.php'; ?>
<div class="bg-light p-5 rounded">
    <div class="lead">
        <h3 style="color: red;text-align:center;font-family:Showcard Gothic,sans serif;font-size:4em;">Cavio</h3>
        <h5 style="color: green;text-align:center;">Noter selon votre personalite</h5>
        <div class="card">
            <div class="card-body">
                <form action="index.php?action=cavio" method="POST">
                    <ol>
                        <?php $i = 0 ?>
                        <?php foreach ($questions as $test):?>
                        <li>
                            <strong><?= $test[0] . ' ' ?></strong><?= $test[1] ?><br>
                            <input type="radio" name="<?= $test[0] . $i ?>" value="1" required><span style="<?= $style ?>">1</span> <br>
                            <input type="radio" name="<?= $test[0] . $i ?>" value="2" required><span style="<?= $style ?>">2</span> <br>
                            <input type="radio" name="<?= $test[0] . $i ?>" value="3" required><span style="<?= $style ?>">3</span> <br>
                            <input type="radio" name="<?= $test[0] . $i ?>" value ="4" required><span style="<?= $style ?>">4</span><br>
                        </li>
                        <?php $i++ ?>
                        <?php endforeach ?>
                        <button type="submit" class="btn btn-primary">VALIDER</button>
                    </ol>
                </form>
            </div>
        </div> 
    </div>
</div>
