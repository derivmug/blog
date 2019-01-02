<form method="POST" action="/register">

    <div class="container">
        <div class="columns">

            <div class="form-group column col-4 col-mx-auto my-2 card">

                <label class="form-label" for="name">Name</label>
                <input class="form-input" type="text" id="name" name="user_name" placeholder="Name">

                <label class="form-label" for="email">Email</label>
                <input class="form-input" type="email" id="email" name="user_email" placeholder="Email">

                <label class="form-label" for="password">Password</label>
                <input class="form-input" type="password" id="password" name="user_password" placeholder="Password">

                <label class="form-label" for="password-confirm">Confirm password</label>
                <input class="form-input" type="password" id="password-confirm" name="user_password_confirm" placeholder="Confirm password">

                <button class="btn my-2" type="submit">Register</button>

            </div>

        </div>
    </div>

</form>