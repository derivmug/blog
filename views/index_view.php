<?php if (!$view_params['logged_in']): ?>

    <div class="hero bg-dark">
        <div class ="hero-body text-center">
            <h1><i>Welcome to artics</i></h1>
            <p class="text-large">An open-source article sharing platform</p>
        </div>
    </div>

    <div class="container my-2">
        <div class="columns">

            <div class="flex-centered form-group column col-4 col-mx-auto">

                <form method="POST" action="/login" style="width: 100%">

                    <label class="form-label" for="email">Email</label>
                    <input class="form-input" type="email" id="email" name="user_email" placeholder="Email">

                    <label class="form-label" for="password">Password</label>
                    <input class="form-input" type="password" id="password" name="user_password" placeholder="Password">

                    <button class="btn my-2" type="submit" style="width: 100%">Log in</button>

                </form>

            </div>

            <div class="divider-vert" data-content="OR"></div>

            <div class="form-group column col-4 col-mx-auto">

                <form method="POST" action="/register">

                    <label class="form-label" for="name">Name</label>
                    <input class="form-input" type="text" id="name" name="user_name" placeholder="Name">

                    <label class="form-label" for="email">Email</label>
                    <input class="form-input" type="email" id="email" name="user_email" placeholder="Email">

                    <label class="form-label" for="password">Password</label>
                    <input class="form-input" type="password" id="password" name="user_password" placeholder="Password">

                    <label class="form-label" for="password-confirm">Confirm password</label>
                    <input class="form-input" type="password" id="password-confirm" name="user_password_confirm" placeholder="Confirm password">

                    <button class="btn my-2" type="submit" style="width: 100%">Register</button>

                </form>

            </div>

        </div>
    </div>

<?php else: ?>

    <div class="hero bg-dark">
        <div class ="hero-body text-center">
            <h1><i>Welcome back <?=$view_params['user_name']?></i></h1>
            <p class="text-large">Have a nice stay</p>
        </div>
    </div>

    <div class="container">
        <div class="columns">

            <div class="column col-4 col-mx-auto my-4">

                <h3 class="text-center">Write an article</h3>

                <form method="POST" action="/save_article">

                    <div class="form-group card p-2 my-4">

                        <label class="form-label label-lg" for="header">Header</label>
                        <input class="form-input input-lg" type="text" id="header" name="article_header" placeholder="Header">

                        <label class="form-label label-lg" for="content">Content</label>
                        <textarea class="form-input input-lg" id="content" name="article_content" placeholder="Content"></textarea>

                        <button class="btn my-2" type="submit">Create article</button>

                    </div>

                </form>

            </div>

            <div class="column col-4 col-mx-auto my-4">

                <h3 class="text-center">Last five articles published</h3>

                <?php if ($view_params['articles']) foreach($view_params['articles'] as $key => $article): ?>

                <div class="card my-4">

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

                <?php endforeach ?>

            </div>

        </div>
    </div>


<?php endif ?>
