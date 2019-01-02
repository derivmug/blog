<body>

    <h1>Index View</h1>

    <form method="POST" action="/register">

        <p>
            <label for="name">
                <span>Name: </span>
                <strong><abbr title="required">*</abbr></strong>
            </label>
            <input type="text" id="name" name="user_name" placeholder="Name">
        </p>

        <p>
            <label for="email">
                <span>Email: </span>
                <strong><abbr title="required">*</abbr></strong>
            </label>
            <input type="email" id="email" name="user_email" placeholder="Email">
        </p>

        <p>
            <label for="pwd">
                <span>Password: </span>
                <strong><abbr title="required">*</abbr></strong>
            </label>
            <input type="password" id="pwd" name="user_password" placeholder="Password">
        </p>

        <button type="submit">Register</button>

    </form>

</body>