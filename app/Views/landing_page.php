<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shàn yú | Welcome</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- Link to your CSS -->
    <link rel="stylesheet" href="<?= base_url('css/home.css') ?>">

    <style>
        /* Specific Fix for the Transparent Logo in Top Bar */
        .logo-circle {
            background: transparent !important; /* Forces removal of white background */
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .logo-circle img {
            width: 50px;
            height: 50px;
            object-fit: contain;
        }
        
        /* Ensure the Pacifico font applies correctly to the headers */
        h1, .shop-text, .logo-text, .nav-links a, .btn-signin, .price, .product-tag, .checkout-box h3, .stats h2 {
            font-family: 'Pacifico', cursive !important;
        }

        /* Clean Link Styling for Login button */
        .btn-signin {
            text-decoration: none;
            display: inline-block;
        }
    </style>
</head>
<body>

<header>
    <div class="logo-area">
        <div class="logo-circle">
            <img src="<?= base_url('images/logo.png') ?>" alt="Logo">
        </div>
        <div class="logo-text" style="font-size: 1.8rem; color: white; margin-left: 10px;">Shàn yú</div>
    </div>
    <nav class="nav-links">
        <a href="<?= site_url('/') ?>">Home</a>
        <!-- Products check inside header as well -->
        <?php if (session()->get('isLoggedIn')): ?>
            <a href="<?= site_url('products') ?>">Products</a>
        <?php else: ?>
            <a href="<?= site_url('login') ?>" onclick="alert('Please sign in first to view products!')">Products</a>
        <?php endif; ?>
        <a href="<?= site_url('cart') ?>">Cart</a>
    </nav>
</header>

<section class="hero">
    <div class="hero-left">
        <div class="badge-row">
            <div class="number-badge">#1</div>
            <div class="platform-tag">CHINESE LISTENING PLATFORM</div>
        </div>
        <h1>Join now!</h1>
        <div class="shop-text">Shop & enjoy!</div>
        
        <?php if (!session()->get('isLoggedIn')): ?>
            <a href="<?= site_url('login') ?>" class="btn-signin">Sign in</a>
        <?php else: ?>
            <div class="btn-signin" style="background: #28a745; font-size: 1.2rem;">Welcome, <?= session()->get('username') ?>!</div>
        <?php endif; ?>
    </div>

    <div class="hero-right">
        <!-- Floating Product Card with Login Validation -->
        <div class="product-card">
            <?php if (session()->get('isLoggedIn')): ?>
                <a href="<?= site_url('products') ?>" class="product-tag" style="text-decoration: none;">
                    Products ➔
                </a>
            <?php else: ?>
                <a href="<?= site_url('login') ?>" class="product-tag" style="text-decoration: none;" onclick="return confirm('You must sign in to view our products. Go to login page?')">
                    Products ➔
                </a>
            <?php endif; ?>
            
            <img src="<?= base_url('images/Waner2Jade.png') ?>" alt="WanerJade" class="product-img">
            <div class="price"><?= $productPrice ?></div>
        </div>
        
        <!-- Main Model Image -->
        <img src="<?= base_url('images/Waner2JadeModel.jpg') ?>" alt="Model" class="model-img">

        <!-- Review Bubble -->
        <div class="review-bubble">
            <img src="<?= base_url('images/avatar.png') ?>" alt="avatar" class="review-avatar">
            <div>
                <div style="color: var(--gold); font-size: 0.9rem;">Reviews: ⭐⭐⭐⭐⭐</div>
                <div style="font-style: italic; font-size: 0.8rem;">Meow: Very good audio I love it so much! 5 stars for me!</div>
            </div>
        </div>
    </div>
</section>

<!-- Footer Section with overlapping box -->
<div class="bottom-bar">
    <div class="checkout-box">
        <h3>One-click express checkout!</h3>
        <p>Store your payment and shipping info for fast future checkouts!</p>
        <a href="#" class="learn-more">
            <span>Learn more</span>
            <span class="arrow">➔</span>
        </a>
    </div>

    <div class="stats">
        <h2>100k+</h2>
        <div class="stats-label">Daily<br>users</div>
    </div>

    <div class="about-text">
        Shàn yú directly translates to "to be good at", making sure our store aims to be good at providing you high fidelity audio equipment.
    </div>
</div>

</body>
</html>