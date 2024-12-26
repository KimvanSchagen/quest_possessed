<div>
    <h1>Users</h1>
    <div class="grid">
        <form role="search">
            <input name="search" type="search" placeholder="Search" id="search-input"/>
            <input id="search-button" type="submit" value="Search"/>
        </form>
        <div class="grid">
            <p></p>
            <p>18 users</p>
            <button onclick="openNewUserDialog()"><i class="fa-solid fa-user-plus"></i> New user</button>
        </div>
    </div>
    <br>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Date Created</th>
            <th>Level</th>
            <th>Points</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody id="users-container">
        </tbody>
    </table>
</div>

<dialog id="newUserDialog">
    <article>
        <header>
            <button onclick="closeNewUserDialog()" aria-label="Close" rel="prev"></button>
            <p>
                <strong>New User</strong>
            </p>
        </header>
        <form id="newUserForm">
            <fieldset>
                <label for="username">Username</label>
                <input id="username" name="username" type="text" placeholder="Username" required>
                <span id="usernameError" style="color: red;"></span>
                <label for="email">Email</label>
                <input id="email" name="email" type="email" placeholder="Email" required>
                <span id="emailError" style="color: red;"></span>
                <label for="password">Password</label>
                <input id="password" name="password" type="password" required>
                <label>
                    <input name="admin" type="checkbox" role="switch"/>
                    Admin
                </label>
            </fieldset>
            <input type="submit" value="Create new user">
        </form>
    </article>
</dialog>

<dialog id="deleteUserDialog">
    <article>
        <header>
            <button onclick="closeDeleteUserDialog()" aria-label="Close" rel="prev"></button>
            <p>
                <strong>Delete User</strong>
            </p>
        </header>
        <p>Are you sure you want to delete this user?</p>
        <div class="grid">
            <button onclick="deleteUser()">Yes</button>
            <button onclick="closeDeleteUserDialog()">No</button>
        </div>
    </article>
</dialog>

<dialog id="makeAdminDialog">
    <article>
        <header>
            <button onclick="closeMakeAdminDialog()" aria-label="Close" rel="prev"></button>
            <p>
                <strong>Make Admin</strong>
            </p>
        </header>
        <p>Are you sure you want to make this user admin?</p>
        <div class="grid">
            <button id="confirmMakeAdmin">Yes</button>
            <button onclick="closeMakeAdminDialog()">No</button>
        </div>
    </article>
</dialog>

<script src="/assets/js/users.js"></script>