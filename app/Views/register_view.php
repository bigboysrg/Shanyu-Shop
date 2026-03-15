<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Join Now | Shàn yú</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/register.css') ?>">
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

<div class="register-wrapper">
    <div class="decorative-circle-left"></div>
    <div class="register-card shadow-lg">
        <p class="subtitle">START YOUR JOURNEY</p>
        <h1 class="welcome-text">Join now!</h1>

        <!-- ERROR DISPLAY -->
        <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert alert-danger p-2" style="font-size: 0.75rem;">
                <ul class="mb-0">
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('register/store') ?>" method="post">
            <div class="input-group-custom"><input type="text" name="username" placeholder="Username" value="<?= old('username') ?>" required></div>
            <div class="input-group-custom"><input type="email" name="email" placeholder="Email address" value="<?= old('email') ?>" required></div>
            <div class="input-group-custom"><input type="password" name="password" placeholder="Password" required></div>
            <button type="submit" class="btn-register">Create Account</button>
        </form>

        <div class="text-center mt-3">
            <p class="small text-muted">Already have an account? <a href="<?= site_url('login') ?>" class="text-danger fw-bold text-decoration-none">Sign in</a></p>
        </div>
    </div>
</div>
</body>
</html>