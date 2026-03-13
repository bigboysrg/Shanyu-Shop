<link rel="stylesheet" href="<?= base_url('css/login.css') ?>">

<div class="login-wrapper">
    <!-- The large decorative green circle on the right -->
    <div class="decorative-circle"></div>

    <div class="login-card">
        <p class="subtitle">Please enter your details</p>
        <h1 class="welcome-text">Welcome back!!</h1>

        <form action="<?= site_url('login/authenticate') ?>" method="post">
            <div class="input-group">
                <input type="email" name="email" placeholder="Email address" required>
            </div>

            <div class="input-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <div class="remember-me">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Remember for 30 days</label>
            </div>

            <button type="submit" class="btn-login">Sign Up</button>
        </form>

        <a href="<?= site_url('register') ?>" class="footer-link">Don't have an account?</a>
    </div>
</div>