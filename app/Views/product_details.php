<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $product['name'] ?> | Shàn yú</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --maroon: #800000;
            --cream: #F5E6BE;
            --green: #006400;
            --dark-bg: #404040;
        }

        body { 
            background-color: var(--maroon); 
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding-bottom: 50px;
        }

        /* Top Navbar */
        .navbar-custom {
            background-color: #003311;
            padding: 15px 60px;
            color: white;
        }
        .nav-link-custom {
            color: #ccc;
            text-decoration: none;
            margin-left: 30px;
            font-size: 0.95rem;
        }
        .nav-link-custom:hover { color: white; }

        /* Main Container - No Sidebar */
        .main-card {
            background-color: var(--cream);
            margin: 40px auto;
            max-width: 1100px;
            border-radius: 8px;
            padding: 50px;
            border: 1px solid rgba(128, 0, 0, 0.3);
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        .back-to-shop {
            color: var(--maroon);
            text-decoration: none;
            font-weight: bold;
            font-size: 0.85rem;
            text-transform: uppercase;
            margin-bottom: 30px;
            display: inline-block;
        }

        /* Image Box */
        .img-container {
            background: #fff;
            border: 1.5px solid var(--maroon);
            width: 100%;
            height: 480px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .img-container img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        /* Typography */
        .prod-title {
            font-family: 'Playfair Display', serif;
            color: var(--maroon);
            font-size: 3rem;
            line-height: 1;
            margin-bottom: 5px;
        }
        .prod-subtitle {
            color: #777;
            font-size: 1.1rem;
            margin-bottom: 25px;
        }
        .prod-price {
            color: var(--green);
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 30px;
        }

        /* Form Controls */
        .qty-label { font-size: 0.9rem; font-weight: bold; width: 80px; }
        .qty-btn {
            border: 1px solid #444;
            background: transparent;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
        .qty-input {
            width: 60px;
            height: 32px;
            text-align: center;
            border: 1.5px solid var(--maroon);
            margin: 0 10px;
            font-weight: bold;
        }

        /* Buttons Row */
        .action-row { display: flex; gap: 10px; margin-top: 25px; }
        
        .btn-add-cart {
            background-color: #000;
            color: white;
            border: none;
            flex-grow: 1;
            padding: 12px;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-wishlist {
            background: transparent;
            border: 1px solid #444;
            padding: 10px 15px;
            display: flex;
            align-items: center;
        }

        .btn-order-now {
            background-color: #3d3d3d;
            color: white;
            width: 100%;
            border: none;
            padding: 14px;
            font-weight: bold;
            text-transform: uppercase;
            margin-top: 15px;
        }

        /* Badge Footer */
        .shop-badge {
            margin-top: 60px;
            padding-top: 20px;
            border-top: 1px solid rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
        }
        .shop-icon {
            background-color: var(--maroon);
            color: white;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-right: 15px;
        }

        /* Tabs */
        .tabs-section { margin-top: 80px; }
        .tab-btn {
            background: transparent;
            border: none;
            font-weight: bold;
            padding: 10px 0;
            margin-right: 30px;
            color: #777;
            border-bottom: 3px solid transparent;
        }
        .tab-btn.active {
            color: #000;
            border-bottom: 3px solid #000;
        }
        .tab-content-box {
            background: white;
            padding: 25px;
            border: 1px solid #eee;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<nav class="navbar-custom d-flex justify-content-between align-items-center">
    <div class="d-flex align-items-center">
        <img src="<?= base_url('images/logo.png') ?>" height="35" class="me-2"> <!-- Update with your logo path -->
        <span class="fw-bold italic">Shàn yú</span>
    </div>
    <div class="d-flex">
        <a href="<?= site_url('/') ?>" class="nav-link-custom">Home</a>
        <a href="<?= site_url('products') ?>" class="nav-link-custom">Products</a>
        <a href="<?= site_url('cart') ?>" class="nav-link-custom">Cart</a>
    </div>
</nav>

<div class="container">
    <div class="main-card">
        <a href="<?= site_url('products') ?>" class="back-to-shop">← BACK TO SHOP</a>
        
        <div class="row g-5">
            <!-- Left Side: Image -->
            <div class="col-lg-6">
                <div class="img-container">
                    <img src="<?= base_url('images/' . $product['img']) ?>" alt="<?= $product['name'] ?>">
                </div>
            </div>

            <!-- Right Side: Buying Details -->
            <div class="col-lg-6">
                <form action="<?= site_url('cart/add') ?>" method="post">
                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                    
                    <h1 class="prod-title"><?= $product['name'] ?></h1>
                    <div class="prod-subtitle">Entry-level King</div> <!-- Static mock text -->
                    
                    <div class="prod-price">$<?= number_format($product['price'], 2) ?></div>

                    <div class="d-flex align-items-center mb-4">
                        <span class="qty-label">Quantity</span>
                        <button type="button" class="qty-btn" onclick="adjustQty(-1)">-</button>
                        <input type="number" name="quantity" id="qty" class="qty-input" value="1" min="1" readonly>
                        <button type="button" class="qty-btn" onclick="adjustQty(1)">+</button>
                    </div>

                    <div class="small mb-2"><strong>Shipping:</strong> Standard 3-5 Days</div>
                    <div class="small mb-4"><strong>Payment:</strong> GCash, COD, Credit Card</div>

                    <div class="action-row">
                        <button type="submit" class="btn-add-cart">
                            <span style="font-size:1.2rem;">🛒</span> Add to Cart
                        </button>
                        <button type="button" class="btn-wishlist">♡</button>
                    </div>
                    
                    <button type="submit" class="btn-order-now">Place Order Now</button>
                </form>

                <div class="shop-badge">
                    <div class="shop-icon">S</div>
                    <span class="fw-bold">Shàn yú Official Shop</span>
                </div>
            </div>
        </div>

        <!-- Bottom: About Section -->
        <div class="tabs-section">
            <div class="d-flex border-bottom">
                <button class="tab-btn active">About Item</button>
                <button class="tab-btn">Reviews</button>
            </div>
            <div class="tab-content-box">
                <p class="mb-0 text-muted">
                    <?= $product['desc'] ?? "The successor to the CHU, featuring a replaceable cable and refined tuning." ?>
                </p>
            </div>
        </div>
    </div>
</div>

<script>
    function adjustQty(amount) {
        const qtyInput = document.getElementById('qty');
        let val = parseInt(qtyInput.value) + amount;
        if (val >= 1) qtyInput.value = val;
    }
</script>

</body>
</html>