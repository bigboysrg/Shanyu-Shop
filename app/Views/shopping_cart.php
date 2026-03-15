<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Cart | Shàn yú</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Playfair+Display:ital,wght@0,700;1,700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --maroon: #800000;
            --cream: #F5E6BE;
            --dark-green: #003311;
            --price-green: #006400;
        }

        body { 
            background-color: var(--maroon); 
            font-family: 'Poppins', sans-serif;
            margin: 0;
        }

        /* Top Navbar - Clean Logo */
        .navbar-custom {
            background-color: var(--dark-green);
            padding: 10px 60px;
            color: white;
        }
        .logo-area-nav { display: flex; align-items: center; text-decoration: none; }
        .logo-circle-nav { width: 45px; height: 45px; display: flex; align-items: center; justify-content: center; margin-right: 10px; background: transparent; }
        .logo-circle-nav img { width: 100%; height: 100%; object-fit: contain; }
        .logo-text-nav { font-family: 'Pacifico', cursive; color: white; font-size: 1.5rem; }
        .nav-link-custom { color: #ccc; text-decoration: none; margin-left: 30px; font-size: 0.95rem; }
        .nav-link-custom:hover { color: white; }

        /* Main Layout */
        .cart-panel {
            background-color: var(--cream);
            border-radius: 15px;
            padding: 40px;
            min-height: 600px;
        }

        .summary-panel {
            background-color: var(--cream);
            border-radius: 15px;
            padding: 30px;
            border: 1px solid var(--maroon);
        }

        /* Shopping Cart Items */
        .cart-title {
            font-family: 'Playfair Display', serif;
            font-style: italic;
            font-size: 32px;
            color: var(--maroon);
            border-bottom: 2px solid var(--maroon);
            margin-bottom: 30px;
            padding-bottom: 10px;
        }

        .item-row {
            background: #fff;
            border: 1.5px solid var(--maroon);
            border-radius: 8px;
            padding: 20px;
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .item-img-box {
            width: 100px;
            height: 80px;
            border: 1px solid var(--maroon);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20px;
            background: white;
        }
        .item-img-box img { max-width: 90%; max-height: 90%; object-fit: contain; }

        /* Summary Styling - White Boxes */
        .summary-header {
            font-family: 'Playfair Display', serif;
            color: var(--maroon);
            font-weight: bold;
            border-bottom: 1.5px solid var(--maroon);
            padding-bottom: 10px;
            margin-bottom: 25px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .white-value-box {
            background: white;
            border: 1.5px solid var(--maroon);
            padding: 4px 15px;
            text-align: right;
            font-weight: bold;
            min-width: 140px;
        }

        .address-box {
            background: white;
            border: 1.5px solid var(--maroon);
            width: 100%;
            padding: 10px;
            font-size: 0.85rem;
            margin-top: 5px;
        }

        /* Payment Links */
        .payment-options-list {
            font-size: 0.85rem;
            color: #444;
            margin-top: 5px;
        }
        .pay-link { cursor: pointer; color: #444; text-decoration: none; }
        .pay-link.active { font-weight: bold; color: var(--maroon); text-decoration: underline; }

        .btn-place-order {
            background-color: #700000;
            color: white;
            width: 100%;
            border: none;
            padding: 14px;
            font-weight: bold;
            text-transform: uppercase;
            margin-top: 25px;
            transition: 0.3s;
        }
        .btn-place-order:hover { background-color: #500000; }

        /* Receipt Modal */
        .receipt-body { font-family: 'Courier New', Courier, monospace; padding: 30px; }
        .receipt-dashed { border-top: 1px dashed #000; margin: 15px 0; }
    </style>
</head>
<body>

<nav class="navbar-custom d-flex justify-content-between align-items-center">
    <a href="<?= site_url('/') ?>" class="logo-area-nav">
        <div class="logo-circle-nav"><img src="<?= base_url('images/logo.png') ?>"></div>
        <span class="logo-text-nav">Shàn yú</span>
    </a>
    <div class="nav-links">
        <a href="<?= site_url('/') ?>" class="nav-link-custom">Home</a>
        <a href="<?= site_url('products') ?>" class="nav-link-custom">Products</a>
    </div>
</nav>

<div class="container py-5">
    <a href="<?= site_url('products') ?>" class="text-white text-decoration-none fw-bold mb-4 d-inline-block">← Back to Store</a>
    
    <div class="row g-4">
        <!-- LEFT: CART ITEMS -->
        <div class="col-lg-8">
            <div class="cart-panel shadow">
                <div class="cart-title">Your Shopping Cart</div>
                
                <?php if (!empty($cart_items)): ?>
                    <?php foreach ($cart_items as $id => $item): ?>
                        <div class="item-row">
                            <div class="item-img-box">
                                <img src="<?= base_url('images/' . $item['img']) ?>">
                            </div>
                            <div class="flex-grow-1">
                                <div class="fw-bold" style="color:var(--maroon);"><?= $item['name'] ?></div>
                                <div class="small text-muted">Qty: <?= $item['quantity'] ?></div>
                                <div class="fw-bold" style="color:var(--price-green);">$<?= number_format($item['price'], 2) ?></div>
                            </div>
                            <a href="<?= site_url('cart/remove/' . $id) ?>" class="text-maroon text-decoration-none small">Remove</a>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-center py-5 italic text-muted">Empty Cart.</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- RIGHT: SUMMARY -->
        <div class="col-lg-4">
            <div class="summary-panel shadow">
                <h5 class="summary-header">Order Summary</h5>
                
                <div class="mb-4">
                    <label class="small fw-bold">Shipping Address</label>
                    <textarea id="address" class="address-box" rows="2" placeholder="Enter complete address..."></textarea>
                </div>

                <div class="summary-row">
                    <span class="small">Items (<?= $total_qty ?>):</span>
                    <div class="white-value-box">$<?= number_format($items_total, 2) ?></div>
                </div>
                <div class="summary-row">
                    <span class="small">Subtotal:</span>
                    <div class="white-value-box">$<?= number_format($items_total, 2) ?></div>
                </div>
                <div class="summary-row border-bottom border-dark pb-3">
                    <span class="small">Shipping Fee:</span>
                    <div class="white-value-box">$<?= number_format($shipping_fee, 2) ?></div>
                </div>

                <div class="summary-row mt-4">
                    <span class="fw-bold h5 mb-0" style="color:var(--maroon);">Grand Total:</span>
                    <div class="white-value-box h5 mb-0" style="color:black;">$<?= number_format($grand_total, 2) ?></div>
                </div>

                <div class="mt-4">
                    <span class="small fw-bold">Payment Options</span>
                    <div class="payment-options-list">
                        <span class="pay-link active" onclick="setPay('Debit', this)">Debit</span> | 
                        <span class="pay-link" onclick="setPay('Credit', this)">Credit</span> | 
                        <span class="pay-link" onclick="setPay('Cash', this)">Cash</span> | 
                        <span class="pay-link" onclick="setPay('GCash', this)">GCash</span>
                    </div>
                    <input type="hidden" id="selectedPayment" value="Debit">
                </div>

                <button class="btn-place-order" onclick="processOrder()">PLACE ORDER</button>
            </div>
        </div>
    </div>
</div>

<!-- RECEIPT MODAL -->
<div class="modal fade" id="receiptModal" tabindex="-1"><div class="modal-dialog"><div class="modal-content">
    <div class="modal-body receipt-body">
        <h3 class="text-center fw-bold" style="font-family:'Playfair Display';">SHÀN YÚ</h3>
        <p class="text-center small">OFFICIAL RECEIPT</p>
        <div class="receipt-dashed"></div>
        <p><b>Date:</b> <?= date('M d, Y') ?></p>
        <p><b>Ship To:</b> <span id="r-addr"></span></p>
        <p><b>Method:</b> <span id="r-pay"></span></p>
        <div class="receipt-dashed"></div>
        <?php foreach ($cart_items as $item): ?>
            <div class="d-flex justify-content-between small mb-1">
                <span><?= $item['name'] ?> (x<?= $item['quantity'] ?>)</span>
                <span>$<?= number_format($item['price'] * $item['quantity'], 2) ?></span>
            </div>
        <?php endforeach; ?>
        <div class="receipt-dashed" style="border-top: 2px solid #000;"></div>
        <div class="d-flex justify-content-between fw-bold h5">
            <span>TOTAL PAID:</span>
            <span>$<?= number_format($grand_total, 2) ?></span>
        </div>
        <div class="alert alert-success text-center mt-4 border-0" style="background:#e8f5e9;">
            <b>Order Confirmed!</b><br>
            Product will ship within 3-7 days.
        </div>
        <button class="btn btn-dark w-100 mt-2" onclick="window.location.href='<?= site_url('products') ?>'">Finish</button>
    </div>
</div></div></div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function setPay(val, el) {
        document.getElementById('selectedPayment').value = val;
        document.querySelectorAll('.pay-link').forEach(link => link.classList.remove('active'));
        el.classList.add('active');
    }

    function processOrder() {
        const address = document.getElementById('address').value;
        const payment = document.getElementById('selectedPayment').value;

        if(!address) {
            alert("Please enter a shipping address.");
            return;
        }

        document.getElementById('r-addr').innerText = address;
        document.getElementById('r-pay').innerText = payment;

        const myModal = new bootstrap.Modal(document.getElementById('receiptModal'));
        myModal.show();
    }
</script>

</body>
</html>