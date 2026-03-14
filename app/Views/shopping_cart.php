<!-- 
    Bulletproof Shopping Cart View 
    Fixes: Overlapping elements, Transparency, and Layout Collapsing
-->

<style>
    /* 1. Reset and Page Background */
    .cart-page-outer {
        background-color: #800000; /* Deep Maroon */
        min-height: 100vh;
        padding: 40px 20px;
        font-family: 'Poppins', sans-serif;
        color: #2c2c2c;
    }

    /* 2. Layout Wrapper (Stops overlapping) */
    .cart-flex-container {
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
        max-width: 1200px;
        margin: 0 auto;
        align-items: flex-start;
    }

    /* 3. Left Side: Items (70% width) */
    .cart-items-column {
        flex: 2;
        min-width: 350px;
    }

    /* 4. Right Side: Summary (30% width) */
    .cart-summary-column {
        flex: 1;
        min-width: 320px;
    }

    /* 5. Solid Cream Boxes (Added !important to stop transparency) */
    .solid-cream-box {
        background-color: #F5E6BE !important; 
        border: 2px solid #5a0000;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    }

    /* 6. Product Card Styling */
    .cart-item-card {
        background: rgba(255, 255, 255, 0.6);
        border: 1px solid #800000;
        border-radius: 8px;
        padding: 20px;
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }

    .cart-item-img {
        width: 100px;
        height: 80px;
        background: #fff;
        border: 1px solid #800000;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 20px;
        overflow: hidden;
        flex-shrink: 0;
    }

    .cart-item-img img {
        max-width: 90%;
        max-height: 90%;
    }

    /* 7. Summary Details */
    .summary-title {
        font-family: 'Playfair Display', serif;
        font-weight: bold;
        color: #800000;
        border-bottom: 2px solid #800000;
        padding-bottom: 10px;
        margin-bottom: 20px;
    }

    .detail-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
        font-weight: 500;
    }

    .price-box {
        background: white;
        border: 1px solid #800000;
        padding: 5px 15px;
        font-weight: bold;
        min-width: 100px;
        text-align: right;
    }

    .btn-place-order {
        background-color: #800000;
        color: #F5E6BE;
        width: 100%;
        padding: 15px;
        border: none;
        border-radius: 5px;
        font-weight: bold;
        text-transform: uppercase;
        margin-top: 20px;
        cursor: pointer;
    }

    .btn-place-order:hover {
        background-color: #5a0000;
    }

    .back-store-link {
        color: white;
        text-decoration: none;
        display: inline-block;
        margin-bottom: 20px;
        font-weight: bold;
    }
</style>

<div class="cart-page-outer">
    <div class="container-fluid">
        <a href="<?= site_url('products') ?>" class="back-store-link">← Back to Store</a>

        <div class="cart-flex-container">
            
            <!-- LEFT COLUMN: ITEMS -->
            <div class="cart-items-column">
                <div class="solid-cream-box">
                    <h2 class="summary-title" style="font-size: 32px; font-style: italic;">Your Shopping Cart</h2>
                    
                    <?php 
                    $subtotal = 0; 
                    $total_qty = 0; 
                    ?>

                    <?php if (!empty($cart_items)): ?>
                        <?php foreach ($cart_items as $item): 
                            $line_total = $item['price'] * $item['qty'];
                            $subtotal += $line_total;
                            $total_qty += $item['qty'];
                        ?>
                            <div class="cart-item-card">
                                <div class="cart-item-img">
                                    <img src="<?= base_url('images/' . $item['img']) ?>" alt="Product">
                                </div>
                                <div style="flex-grow: 1;">
                                    <h5 class="fw-bold mb-1"><?= $item['name'] ?></h5>
                                    <p class="mb-0 text-muted">Qty: <?= $item['qty'] ?></p>
                                    <div style="color: #006400; font-weight: bold; font-size: 1.2rem;">$<?= number_format($item['price'], 2) ?></div>
                                </div>
                                <a href="<?= site_url('cart/remove/'.$item['id']) ?>" class="btn btn-sm btn-outline-danger">Remove</a>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div style="text-align: center; padding: 60px 0;">
                            <p style="font-style: italic; color: #666;">Your cart is empty. Add products to begin checkout.</p>
                            <a href="<?= site_url('products') ?>" class="btn btn-dark mt-3">Go to Shop</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- RIGHT COLUMN: SUMMARY -->
            <div class="cart-summary-column">
                <div class="solid-cream-box">
                    <h4 class="summary-title">Order Summary</h4>
                    
                    <div style="margin-bottom: 20px;">
                        <label class="fw-bold small d-block mb-1">Shipping Address</label>
                        <textarea class="form-control" rows="2" style="border: 1px solid #800000; border-radius: 0;" placeholder="Enter complete address..."></textarea>
                    </div>

                    <div class="detail-row">
                        <span>Items (<?= $total_qty ?>):</span>
                        <div class="price-box">$<?= number_format($subtotal, 2) ?></div>
                    </div>
                    
                    <div class="detail-row">
                        <span>Subtotal:</span>
                        <div class="price-box">$<?= number_format($subtotal, 2) ?></div>
                    </div>

                    <?php $shipping = ($subtotal > 0) ? 50.00 : 0; ?>
                    <div class="detail-row" style="border-bottom: 2px solid #800000; padding-bottom: 15px;">
                        <span>Shipping Fee:</span>
                        <div class="price-box">$<?= number_format($shipping, 2) ?></div>
                    </div>

                    <div class="detail-row mt-3">
                        <span class="h5 fw-bold" style="color: #800000;">Grand Total:</span>
                        <div class="price-box h5 mb-0" style="background: #fff;">$<?= number_format($subtotal + $shipping, 2) ?></div>
                    </div>

                    <div class="mt-4">
                        <label class="fw-bold small d-block mb-1">Payment Options</label>
                        <p class="small">Debit | Credit | Cash | GCash</p>
                    </div>

                    <button class="btn-place-order" <?= ($total_qty == 0) ? 'disabled style="opacity:0.5;"' : '' ?>>
                        Place Order
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>