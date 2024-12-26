function openEditPassword() {
    const dialog = document.getElementById("editPasswordDialog");
    dialog.showModal();
}

function closeEditPassword() {
    const dialog = document.getElementById("editPasswordDialog");
    dialog.close();
}

async function editPassword(event) {
    console.log("editing password");

    event.preventDefault();

    const oldPassword = document.getElementById("oldPassword").value;
    const newPassword = document.getElementById("newPassword").value;
    const passwordError = document.getElementById("passwordError");

    passwordError.textContent = '';

    if (!newPassword || !oldPassword) {
        passwordError.textContent = "Enter an values";
        return;
    }

    const passwords = {
        oldPassword,
        newPassword,
    };

    try {
        const response = await fetch ("/api/edit-password", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(passwords),
        });

        const result = await response.json();

        if (!response.ok || result.error) {
            passwordError.textContent = result.error || "An unexpected error occurred.";
        }
        else {
            window.location.reload();
        }
    } catch (error) {
        console.error("Error changing password:", error);
        passwordError.textContent = "Failed to change password. Please try again.";
    }
}

document.addEventListener("DOMContentLoaded", () => {
    document
        .getElementById("editPasswordForm")
        .addEventListener("submit", editPassword);
})