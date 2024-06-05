<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Poster</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="<?= base_url('assets/img/favicon.ico') ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/img/apple-touch-icon.png') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/img/favicon-32x32.png') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/img/favicon-16x16.png') ?>">
    <link rel="manifest" href="<?= base_url('assets/img/site.webmanifest') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
    <script src="<?= base_url('assets/js/script.js') ?>" defer></script>
</head>
<body>

<header>
    <div class="menu">
        <ul>
            <li class="logo">
                <a href="/">Poster</a>
            </li>
            <li class="menu-toggle">
                <button id="toggle-menu">&#9776;</button>
            </li>
            <?php if(session()->get('loggedIn')): ?>
                <li class="menu-item hidden"><a href="/create">Create</a></li>
                <li class="menu-item hidden"><a href="/profile/<?= session()->get('username') ?>">Your Profile</a></li>
                <li class="menu-item hidden"><a href="/update-profile">Update Profile</a></li>
                <li class="menu-item hidden"><a href="/logout">Log Out</a></li>
            <?php else: ?>
                <li class="menu-item hidden"><a href="/signup">Sign Up</a></li>
                <li class="menu-item hidden"><a href="/login">Log In</a></li>
            <?php endif; ?>
        </ul>
    </div>
</header>