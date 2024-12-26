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
            <button><i class="fa-solid fa-user-plus"></i> New user</button>
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

<dialog id="deleteUser">
    <article>
        <header>
            <button onclick="closeDeleteUser()" aria-label="Close" rel="prev"></button>
            <p>
                <strong>Delete User</strong>
            </p>
        </header>
        <p>Are you sure you want to delete this user?</p>
        <div class="grid">
            <a href="/user/delete?id=<?php echo urlencode($quest['quest_id']) ?>">
                <button>Yes</button>
            </a>
            <button onclick="closeDeleteUser()">No</button>
        </div>
    </article>
</dialog>

<script src="/assets/js/users.js"></script>