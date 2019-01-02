<div class="hero bg-dark">
    <div class ="hero-body text-center">
    <h1><i>All Articles</i></h1>
    <p class="text-large">Here is a list of all articles written so far</p>
    </div>
</div>

<?php foreach($view_params['articles'] as $key => $article): ?>

    <div class="container">
        <div class="columns">

            <div class="column col-6 col-mx-auto card my-2">

                <div class="card-header">
                    <div class="card-title h5"><?=$article['header']?></div>
                </div>

                <div class="card-body">
                    <?=$article['content']?>
                </div>

            </div>

        </div>
    </div>

<?php endforeach; ?>
