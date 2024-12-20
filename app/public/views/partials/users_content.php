<div>
    <h1>Users</h1>
    <div class="grid">
        <form role="search">
            <input name="search" type="search" placeholder="Search"/>
            <input type="submit" value="Search"/>
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
            <th>Achievement points</th>
        </tr>
        </thead>
        <tbody id="users-container">
        </tbody>
    </table>
</div>

<script src="/assets/js/users.js"></script>