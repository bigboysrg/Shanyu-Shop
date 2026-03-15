<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Cart | Shàn yú</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Playfair+Display:ital,wght@0,700;1,700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        :root { --maroon: #800000; --cream: #F5E6BE; --price-green: #006400; }
        body { background-color: var(--maroon); font-family: 'Poppins', sans-serif; }
        
        .navbar-custom { background-color: #003311; padding: 10px 60px; color: white; }
        .logo-area-nav { display: flex; align-items: center; text-decoration: none; }
        .logo-circle-nav { width: 45px; height: 45px; display: flex; align-items: center; justify-content: center; margin-right: 10px; }
        .logo-circle-nav img { width: 100%; height: 100%; object-fit: contain; }
        .logo-text-nav { font-family: 'Pacifico', cursive; color: white; font-size: 1.5rem; }
        .nav-link-custom { color: #ccc; text-decoration: none; margin-left: 30px; font-size: 0.95rem; }

        .cart-panel { background: var(--cream); border-radius: 15px; padding: 40px; min-height: 500px; }
        .summary-panel { background: var(--cream); border-radius: 15px; padding: 30px; border: 1.5px solid var(--maroon); }
        .item-box { background: #fff; border: 1.5px solid var(--maroon); border-radius: 10px; padding: 20px; display: flex; align-items: center; margin-bottom: 20px; }
        .img-holder { width: 100px; height: 80px; border: 1px solid var(--maroon); background: white; display: flex; align-items: center; justify-content: center; margin-right: 20px; }
        .img-holder img { max-width: 90%; max-height: 90%; object-fit: contain; }
        .white-box { background: white; border: 1.5px solid var(--maroon); padding: 5px 15px; text-align: right; font-weight: bold; min-width: 140px; }
        .summary-title { font-family: 'Playfair Display', serif; color: var(--maroon); border-bottom: 1.5px solid var(--maroon); padding-bottom: 10px; margin-bottom: 20px; }
        .btn-place { background: #700000; color: white; width: 100%; border: none; padding: 15px; font-weight: bold; margin-top: 25px; text-transform: uppercase; }
        .receipt-body { font-family: 'Courier New', monospace; padding: 30px; }
    </style>
</head>
<body>
<nav class="navbar-custom d-flex justify-content-between align-items-center">
    <a href="<?= site_url('/') ?>" class="logo-area-nav">
        <div class="logo-circle-nav"><img src="<?= base_url('images/logo.png') ?>"></div>
        <span class="logo-text-nav">Shàn yú</span>
    </a>
    <div>
        <a href="<?= site_url('/') ?>" class="nav-link-custom">Home</a>
        <a href="<?= site_url('products') ?>" class="nav-link-custom">Products</a>
    </div>
</nav>

<div class="container py-5">
    <a href="<?= site_url('products') ?>" class="text-white text-decoration-none fw-bold mb-4 d-inline-block">← Back to Store</a>
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="cart-panel shadow">
                <h2 class="italic mb-4" style="font-family:'Playfair Display'; color:var(--maroon); border-bottom:2px solid var(--maroon);">Your Shopping Cart</h2>
                <?php if(!empty($cart_items)): ?>
                    <?php foreach ($cart_items as $id => $item): ?>
                        <div class="item-box shadow-sm">
                            <div class="img-holder"><img src="<?= base_url('images/'.$item['img']) ?>"></div>
                            <div class="flex-grow-1">
                                <div class="fw-bold" style="color:var(--maroon);"><?= $item['name'] ?></div>
                                <div class="small text-muted">Qty: <?= $item['quantity'] ?></div>
                                <div class="fw-bold" style="color:var(--price-green);">$<?= number_format($item['price'], 2) ?></div>
                            </div>
                            <a href="<?= site_url('cart/remove/'.$id) ?>" class="text-danger small">Remove</a>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-center py-5 italic text-muted">Empty Cart.</p>
                <?php endif; ?>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="summary-panel shadow">
                <h5 class="summary-title">Order Summary</h5>
                <label class="small fw-bold">Shipping Address</label>
                <textarea id="address" class="form-control mb-4 border-dark" rows="2" placeholder="Enter complete address..."></textarea>
                <div class="d-flex justify-content-between mb-2"><span>Items (<?= $total_qty ?>):</span><div class="white-box">$<?= number_format($items_total, 2) ?></div></div>
                <div class="d-flex justify-content-between mb-2"><span>Subtotal:</span><div class="white-box">$<?= number_format($items_total, 2) ?></div></div>
                <div class="d-flex justify-content-between border-bottom border-dark pb-3 mb-4"><span>Shipping:</span><div class="white-box">$<?= number_format($shipping_fee, 2) ?></div></div>
                <div class="d-flex justify-content-between fw-bold h5"><span>Grand Total:</span><div class="white-box">$<?= number_format($grand_total, 2) ?></div></div>
                <div class="mt-4 small">
                    <b>Payment:</b><br>
                    <input type="radio" name="pay" value="GCash" checked> GCash | <input type="radio" name="pay" value="Cash"> Cash
                </div>
                <button class="btn-place" onclick="showReceipt()">PLACE ORDER</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="receiptModal" tabindex="-1"><div class="modal-dialog"><div class="modal-content">
    <div class="modal-body receipt-body">
        <h3 class="text-center fw-bold">SHÀN YÚ</h3>
        <p class="text-center small">OFFICIAL RECEIPT</p>
        <hr>
        <p><b>Date:</b> <?= date('M d, Y') ?></p>
        <p><b>Address:</b> <span id="r-addr"></span></p>
        <p><b>Payment:</b> <span id="r-pay"></span></p>
        <hr>
        <?php foreach ($cart_items as $item): ?>
            <div class="d-flex justify-content-between small mb-1">
                <span><?= $item['name'] ?> (x<?= $item['quantity'] ?>)</span>
                <span>$<?= number_format($item['price'] * $item['quantity'], 2) ?></span>
            </div>
        <?php endforeach; ?>
        <hr>
        <div class="d-flex justify-content-between fw-bold h5"><span>TOTAL PAID:</span><span>$<?= number_format($grand_total, 2) ?></span></div>
        <div class="alert alert-success text-center mt-4">Order Confirmed! Product ships within 3-7 days.</div>
        <button class="btn btn-dark w-100" onclick="window.location.href='<?= site_url('products') ?>'">Finish</button>
    </div>
</div></div></div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
function showReceipt(){
    let a=document.getElementById('address').value; if(!a) return alert("Enter address.");
    document.getElementById('r-addr').innerText = a;
    document.getElementById('r-pay').innerText = document.querySelector('input[name="pay"]:checked').value;
    new bootstrap.Modal(document.getElementById('receiptModal')).show();
}
</script>
</body>
</html>