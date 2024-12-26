<dialog id="editPasswordDialog">
    <article>
        <header>
            <button onclick="closeEditPassword()" aria-label="Close" rel="prev"></button>
            <p>
                <strong>Change password</strong>
            </p>
        </header>
        <form id="editPasswordForm">
            <fieldset>
                <label for="oldPassword">Enter old password</label>
                <input id="oldPassword" name="oldPassword" type="password" required>
                <span id="passwordError" style="color: red;"></span>
                <label for="newPassword">New password</label>
                <input id="newPassword" name="newPassword" type="password" required>
            </fieldset>
            <input type="submit" value="Confirm">
        </form>
    </article>
</dialog>

<script src="/assets/js/edit_password.js"></script>
