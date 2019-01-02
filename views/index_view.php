<div class="text-center">
    <h1>Index View</h1>
</div>

<?php if (!$view_params['logged_in']): ?>

    <?php require_once(__DIR__.'/view_snippets/login.php') ?>

    <div class="divider text-center" data-content="OR"></div>

    <?php require_once(__DIR__.'/view_snippets/register.php') ?>

<?php else: ?>

    <?php require_once(__DIR__.'/view_snippets/all_articles.php') ?>

<?php endif ?>
