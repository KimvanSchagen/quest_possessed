<dialog id="editPasswordDialog">
    <article>
        <header>
            <button onclick="closeEditPassword()" aria-label="Close" rel="prev"></button>
            <p>
                <strong>Change password</strong>
            </p>
        </header>
        <form action="/edit-password" method="post">
            <fieldset>
                <label for="oldPassword">Enter old password</label>
                <input id="oldPassword" name="oldPassword" type="password" required>
                <?php if (!empty($errors['password'])): ?>
                    <span style="color: red;"><?= htmlspecialchars($errors['password']) ?></span>
                <?php endif; ?>
                <label for="newPassword">New password</label>
                <input id="newPassword" name="newPassword" type="password" required>
            </fieldset>
            <input type="submit" value="Confirm">
        </form>
    </article>
</dialog>
