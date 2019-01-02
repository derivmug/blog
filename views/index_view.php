<?php if (!$view_params['logged_in']): ?>

    <div class="text-center">
        <h1>Welcome</h1>
    </div>

    <?php require_once(__DIR__.'/view_snippets/login.php') ?>

    <div class="divider text-center" data-content="OR"></div>

    <?php require_once(__DIR__.'/view_snippets/register.php') ?>

<?php else: ?>

    <div class="text-center">
        <h1>Welcome back <?=$view_params['user_name']?></h1>
    </div>

    <?php require_once(__DIR__.'/view_snippets/all_articles.php') ?>

<?php endif ?>
