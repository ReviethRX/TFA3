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

    <?php if (session()->getFlashdata('message')): ?>
        <p style="color:green;"><?= esc(session()->getFlashdata('message')) ?></p>
    <?php endif; ?>
    <p><a href="<?= base_url('users/new') ?>">+ Add New User</a></p>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Avatar</th>
                <th>Username</th>
                <th>Full Name</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <?php
                    $hasAvatar = ! empty($user['avatar']) && is_file(FCPATH . 'uploads/avatars/' . $user['avatar']);
                    $avatarUrl = $hasAvatar
                        ? base_url('uploads/avatars/' . $user['avatar'])
                        : base_url('uploads/avatars/placeholder.svg');
                ?>
                <tr>
                    <td><img src="<?= esc($avatarUrl) ?>" width="50" height="50" alt="Avatar of <?= esc($user['username']) ?>"></td>
                    <td><?= esc($user['username']) ?></td>
                    <td><?= esc($user['full_name']) ?></td>
                    <td><?= esc($user['created_at']) ?></td>
                    <td><a href="<?= base_url('users/edit/' . $user['id']) ?>">Edit</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>