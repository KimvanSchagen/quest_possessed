function openEditUsername() {
    const dialog = document.getElementById("editUsernameDialog");
    dialog.showModal();
}

function closeEditUsername() {
    const dialog = document.getElementById("editUsernameDialog");
    dialog.close();
}

async function editUsername(event) {
    console.log("editing username");

    event.preventDefault();

    const newUsername = document.getElementById("username").value;
    const usernameError = document.getElementById("usernameError");

    usernameError.textContent = '';

    if (!newUsername) {
        usernameError.textContent = "Enter a username";
        return;
    }

    try {
        const response = await fetch ("/api/edit-username", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(newUsername),
        });

        const result = await response.json();

        if (!response.ok || result.error) {
            usernameError.textContent = result.error || "An unexpected error occurred.";
        }
        else {
            window.location.reload();
        }
    } catch (error) {
        console.error("Error changing username:", error);
        usernameError.textContent = "Failed to change username. Please try again.";
    }
}

document.addEventListener("DOMContentLoaded", () => {
    document
        .getElementById("editUsernameForm")
        .addEventListener("submit", editUsername);
});