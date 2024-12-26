<dialog id="editUsernameDialog">
    <article>
        <header>
            <button onclick="closeEditUsername()" aria-label="Close" rel="prev"></button>
            <p>
                <strong>Change username</strong>
            </p>
        </header>
        <p>Current username:</p>
        <p><?php echo htmlspecialchars($user['username']); ?></p>
        <form id="editUsernameForm">
            <fieldset>
                <label for="username">New username</label>
                <input id="username" name="username" type="text" placeholder="Username" required>
                <span id="usernameError" style="color: red;"></span>
            </fieldset>
            <input type="submit" value="Confirm">
        </form>
    </article>
</dialog>

<script src="/assets/js/edit_username.js"></script>
