<div>
    <div class="grid">
        <div class="welcome_image">
            <img src="/assets/img/login_register_image.jpg" alt="Welcome">
        </div>
        <div>
            <h1>Register</h1>
            <form action="/register" method="post">
                <fieldset>
                    <label for="username">Username</label>
                    <input id="username" name="username" type="text" placeholder="Username" autocomplete="username"
                           required/>
                    <?php if (!empty($errors['username'])): ?>
                        <span style="color: red;"><?= htmlspecialchars($errors['username']) ?></span>
                    <?php endif; ?>
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" placeholder="Email" autocomplete="email" required/>
                    <?php if (!empty($errors['email'])): ?>
                        <span style="color: red;"><?= htmlspecialchars($errors['email']) ?></span>
                    <?php endif; ?>
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" placeholder="Password"
                           autocomplete="current-password" required/>
                </fieldset>
                <input type="submit" value="Register"/>
            </form>
        </div>
    </div>
</div>
