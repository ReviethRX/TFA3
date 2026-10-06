<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title) ?></title>
</head>
<body>
    <nav>
        <a href="<?= base_url('/') ?>">Home</a> |
        <a href="<?= base_url('about') ?>">About</a> |
        <a href="<?= base_url('customers') ?>">Customer Accounts</a> |
        <a href="<?= base_url('users') ?>">User Accounts</a>
    </nav>
    <hr>
    <h1><?= esc($title) ?></h1>

    <?php if (session()->getFlashdata('errors')): ?>
        <ul style="color:red;">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="<?= base_url('customers/create') ?>" method="post">
        <?= csrf_field() ?>
        <p>
            <label>Full Name<br>
            <input type="text" name="full_name" value="<?= esc(old('full_name')) ?>"></label>
        </p>
        <p>
            <label>Email<br>
            <input type="text" name="email" value="<?= esc(old('email')) ?>"></label>
        </p>
        <p>
            <label>Phone<br>
            <input type="text" name="phone" value="<?= esc(old('phone')) ?>"></label>
        </p>
        <button type="submit">Save Customer</button>
        <a href="<?= base_url('customers') ?>">Cancel</a>
    </form>
</body>
</html>