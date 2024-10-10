<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Poster</title>
    <meta name="description" content="A posting site">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="<?= base_url('assets/img/favicon.ico') ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/img/apple-touch-icon.png') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/img/favicon-32x32.png') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/img/favicon-16x16.png') ?>">
    <link rel="manifest" href="<?= base_url('assets/img/site.webmanifest') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
    <script src="<?= base_url('assets/js/script.js') ?>" defer></script>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark">
        <div class="container-sm">
            <a href="/home" class="navbar-brand">
                <span class="fw-bold fs-2 text-white">
                    Poster
                </span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle Menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end align-center" id="menu">
                <ul class="navbar-nav">
                    <?php if(session()->get('loggedIn')): ?>
                        <li class="nav-item">
                            <a href="/profile/<?= session()->get('username') ?>" class="text-white nav-link">Your Profile</a>
                        </li>
                        <li class="nav-item">
                            <a href="/update-profile" class="text-white nav-link">Update Profile</a>
                        </li>
                        <li class="nav-item">
                            <a href="/logout" class="text-white nav-link">Log Out</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a href="/signup" class="text-white nav-link">Sign Up</a>
                        </li>
                        <li class="nav-item">
                            <a href="/login" class="text-white nav-link">Log In</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>