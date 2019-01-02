<body>

<?php if ($view_params['logged_in']): ?>

    <p>Write an article</p>

    <form method="POST" action="/save_article">

    <p>
        <label for="header">
            <span>Headline: </span>
            <strong><abbr title="required">*</abbr></strong>
        </label>
        <input type="text" id="header" name="article_header" placeholder="Headline">
    </p>

    <p>
        <label for="content">
            <span>Content: </span>
            <strong><abbr title="required">*</abbr></strong>
        </label>
        <textarea id="content" name="article_content" placeholder="Content"></textarea>
    </p>

    <button type="submit">Create article</button>

    </form>

<?php else: ?>

    <?php require_once(__DIR__.'/view_snippets/login.php'); ?>

<?php endif ?>

</body>