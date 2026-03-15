<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shàn yú | Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Playfair+Display:ital,wght@0,600;1,600&family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        :root { --maroon: #800000; --cream: #F5E6BE; --green: #006400; }
        body { background-color: var(--maroon) !important; font-family: 'Poppins', sans-serif; margin: 0; }
        
        .navbar-custom { background-color: #003311; padding: 10px 60px; color: white; }
        .logo-area-nav { display: flex; align-items: center; text-decoration: none; }
        /* Logo background removed */
        .logo-circle-nav { width: 45px; height: 45px; display: flex; align-items: center; justify-content: center; margin-right: 10px; }
        .logo-circle-nav img { width: 100%; height: 100%; object-fit: contain; }
        .logo-text-nav { font-family: 'Pacifico', cursive; color: white; font-size: 1.5rem; }
        .nav-link-custom { color: #ccc; text-decoration: none; margin-left: 30px; font-size: 0.95rem; }
        .nav-link-custom:hover { color: white; }

        .sidebar-fixed { background-color: var(--cream); min-height: 100vh; padding: 30px 20px; border-right: 3px solid var(--maroon); }
        .filter-title { font-family: 'Playfair Display', serif; font-style: italic; font-size: 1.4rem; color: var(--maroon); border-bottom: 2px solid var(--maroon); margin-bottom: 15px; }
        .filter-link { display: block; color: var(--maroon); text-decoration: none; margin-bottom: 10px; font-weight: 600; font-size: 0.9rem; }
        .search-capsule { background-color: var(--cream); border-radius: 50px; border: none; padding: 10px 25px; width: 100%; max-width: 600px; }
        .cart-btn { background-color: var(--cream); color: var(--maroon); width: 45px; height: 45px; border-radius: 50%; display: flex; align-items: center; justify-content: center; text-decoration: none; }
        .iem-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 20px; }
        .iem-card { background-color: var(--cream); padding: 15px; text-align: center; border-radius: 8px; height: 320px; display: flex; flex-direction: column; justify-content: space-between; text-decoration: none; color: inherit; }
        .iem-img { height: 160px; display: flex; align-items: center; justify-content: center; }
        .iem-img img { max-width: 90%; max-height: 90%; object-fit: contain; }
        .iem-price { color: var(--green); font-weight: 800; font-size: 1.5rem; }
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
<div class="d-flex">
    <div style="width: 220px;">
        <div class="sidebar-fixed">
            <h4 class="filter-title">Filter by Price</h4>
            <a href="<?= site_url('products') ?>" class="filter-link">All Products</a>
            <a href="<?= site_url('products?price=under5') ?>" class="filter-link">Under 5$</a>
            <a href="<?= site_url('products?price=10-20') ?>" class="filter-link">10$ - 20$</a>
            <a href="<?= site_url('products?price=20-50') ?>" class="filter-link">20$ - 50$</a>
            <a href="<?= site_url('products?price=above100') ?>" class="filter-link">Above 100$</a>
            <h4 class="filter-title mt-5">Filter by Rating</h4>
            <a href="<?= site_url('products?rating=5') ?>" class="filter-link">5 Stars ★★★★★</a>
            <a href="<?= site_url('products?rating=4') ?>" class="filter-link">4 Stars ★★★★</a>
        </div>
    </div>
    <div class="flex-grow-1 p-5">
        <div class="d-flex align-items-center mb-4 gap-3">
            <form action="<?= site_url('products') ?>" method="get" class="flex-grow-1">
                <input type="text" name="search" class="search-capsule" placeholder="Search..." value="<?= $_GET['search'] ?? '' ?>">
            </form>
            <a href="<?= site_url('cart') ?>" class="cart-btn"><i class="fa-solid fa-cart-shopping"></i></a>
        </div>
        <div class="iem-grid">
            <?php foreach ($products as $p): ?>
                <a href="<?= site_url('products/details/' . $p['id']) ?>" class="iem-card shadow-sm">
                    <div class="iem-img"><img src="<?= base_url('images/' . $p['img']) ?>"></div>
                    <div class="fw-bold"><?= $p['name'] ?></div>
                    <div class="iem-price">$<?= number_format($p['price'], 2) ?></div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</body>
</html>