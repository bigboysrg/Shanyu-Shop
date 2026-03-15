<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Cart | Shàn yú</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    
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

        /* Top Navbar */
        .navbar-custom {
            background-color: var(--dark-green);
            padding: 15px 60px;
            color: white;
        }
        .nav-link-custom {
            color: #ccc;
            text-decoration: none;
            margin-left: 30px;
        }

        /* Containers */
        .cart-container {
            background-color: var(--cream);
            border-radius: 15px;
            padding: 40px;
            border: 1px solid rgba(0,0,0,0.1);
            min-height: 600px;
        }

        .summary-container {
            background-color: var(--cream);
            border-radius: 15px;
            padding: 30px;
            border: 1px solid var(--maroon);
        }

        /* Cart Items */
        .cart-header {
            font-family: 'Playfair Display', serif;
            font-style: italic;
            font-size: 32px;
            color: var(--maroon);
            border-bottom: 2px solid var(--maroon);
            margin-bottom: 30px;
        }

        .cart-item-box {
            background: #fff;
            border: 1.5px solid var(--maroon);
            border-radius: 10px;
            padding: 20px;
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .item-img-holder {
            width: 120px;
            height: 100px;
            border: 1px solid var(--maroon);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 25px;
            background: white;
        }
        .item-img-holder img { max-width: 90%; max-height: 90%; object-fit: contain; }

        .item-name { color: #000; font-weight: bold; font-size: 1.1rem; margin-bottom: 5px; }
        .item-qty { color: #555; font-size: 0.95rem; margin-bottom: 5px; }
        .item-price { color: var(--price-green); font-weight: bold; font-size: 1.2rem; }

        /* Summary Fields */
        .summary-title {
            font-family: 'Playfair Display', serif;
            color: var(--maroon);
            font-weight: bold;
            border-bottom: 1.5px solid var(--maroon);
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .summary-label { font-size: 0.9rem; }
        .white-input-box {
            background: white;
            border: 1.5px solid var(--maroon);
            padding: 5px 15px;
            text-align: right;
            font-weight: bold;
            min-width: 120px;
        }

        textarea.white-input-box {
            text-align: left;
            width: 100%;
            font-size: 0.85rem;
            font-weight: normal;
        }

        /* Payment Options Custom Styling */
        .payment-option {
            cursor: pointer;
            padding: 5px 10px;
            border: 1px solid transparent;
            transition: 0.2s;
        }
        .payment-option:hover { color: var(--maroon); }
        input[type="radio"]:checked + label {
            font-weight: bold;
            color: var(--maroon);
            text-decoration: underline;
        }

        .btn-place-order {
            background-color: #700000;
            color: white;
            width: 100%;
            border: none;
            padding: 15px;
            font-weight: bold;
            text-transform: uppercase;
            margin-top: 25px;
            transition: 0.3s;
        }
        .btn-place-order:hover { background-color: #500000; }

        /* Receipt Modal Styling */
        .receipt-body { font-family: 'Courier New', Courier, monospace; }
        .receipt-line { border-bottom: 1px dashed #ccc; padding: 5px 0; }
    </style>
</head>
<body>

<nav class="navbar-custom d-flex justify-content-between align-items-center">
    <div class="d-flex align-items-center">
        <span class="fw-bold italic">Shàn yú</span>
    </div>
    <div class="d-flex">
        <a href="<?= site_url('/') ?>" class="nav-link-custom">Home</a>
        <a href="<?= site_url('products') ?>" class="nav-link-custom">Products</a>
        <a href="<?= site_url('cart') ?>" class="nav-link-custom fw-bold text-white">Cart</a>
    </div>
</nav>

<div class="container py-5">
    <a href="<?= site_url('products') ?>" class="text-white text-decoration-none fw-bold mb-4 d-inline-block">← Back to Store</a>
    
    <div class="row g-4">
        <!-- LEFT PANEL: CART -->
        <div class="col-lg-8">
            <div class="cart-container shadow">
                <div class="cart-header">Your Shopping Cart</div>
                
                <?php if (!empty($cart_items)): ?>
                    <?php foreach ($cart_items as $id => $item): ?>
                        <div class="cart-item-box">
                            <div class="item-img-holder">
                                <img src="<?= base_url('images/' . $item['img']) ?>">
                            </div>
                            <div class="flex-grow-1">
                                <div class="item-name"><?= $item['name'] ?></div>
                                <div class="item-qty">Qty: <?= $item['quantity'] ?></div>
                                <div class="item-price">$<?= number_format($item['price'], 2) ?></div>
                            </div>
                            <a href="<?= site_url('cart/remove/' . $id) ?>" class="text-maroon text-decoration-underline small">Remove</a>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-center py-5 italic text-muted">Your cart is empty.</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- RIGHT PANEL: SUMMARY -->
        <div class="col-lg-4">
            <div class="summary-container shadow">
                <h5 class="summary-title">Order Summary</h5>
                
                <div class="mb-3">
                    <label class="summary-label">Shipping Address</label>
                    <textarea id="address" class="white-input-box" rows="2" placeholder="Enter complete address..."></textarea>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="summary-label">Items (<?= $total_qty ?>):</span>
                    <div class="white-input-box">$<?= number_format($items_total, 2) ?></div>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="summary-label">Subtotal:</span>
                    <div class="white-input-box">$<?= number_format($items_total, 2) ?></div>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-4 border-bottom border-dark pb-3">
                    <span class="summary-label">Shipping Fee:</span>
                    <div class="white-input-box">$<?= number_format($shipping_fee, 2) ?></div>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <span class="fw-bold" style="color:var(--maroon);">Grand Total:</span>
                    <div class="white-input-box h5 mb-0" style="color:black;">$<?= number_format($grand_total, 2) ?></div>
                </div>

                <div class="mt-4">
                    <span class="summary-label fw-bold">Payment Options</span>
                    <div class="d-flex flex-wrap gap-2 mt-2 small text-muted">
                        <input type="radio" name="pay" id="debit" value="Debit" class="d-none" checked>
                        <label for="debit" class="payment-option">Debit</label> |
                        <input type="radio" name="pay" id="credit" value="Credit" class="d-none">
                        <label for="credit" class="payment-option">Credit</label> |
                        <input type="radio" name="pay" id="cash" value="Cash" class="d-none">
                        <label for="cash" class="payment-option">Cash</label> |
                        <input type="radio" name="pay" id="gcash" value="GCash" class="d-none">
                        <label for="gcash" class="payment-option">GCash</label>
                    </div>
                </div>

                <button class="btn-place-order" onclick="processOrder()">PLACE ORDER</button>
            </div>
        </div>
    </div>
</div>

<!-- RECEIPT MODAL -->
<div class="modal fade" id="receiptModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title">Order Receipt</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body receipt-body">
                <div class="text-center mb-4">
                    <h4 class="fw-bold">SHÀN YÚ</h4>
                    <p class="small text-muted">Official Order Confirmation</p>
                </div>
                
                <div class="receipt-line d-flex justify-content-between">
                    <span>Order Date:</span> <span><?= date('M d, Y') ?></span>
                </div>
                <div class="receipt-line d-flex justify-content-between">
                    <span>Address:</span> <span id="r-address" class="text-end" style="max-width:200px"></span>
                </div>
                <div class="receipt-line d-flex justify-content-between">
                    <span>Payment:</span> <span id="r-payment"></span>
                </div>

                <div class="mt-4 mb-2 fw-bold">Items Purchased:</div>
                <?php foreach ($cart_items as $item): ?>
                    <div class="d-flex justify-content-between small">
                        <span><?= $item['name'] ?> (x<?= $item['quantity'] ?>)</span>
                        <span>$<?= number_format($item['price'] * $item['quantity'], 2) ?></span>
                    </div>
                <?php endforeach; ?>

                <div class="mt-4 pt-2 border-top border-dark d-flex justify-content-between fw-bold h5">
                    <span>TOTAL PAID:</span>
                    <span>$<?= number_format($grand_total, 2) ?></span>
                </div>

                <div class="alert alert-success mt-4 text-center py-2">
                    <i class="small">Thank you for your purchase!</i><br>
                    <strong>Your product will ship within 3-7 days.</strong>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark w-100" onclick="window.location.href='<?= site_url('products') ?>'">Return to Store</button>
            </div>
        </div>
    </div>
</div>

<!-- JS FOR THE POPUP -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function processOrder() {
        const address = document.getElementById('address').value;
        const payment = document.querySelector('input[name="pay"]:checked').value;

        if(!address) {
            alert("Please enter a shipping address.");
            return;
        }

        // Fill receipt
        document.getElementById('r-address').innerText = address;
        document.getElementById('r-payment').innerText = payment;

        // Show modal
        const myModal = new bootstrap.Modal(document.getElementById('receiptModal'));
        myModal.show();
    }
</script>

</body>
</html>