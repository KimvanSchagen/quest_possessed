async function fetchAndDisplayQuests() {
    try {
        const response = await fetch("/api/discover");

        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }

        const quests = await response.json();

        const questsContainer = document.getElementById("quests-container");

        questsContainer.innerHTML = "";

        quests.forEach((quest) => {
            const questRow = document.createElement("tr");
            questRow.innerHTML = `
           <td>${quest.name}</td>
           <td>${quest.username}</td>
           <td>${quest.created_at}</td>
           <td><a href="/quest?id=${quest.quest_id}">View</a></td>`;
            questsContainer.appendChild(questRow);
        });
    } catch (error) {
        console.error("Error fetching quests: ", error);
    }
}

document.addEventListener("DOMContentLoaded", () => {
    fetchAndDisplayQuests();

    document.getElementById("search-button").addEventListener("click", () => {
        event.preventDefault();
        const query = document.getElementById("search-input").value.toLowerCase();
        const rows = document.querySelectorAll("#quests-container tr");

        rows.forEach((row) => {
            const id = row.querySelector("td:nth-child(1)").textContent.toLowerCase();
            const name = row.querySelector("td:nth-child(2)").textContent.toLowerCase();
            const username = row.querySelector("td:nth-child(3)").textContent.toLowerCase();
            row.style.display = id.includes(query) || name.includes(query) || username.includes(query) ? "" : "none";
        });
    });
});