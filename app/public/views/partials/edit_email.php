<dialog id="editEmailDialog">
    <article>
        <header>
            <button onclick="closeEditEmail()" aria-label="Close" rel="prev"></button>
            <p>
                <strong>Change email</strong>
            </p>
        </header>
        <p>Current email:</p>
        <p><?php echo $user['email'] ?></p>
        <form action="/edit-email" method="post">
            <fieldset>
                <label for="email">New email</label>
                <input id="email" name="email" type="email" placeholder="Email" required>
                <?php if (!empty($errors['email'])): ?>
                    <span style="color: red;"><?= htmlspecialchars($errors['email']) ?></span>
                <?php endif; ?>
            </fieldset>
            <input type="submit" value="Confirm">
        </form>
    </article>
</dialog>
