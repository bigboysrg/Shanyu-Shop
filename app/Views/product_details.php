<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $product['name'] ?> | Shàn yú</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Playfair+Display:ital,wght@0,700;1,700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        :root { --maroon: #800000; --cream: #F5E6BE; --green: #006400; }
        body { background-color: var(--maroon); font-family: 'Poppins', sans-serif; margin: 0; padding-bottom: 50px; }
        
        .navbar-custom { background-color: #003311; padding: 10px 60px; color: white; }
        .logo-area-nav { display: flex; align-items: center; text-decoration: none; }
        .logo-circle-nav { width: 45px; height: 45px; display: flex; align-items: center; justify-content: center; margin-right: 10px; }
        .logo-circle-nav img { width: 100%; height: 100%; object-fit: contain; }
        .logo-text-nav { font-family: 'Pacifico', cursive; color: white; font-size: 1.5rem; }
        .nav-link-custom { color: #ccc; text-decoration: none; margin-left: 30px; font-size: 0.95rem; }

        .main-card { background-color: var(--cream); margin: 50px auto; max-width: 1050px; border-radius: 12px; padding: 50px; border: 1px solid rgba(0,0,0,0.1); box-shadow: 0 10px 40px rgba(0,0,0,0.4); }
        .back-to-shop { color: var(--maroon); text-decoration: none; font-weight: bold; font-size: 0.85rem; text-transform: uppercase; margin-bottom: 30px; display: inline-block; }
        .img-container { background: #fff; border: 1.5px solid var(--maroon); height: 450px; display: flex; align-items: center; justify-content: center; padding: 20px; }
        .img-container img { max-width: 95%; max-height: 95%; object-fit: contain; }
        .prod-title { font-family: 'Playfair Display', serif; color: var(--maroon); font-size: 3rem; line-height: 1.1; margin-bottom: 5px; }
        .prod-price { color: var(--green); font-size: 2.5rem; font-weight: bold; margin: 20px 0; }
        .qty-btn { border: 1px solid #444; background: transparent; width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; font-weight: bold; }
        .qty-input { width: 60px; height: 32px; text-align: center; border: 1.5px solid var(--maroon); margin: 0 10px; font-weight: bold; }
        .btn-add-cart { background: #000; color: white; border: none; padding: 12px; font-weight: bold; flex-grow: 1; display: flex; align-items: center; justify-content: center; gap: 8px; }
        .btn-order-now { background: #3d3d3d; color: white; width: 100%; border: none; padding: 14px; font-weight: bold; text-transform: uppercase; margin-top: 15px; }
        .shop-badge { margin-top: 50px; padding-top: 20px; border-top: 1px solid rgba(0,0,0,0.1); display: flex; align-items: center; }
        .shop-icon { background: var(--maroon); color: white; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; margin-right: 15px; }

        .tabs-header { border-bottom: 2px solid rgba(0,0,0,0.1); margin-top: 60px; display: flex; }
        .tab-item { font-weight: bold; padding: 10px 0; margin-right: 40px; color: #555; border-bottom: 3px solid transparent; }
        .tab-item.active { color: #000; border-bottom: 3px solid #000; }
        .tab-content-box { background: white; padding: 25px; border: 1px solid #ddd; margin-top: 20px; color: #444; line-height: 1.6; }
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
        <a href="<?= site_url('cart') ?>" class="nav-link-custom">Cart</a>
    </div>
</nav>
<div class="container d-flex justify-content-center">
    <div class="main-card">
        <a href="<?= site_url('products') ?>" class="back-to-shop">← BACK TO SHOP</a>
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <div class="img-container"><img src="<?= base_url('images/' . $product['img']) ?>"></div>
            </div>
            <div class="col-lg-6">
                <form action="<?= site_url('cart/add') ?>" method="post">
                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                    <h1 class="prod-title"><?= $product['name'] ?></h1>
                    <div class="text-muted small italic"><?= $product['overview'] ?></div>
                    <div class="prod-price">$<?= number_format($product['price'], 2) ?></div>
                    <div class="d-flex align-items-center mb-4">
                        <span class="fw-bold me-3 small">Quantity</span>
                        <button type="button" class="qty-btn" onclick="adj(-1)">-</button>
                        <input type="number" name="quantity" id="qty" class="qty-input" value="1" min="1" readonly>
                        <button type="button" class="qty-btn" onclick="adj(1)">+</button>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn-add-cart">🛒 Add to Cart</button>
                        <button type="button" class="btn btn-outline-dark px-3">♡</button>
                    </div>
                    <button type="submit" class="btn-order-now">Place Order Now</button>
                </form>
                <div class="shop-badge">
                    <div class="shop-icon">S</div>
                    <span class="fw-bold">Shàn yú Official Shop</span>
                </div>
            </div>
        </div>
        <div class="tabs-header">
            <div class="tab-item active">About Item</div>
            <div class="tab-item">Reviews</div>
        </div>
        <div class="tab-content-box"><?= $product['description'] ?></div>
    </div>
</div>
<script>function adj(n){let i=document.getElementById('qty'); let v=parseInt(i.value)+n; if(v>=1)i.value=v;}</script>
</body>
</html>