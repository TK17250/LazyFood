<?php require_once '../connect/server.php'; ?>
<?php if (!empty($_SESSION['error'])) { ?>
    <div class="alert alert-danger text-center" role="alert">
        <p>
            <?php echo $_SESSION['error'];
            unset($_SESSION['error']); ?>
        </p>
    </div>
<?php } ?>