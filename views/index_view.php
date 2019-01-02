<?php if (!$view_params['logged_in']): ?>

    <div class="hero bg-dark">
        <div class ="hero-body text-center">
            <h1><i>Welcome to artics</i></h1>
            <p class="text-large">An open-source article sharing platform</p>
        </div>
    </div>

    <?php require_once(__DIR__.'/view_snippets/login.php') ?>

    <div class="divider text-center" data-content="OR"></div>

    <?php require_once(__DIR__.'/view_snippets/register.php') ?>

<?php else: ?>

    <div class="hero bg-dark">
        <div class ="hero-body text-center">
            <h1><i>Welcome back <?=$view_params['user_name']?></i></h1>
            <p class="text-large">Some very thoughtful quote</p>
        </div>
    </div>

    <?php require_once(__DIR__.'/view_snippets/all_articles.php') ?>

<?php endif ?>
