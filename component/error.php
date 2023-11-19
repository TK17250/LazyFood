<?php require_once './connect/server.php'; ?>
<?php if ($_SESSION['error']) { ?>
    <div class="error">
        <p>
            <?php echo $_SESSION['error'];
            unset($_SESSION['error']); ?>
        </p>
    </div>
<?php } ?>