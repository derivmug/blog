<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="utf-8">

    <title>
        <?php echo $view_params['title']; ?>
    </title>

    <meta name="description" content="<?php echo $view_params['title']; ?>">
    <meta name="author" content="Luca Beetz">

    <!-- Include the Spectre CSS framework -->
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre.min.css">

</head>

<body>

<header class="navbar">

    <section class="navbar-section">
        <a href="#" class="btn btn-lg m-2">About</a>
        <a href="/articles" class="btn btn-lg m-2">All Articles</a>
    </section>

    <section class="navbar-center">
        <a href="/" class="navbar-brand">Articly</a>
    </section>

    <section class="navbar-section">
        <a href="https://github.com/derivmug/blog" class="btn btn-lg m-2">GitHub</a>
    </section>
    
</header>

<div class="divider"></div>