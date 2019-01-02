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
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-icons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-exp.min.css">

</head>

<body class="off-canvas off-canvas-sidebar-show" style="min-height: 100vh">

    <div class="off-canvas off-canvas-sidebar-show">
        <a class="off-canvas-toggle btn btn-primary btn-action" href="#sidebar-id"><i class="icon icon-menu"></i></a>

        <div id="sidebar-id" class="off-canvas-sidebar">
            <ul class="nav">
                <li class="nav-item">
                    <a href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a href="/articles">Articles</a>
                </li>
            </ul>
        </div>

        <a class="off-canvas-overlay" href="#close"></a>

        <div class="off-canvas-content">
