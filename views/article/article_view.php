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