<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome Back | Shàn yú</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/login.css') ?>">
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

<div class="login-wrapper">
    <div class="decorative-circle-right"></div>
    <div class="login-card shadow-lg">
        <p class="subtitle">Please enter your details</p>
        <h1 class="welcome-text">Welcome back!!</h1>

        <!-- ERROR OR SUCCESS MESSAGES -->
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger py-2 text-center" style="font-size: 0.8rem; font-weight: bold;">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success py-2 text-center" style="font-size: 0.8rem; font-weight: bold;">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('login/authenticate') ?>" method="post">
            <div class="input-group-custom"><input type="email" name="email" placeholder="Email address" required></div>
            <div class="input-group-custom"><input type="password" name="password" placeholder="Password" required></div>
            <div class="remember-me">
                <input type="checkbox" id="remember"> <label for="remember">Remember for 30 days</label>
            </div>
            <button type="submit" class="btn-login">Sign In</button>
        </form>

        <div class="text-center mt-3">
            <a href="<?= site_url('register') ?>" class="footer-link">Don't have an account?</a>
        </div>
    </div>
</div>
</body>
</html>