<dialog id="editProfilePictureDialog">
    <article>
        <header>
            <button onclick="closeEditProfilePicture()" aria-label="Close" rel="prev"></button>
            <p>
                <strong>Change profile picture</strong>
            </p>
        </header>
        <form action="/edit-profile-picture" method="post">
            <fieldset>
                <legend>Select a new profile picture</legend>
                <div class="profilePictureSelection">
                    <label>
                        <input type="radio" name="profilePicture" value="/assets/img/profile_picture_2.jpg" required>
                        <img src="/assets/img/profile_picture_2.jpg" alt="Profile picture 1">
                    </label>
                    <label>
                        <input type="radio" name="profilePicture" value="/assets/img/profile_picture_3.jpg" required>
                        <img src="/assets/img/profile_picture_3.jpg" alt="Profile picture 2">
                    </label>
                    <label>
                        <input type="radio" name="profilePicture" value="/assets/img/profile_picture_4.jpg" required>
                        <img src="/assets/img/profile_picture_4.jpg" alt="Profile picture 3">
                    </label>
                    <label>
                        <input type="radio" name="profilePicture" value="/assets/img/profile_picture_5.jpg" required>
                        <img src="/assets/img/profile_picture_5.jpg" alt="Profile picture 4">
                    </label>
                    <label>
                        <input type="radio" name="profilePicture" value="/assets/img/profile_picture_6.jpg" required>
                        <img src="/assets/img/profile_picture_6.jpg" alt="Profile picture 5">
                    </label>
                    <label>
                        <input type="radio" name="profilePicture" value="/assets/img/profile_picture_7.jpg" required>
                        <img src="/assets/img/profile_picture_7.jpg" alt="Profile picture 6">
                    </label>
                    <label>
                        <input type="radio" name="profilePicture" value="/assets/img/profile_picture_8.jpg" required>
                        <img src="/assets/img/profile_picture_8.jpg" alt="Profile picture 7">
                    </label>
                    <label>
                        <input type="radio" name="profilePicture" value="/assets/img/profile_picture_9.jpg" required>
                        <img src="/assets/img/profile_picture_9.jpg" alt="Profile picture 8">
                    </label>
                    <label>
                        <input type="radio" name="profilePicture" value="/assets/img/profile_picture_10.jpg" required>
                        <img src="/assets/img/profile_picture_10.jpg" alt="Profile picture 9">
                    </label>
                    <label>
                        <input type="radio" name="profilePicture" value="/assets/img/profile_picture_11.jpg" required>
                        <img src="/assets/img/profile_picture_11.jpg" alt="Profile picture 10">
                    </label>
                    <label>
                        <input type="radio" name="profilePicture" value="/assets/img/profile_picture_12.jpg" required>
                        <img src="/assets/img/profile_picture_12.jpg" alt="Profile picture 11">
                    </label>
                    <label>
                        <input type="radio" name="profilePicture" value="/assets/img/profile_picture_13.jpg" required>
                        <img src="/assets/img/profile_picture_13.jpg" alt="Profile picture 12">
                    </label>
                </div>
            </fieldset>
            <input type="submit" value="Confirm">
        </form>
    </article>
</dialog>