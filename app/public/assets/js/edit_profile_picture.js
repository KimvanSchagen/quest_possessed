function openEditProfilePicture() {
    const dialog = document.getElementById("editProfilePictureDialog");
    dialog.showModal();
}

function closeEditProfilePicture() {
    const dialog = document.getElementById("editProfilePictureDialog");
    dialog.close();
}

async function editProfilePicture(event) {
    console.log("editing username");

    event.preventDefault();

    const form = document.getElementById("editProfilePictureForm");
    const formData = new FormData(form);
    const selectedPicture = formData.get("profilePicture");
    const profilePictureError = document.getElementById("profilePictureError");

    if (!selectedPicture) {
        profilePictureError.textContent = "No profile picture selected.";
        return;
    }

    try {
        const response = await fetch ("/api/edit-profile-picture", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(selectedPicture),
        });

        const result = await response.json();

        if (!response.ok || result.error) {
            profilePictureError.textContent = "An unexpected error occurred."
        }
        else {
            window.location.reload();
        }
    } catch (error) {
        console.error("Error changing profile picture:", error);
        profilePictureError.textContent = "Failed to change profile picture. Please try again."
    }
}

document.addEventListener("DOMContentLoaded", () => {
    document
        .getElementById("editProfilePictureForm")
        .addEventListener("submit", editProfilePicture);
});