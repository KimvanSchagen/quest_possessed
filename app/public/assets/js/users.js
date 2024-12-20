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
            const userRow = document.createElement("tr");
            userRow.innerHTML = `
            <td>${user.id}</td>
            <td>${user.username}</td>
            <td>${user.email}</td>
            <td>${user.permissions}</td>
            <td>${user.date_created}</td>
            <td>${user.level}</td>
            <td>${user.current_points}</td>`;
            usersContainer.appendChild(userRow);
        });
    } catch (error) {
        console.error("Error fetching users: ", error);
    }
}

document.addEventListener("DOMContentLoaded", () => {
    fetchAndDisplayUsers();
});