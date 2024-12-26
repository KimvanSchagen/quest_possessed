async function fetchAndDisplayUsers() {
    try {
        const response = await fetch("/api/users");

        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }

        const users = await response.json();

        const usersContainer = document.getElementById("users-container");

        usersContainer.innerHTML = "";

        users.forEach((user) => {
            const permissionsDisplay = user.permissions ? "Admin" : "User";
            const userRow = document.createElement("tr");
            userRow.innerHTML = `
            <td>${user.id}</td>
            <td>${user.username}</td>
            <td>${user.email}</td>
            <td>${permissionsDisplay}</td>
            <td>${user.date_created}</td>
            <td>${user.level}</td>
            <td>${user.current_points}</td>
            <td><a href="/user/delete">Delete</a></td>
            <td><a href="/user/admin">Make admin</a></td>`;
            usersContainer.appendChild(userRow);
        });
    } catch (error) {
        console.error("Error fetching users: ", error);
    }
}

document.addEventListener("DOMContentLoaded", () => {
    fetchAndDisplayUsers();

    document.getElementById("search-button").addEventListener("click", () => {
        event.preventDefault();
        const query = document.getElementById("search-input").value.toLowerCase();
        const rows = document.querySelectorAll("#users-container tr");

        rows.forEach((row) => {
            const id = row.querySelector("td:nth-child(1)").textContent.toLowerCase();
            const username = row.querySelector("td:nth-child(2)").textContent.toLowerCase();
            const email = row.querySelector("td:nth-child(3)").textContent.toLowerCase();
            const role = row.querySelector("td:nth-child(4)").textContent.toLowerCase();
            row.style.display = id.includes(query) || username.includes(query) || email.includes(query) || role.includes(query) ? "" : "none";
        });
    });
});