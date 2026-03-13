<head>
    <link rel="stylesheet" href="<?= base_url('css/register.css') ?>">
</head>
<body>
    <div class="register-card">
        <h1>HELLO!</h1>
        <?= form_open('register/store') ?>
            <input type="text" name="name" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Sign Up</button>
        <?= form_close() ?>
    </div>
</body>