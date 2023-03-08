<?php
$title = 'S\'identifier';
ob_start();
?>

<div class="card1">
    <div class="card-body">
        <form action="index.php" method="post" class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Username" required>
            <input type="password" name="password" class="form-control" placeholder="Your password" required>
            <button class="btn-primary">S'identifier</button>
            <a href="index.php?action=register">Register here</a>
        </form>
    </div>
</div>

<?php
$pageContent = ob_get_clean();
require 'layout.php';
?>