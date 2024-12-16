<?php
require_once(__DIR__ . '/../../lib/auth.php');
?>

<nav>
    <ul>
        <li><strong>Quest Possessed</strong></li>
    </ul>
    <ul>
        <li><a href="/" class="contrast">Home</a></li>

        <li><a href="/discover" class="contrast">Discover</a></li>
        <?php if (isLoggedIn()): ?>
        <li><a href="/create" class="contrast">Create</a></li>
        <li><a href="/progress" class="contrast">Progress</a></li>
        <?php else: ?>
        <li><a href="/login" class="contrast">Login</a></li>
        <?php endif; ?>
    </ul>
</nav>