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

    <form action="<?= base_url('customers/update/' . $customer['id']) ?>" method="post">
        <?= csrf_field() ?>
        <p>
            <label>Full Name<br>
            <input type="text" name="full_name" value="<?= esc(old('full_name', $customer['full_name'])) ?>"></label>
        </p>
        <p>
            <label>Email<br>
            <input type="text" name="email" value="<?= esc(old('email', $customer['email'])) ?>"></label>
        </p>
        <p>
            <label>Phone<br>
            <input type="text" name="phone" value="<?= esc(old('phone', $customer['phone'])) ?>"></label>
        </p>
        <button type="submit">Update Customer</button>
        <a href="<?= base_url('customers') ?>">Cancel</a>
    </form>
</body>
</html>