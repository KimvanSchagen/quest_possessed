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
        <?php if (isLoggedIn()){ ?>
            <li><a href="/create" class="contrast">Create</a></li>
            <li><a href="/progress" class="contrast">Progress</a></li>
            <li><a href="/about" class="contrast">About</a></li>
            <li>
                <details class="dropdown">
                    <summary>
                        Profile
                    </summary>
                    <ul dir="rtl">
                        <li><a href="/profile" class="contrast">Profile</a></li>
                        <li><a href="/logout" class="contrast">Logout</a></li>
                    </ul>
                </details>
            </li>
        <?php }
        if (!isLoggedIn()) {?>
        <li><a href="/about" class="contrast">About</a></li>
        <li><a href="/login" class="contrast">Login</a></li>
        <?php } ?>
    </ul>
</nav>