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

    <link rel="stylesheet" href="/static/style.css">

</head>

<body class="off-canvas off-canvas-sidebar-show">

    <div class="off-canvas off-canvas-sidebar-show full-sidebar">
        <a class="off-canvas-toggle btn btn-primary btn-action" href="#sidebar-id"><i class="icon icon-menu"></i></a>

        <!-- Sidebar navigation -->
        <div id="sidebar-id" class="off-canvas-sidebar full-sidebar">
            <ul class="nav p-2 text-large">
                <li class="nav-item">
                    <a href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a href="/articles">Articles</a>
                </li>
            </ul>
        </div>

        <a class="off-canvas-overlay" href="#close"></a>

        <div class="off-canvas-content no-padding">
