<?php
$title = 'S\'inscrire';
ob_start();
?>

<div class="card1">
    <div class="card-body">
        <form action="index.php?action=register" method="post" class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Username">
            <input type="email" name="email" class="form-control" placeholder="exemple@gmail.com">
            <input type="password" name="password" class="form-control" placeholder="Your password">
            <button class="btn-primary">S'incrire</button>
        </form>
    </div>
</div>

<?php
$pageContent = ob_get_clean();
require 'layout.php';
?>