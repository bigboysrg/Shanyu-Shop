<link rel="stylesheet" href="<?= base_url('css/register.css') ?>">

<div class="register-wrapper">
    <!-- Decorative background element -->
    <div class="bg-decoration"></div>

    <div class="register-card">
        <p class="subtitle">Start your journey</p>
        <h1 class="main-title">Join now!</h1>

        <form action="<?= site_url('register/store') ?>" method="post">
            <div class="input-row">
                <input type="text" name="username" placeholder="Username" required>
            </div>

            <div class="input-row">
                <input type="email" name="email" placeholder="Email address" required>
            </div>

            <div class="input-row">
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <button type="submit" class="btn-register">Create Account</button>
        </form>

        <p class="login-prompt">
            Already have an account? <a href="<?= site_url('login') ?>">Sign in</a>
        </p>
    </div>
</div>