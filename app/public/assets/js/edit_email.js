function openEditEmail() {
    const dialog = document.getElementById("editEmailDialog");
    dialog.showModal();
}

function closeEditEmail() {
    const dialog = document.getElementById("editEmailDialog");
    dialog.close();
}

async function editEmail(event) {
    console.log("editing email");

    event.preventDefault();

    const newEmail = document.getElementById("email").value;
    const emailError = document.getElementById("emailError");

    emailError.textContent = '';

    if (!newEmail) {
        emailError.textContent = "Enter an email";
        return;
    }

    try {
        const response = await fetch ("/api/check-email", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(newEmail),
        });

        const result = await response.json();

        if (!response.ok || result.error) {
            emailError.textContent = result.error || "An unexpected error occurred.";
        }
        else {
            window.location.reload();
        }
    } catch (error) {
        console.error("Error changing email:", error);
        emailError.textContent = "Failed to change email. Please try again.";
    }
}

document.addEventListener("DOMContentLoaded", () => {
    document
        .getElementById("editEmailForm")
        .addEventListener("submit", editEmail);
})