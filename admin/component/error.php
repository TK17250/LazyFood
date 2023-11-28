<?php require_once '../connect/server.php'; ?>
<?php if (!empty($_SESSION['error'])) { ?>
    <div class="alert alert-danger text-center" role="alert">
        <p class="mb-0 mt-0">
            <?php echo $_SESSION['error'];
            unset($_SESSION['error']); ?>
        </p>
    </div>
<?php } ?>