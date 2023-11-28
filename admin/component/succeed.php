<?php require_once '../connect/server.php'; ?>
<?php if (!empty($_SESSION['succeed'])) { ?>
    <div class="alert alert-success text-center" role="alert">
        <p class="mb-0 mt-0">
            <?php echo $_SESSION['succeed'];
            unset($_SESSION['succeed']); ?>
        </p>
    </div>
<?php } ?>