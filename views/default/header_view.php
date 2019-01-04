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

        <div class="panel-navbar">

            <?php if (!$view_params['logged_in']): ?>

                <div class="btns d-flex">
                    <a class="btn ml-1 bg-dark text-light btn-link" href="/" target="_blank">Login</a>
                    <a class="btn ml-1 bg-dark text-light btn-link" href="/" target="_blank">Register</a>
                </div>

            <?php else: ?>

                <div class="btns d-flex">
                    <a class="btn ml-1 bg-dark text-light btn-link" href="/user?id=<?=$_SESSION['user_id']?>" target="_blank">Profile</a>
                    <a class="btn ml-1 bg-dark text-light btn-link" href="/logout" target="_blank">Log out</a>
                </div>

            <?php endif ?>

        </div>

        <!-- Sidebar navigation -->
        <div id="sidebar-id" class="off-canvas-sidebar full-sidebar">

            <div class="brand">
                <a class="logs" href="/">
                    <h2>artics</h2>
                </a>
            </div>

            <ul class="nav p-2 text-large">
                <li class="nav-item">
                    <a href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a href="/articles">Articles</a>
                </li>
                <li class="nav-item">
                    <a href="https://github.com/derivmug/blog">GitHub</a>
                </li>
            </ul>
        </div>

        <a class="off-canvas-overlay" href="#close"></a>

        <div class="off-canvas-content no-padding">
