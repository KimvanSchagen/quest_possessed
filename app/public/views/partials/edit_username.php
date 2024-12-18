<dialog id="editUsernameDialog">
    <article>
        <header>
            <button onclick="closeEditUsername()" aria-label="Close" rel="prev"></button>
            <p>
                <strong>Change username</strong>
            </p>
        </header>
        <p>Current username:</p>
        <p><?php echo $user['username'] ?></p>
        <form action="/edit-username" method="post">
            <fieldset>
                <label for="username">New username</label>
                <input id="username" name="username" type="text" placeholder="Username" required>
                <?php if (!empty($errors['username'])): ?>
                    <span style="color: red;"><?= htmlspecialchars($errors['username']) ?></span>
                <?php endif; ?>
            </fieldset>
            <input type="submit" value="Confirm">
        </form>
    </article>
</dialog>
