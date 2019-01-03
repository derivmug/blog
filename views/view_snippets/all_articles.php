<?php foreach($view_params['articles'] as $key => $article): ?>

    <div class="container">
        <div class="columns">

            <div class="column col-6 col-mx-auto card my-2">

                <div class="card-header">
                    <div class="card-title h5"><?=$article['header']?></div>
                    <div class="card-subtitle text-gray"><?=$article['author_name']?></div>
                </div>

                <div class="card-body">
                    <?=$article['content']?>
                </div>

            </div>

        </div>
    </div>

<?php endforeach; ?>