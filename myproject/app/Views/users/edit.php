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

    <form action="<?= base_url('users/update/' . $user['id']) ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <p>
            <label>Username<br>
            <input type="text" name="username" value="<?= esc(old('username', $user['username'])) ?>"></label>
        </p>
        <p>
            <label>Full Name<br>
            <input type="text" name="full_name" value="<?= esc(old('full_name', $user['full_name'])) ?>"></label>
        </p>
        <p>
            <?php if (! empty($user['avatar'])): ?>
                Current picture:<br>
                <img src="<?= base_url('uploads/avatars/' . $user['avatar']) ?>" width="75" height="75" alt="Avatar"><br>
            <?php endif; ?>
            <label>Profile Picture (JPG or PNG, max 2MB)<br>
            <input type="file" name="avatar" accept=".jpg,.jpeg,.png,image/jpeg,image/png"></label>
        </p>
        <button type="submit">Update User</button>
        <a href="<?= base_url('users') ?>">Cancel</a>
    </form>
</body>
</html>     