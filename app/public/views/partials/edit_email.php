<dialog id="editEmailDialog">
    <article>
        <header>
            <button onclick="closeEditEmail()" aria-label="Close" rel="prev"></button>
            <p>
                <strong>Change email</strong>
            </p>
        </header>
        <p>Current email:</p>
        <p><?php echo htmlspecialchars($user['email']) ?></p>
        <form id="editEmailForm">
            <fieldset>
                <label for="email">New email</label>
                <input id="email" name="email" type="email" placeholder="Email" required>
                <span id="emailError" style="color: red;"></span>
            </fieldset>
            <input type="submit" value="Confirm">
        </form>
    </article>
</dialog>

<script src="/assets/js/edit_email.js"></script>
