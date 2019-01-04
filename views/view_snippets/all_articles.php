<?php if ($view_params['articles']) foreach($view_params['articles'] as $key => $article): ?>

    <div class="container m-2">
        <div class="columns">

            <div class="column col-6 col-mx-auto card my-2">

                <div class="card-header">
                    <a href="/article?id=<?=$article['id']?>">
                        <div class="card-title h5"><?=$article['header']?></div>
                    </a>

                    <div class="card-subtitle text-gray">
                        <i>Created at: </i><?=$article['created_at']?> - <i>Written by: </i>
                        <a href="/user?id=<?=$article['author_id']?>"><?=$article['author_name']?></a>
                    </div>
                </div>

                <div class="card-body">
                    <?=$article['content']?>
                </div>

            </div>

        </div>
    </div>

<?php endforeach; ?>