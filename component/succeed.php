<?php require_once './connect/server.php'; ?>
<?php if ($_SESSION['succeed']) { ?>
    <div class="succeed">
        <p>
            <?php echo $_SESSION['succeed'];
            unset($_SESSION['succeed']); ?>
        </p>
    </div>
<?php } ?>