<h1>Discover</h1>

<div class="recommended">
    <h2>Recommended Quests</h2>
    <?php
    foreach ($recommendedQuests as $quest) {
        ?>
        <h3><?php echo htmlspecialchars($quest['name']) ?></h3>
        <p><?php echo htmlspecialchars($quest['description']) ?></p>
        <a href="/quest?id=<?php echo htmlspecialchars($quest['quest_id']) ?>">View</a>
        <?php
    }
    ?>
</div>

<div>
    <h1>Quests</h1>
    <form role="search">
        <input name="search" type="search" placeholder="Search" id="search-input"/>
        <input id="search-button" type="submit" value="Search" />
    </form>
    <br>
    <table>
        <thead>
        <tr>
            <th>Name</th>
            <th>Creator</th>
            <th>Date_Created</th>
            <th></th>
        </tr>
        </thead>
        <tbody id="quests-container">
        </tbody>
    </table>
</div>

<script src="/assets/js/discover.js"></script>
</div>
