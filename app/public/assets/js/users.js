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
            <td><button onclick="openDeleteUserDialog()">Delete</button></td>
            <td><button onclick="openMakeAdminDialog(${user.id})">Make admin</button></td>`;
            usersContainer.appendChild(userRow);
        });
    } catch (error) {
        console.error("Error fetching users: ", error);
    }
}

function openNewUserDialog() {
    const dialog = document.getElementById("newUserDialog");
    dialog.showModal();
}

function closeNewUserDialog() {
    const dialog = document.getElementById("newUserDialog");
    dialog.close();
}

async function newUser(event) {
    console.log("Creating new user");

    event.preventDefault();

    const username = document.getElementById("username").value;
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;


}

async function makeAdmin(userId) {
    try {
        const response = await fetch("/api/make-admin", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(userId),
        });

        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }

        await fetchAndDisplayUsers(); // Refresh the user list
    } catch (error) {
        console.error("Error making user an admin: ", error);
        alert("Failed to make user an admin.");
    }
}

function openMakeAdminDialog(userId) {
    const dialog = document.getElementById("makeAdminDialog");
    const confirmButton = dialog.querySelector("#confirmMakeAdmin");
    confirmButton.onclick = () => {
        makeAdmin(userId);
        closeMakeAdminDialog();
    };
    dialog.showModal();
}
function closeMakeAdminDialog() {
    const dialog = document.getElementById("makeAdminDialog");
    dialog.close();
}

async function deleteUser() {

}

function openDeleteUserDialog() {
    const dialog = document.getElementById("deleteUserDialog");
    dialog.showModal();
}

function closeDeleteUserDialog() {
    const dialog = document.getElementById("deleteUserDialog");
    dialog.close();
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

    document
        .getElementById("newUserForm")
        .addEventListener("submit", newUser);
});