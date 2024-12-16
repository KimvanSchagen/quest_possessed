<div>
    <div class="grid">
        <div>
            <img src="/assets/img/login_register_image.jpg" alt="Welcome">
        </div>
        <div>
            <h1>Log In</h1>
            <form action="/login" method="post">
                <fieldset>
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" placeholder="Email" autocomplete="email" required/>
                    <?php if (!empty($errors['email'])): ?>
                        <span style="color: red;"><?= htmlspecialchars($errors['email']) ?></span>
                    <?php endif; ?>
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" placeholder="Password" autocomplete="current-password" required/>
                    <?php if (!empty($errors['password'])): ?>
                        <span style="color: red;"><?= htmlspecialchars($errors['password']) ?></span>
                    <?php endif; ?>
                </fieldset>
                <input type="submit" value="Log in"/>
            </form>
            <div>
                <p>Don't have an account?</p>
                <a href="/register">Register here</a>
            </div>
        </div>
    </div>
</div>
