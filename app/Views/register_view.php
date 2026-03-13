<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="<?= base_url('css/topbar.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/register.css') ?>">
</head>
<body>

    <?= view('topbar') ?>

    <div class="register-container">
        <div class="register-card">
            <h1>Register</h1>
            <?= form_open('register/store') ?>
                <input type="text" name="name" placeholder="Username" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Sign Up</button>
            <?= form_close() ?>
        </div>
    </div>

</body>
</html>