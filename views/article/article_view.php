<div class="hero bg-dark">
    <div class ="hero-body text-center">
        <h1><i><?=$view_params['article']['header']?></i></h1>
        <p class="text-large">
            <i>Created at: </i><?=$view_params['article']['created_at']?> - <i>Written by: <?=$view_params['article']['author_name']?></i>
        </p>
    </div>
</div>

<h3 class="text-center my-4"><?=$view_params['article']['header']?></h3>
<p class="text-center text-large my-4"><?=$view_params['article']['content']?></p>

<div class="container">

    <div class="columns">

        <div class="panel column col-4 col-mx-auto my-4">

            <div class="panel-header">
                <div class="panel-title">Comments</div>
            </div>

            <div class="panel-body">

                <?php foreach ($view_params['comments'] as $comment): ?>

                    <p class="text-justify text-large">
                        <a href="/user?id=<?=$comment['user_id']?>"><?=$comment['user_name']?></a>: <?=$comment['content']?>
                    </p>

                    <div class="divider"></div>

                <?php endforeach?>

            </div>

        </div>

    </div>

    <div class="columns">

        <?php if ($view_params['logged_in']): ?>

        <div class="form-group column col-4 col-mx-auto card">
            <form method="POST" action="/save_comment">

                <label class="form-label" for="comment">Write a comment</label>
                <textarea class="form-input" id="comment" name="comment_content" placeholder="Comment"></textarea>

                <button class="btn my-2" type="submit" style="width: 100%">Submit</button>

            </form>
        </div>

        <?php else: ?>

        <div class="column col-4 col-mx-auto card">
            <p class="text-large text-center my-2">You need to be logged in to write a comment</p>
            <a href="/" class="btn my-2">Log in</a>
        </div>

        <?php endif ?>

    </div>
</div>