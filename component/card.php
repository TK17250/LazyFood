<?php require_once './connect/server.php'; ?>
<div class="card p-0 col-10 col-md-4 col-lg-3 m-auto mb-3">
    <img src="./uploads/<?php echo $row['m_image'] ?>" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title"><?php echo $row['m_name'] ?>
            <?php if ($row['m_promotion'] == 1) { ?>
                <span class="badge bg-danger">โปรโมชั่น</span>
            <?php } ?>
        </h5>
        <p class="card-text">
            หมวดหมู่ <?php echo $row['m_type'] ?> <br>
            ราคา <?php echo $row['m_price'] ?> บาท
        </p>
        <form action="./process/buy_db.php" method="post">
            <label class="form-lable" for="menuquan<?php echo $row['m_id'] ?>">จำนวน</label>
            <input type="number" class="form-control" name="menuquan" id="menuquan<?php echo $row['m_id'] ?>" autocomplete="off" required>
            <div class="d-block d-md-flex mt-3">
                <button type="submit" name="buy" class="btn btn-color m-auto">สั่งซื้อ</button>
                <button type="submit" name="addtocart" class="btn btn-outline-color m-auto">เพิ่มลงในตะกร้า</button>
            </div>
        </form>
    </div>
</div>