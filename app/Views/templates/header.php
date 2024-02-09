<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Poster</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
</head>
<body>

<!-- HEADER: MENU + HEROE SECTION -->
<header>
    <div class="menu">
        <ul>
            <li class="logo">
                <a href="/">Poster</a>
            </li>
            <li class="menu-toggle">
                <button onclick="toggleMenu();">&#9776;</button>
            </li>
            <li class="menu-item hidden"><a href="/">Home</a></li>
            <li class="menu-item hidden"><a href="/create">Create</a></li>
        </ul>
    </div>
</header>