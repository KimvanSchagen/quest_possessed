<?php
require_once(__DIR__ . '/../../lib/auth.php');
?>

<nav>
    <ul>
        <li><strong>Quest Possessed</strong></li>
    </ul>
    <ul>
        <li><a href="/" class="contrast"><i class="fa-solid fa-house"></i>  Home</a></li>
        <li><a href="/discover" class="contrast"><i class="fa-solid fa-magnifying-glass"></i>  Discover</a></li>
        <?php if (isLoggedIn()){ ?>
            <li><a href="/create" class="contrast"><i class="fa-solid fa-square-plus"></i>  Create</a></li>
            <li><a href="/progress" class="contrast"><i class="fa-solid fa-bars-progress"></i>  Progress</a></li>
            <li><a href="/about" class="contrast"><i class="fa-solid fa-circle-info"></i>  About</a></li>
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
        <li><a href="/about" class="contrast"><i class="fa-solid fa-circle-info"></i>  About</a></li>
        <li><a href="/login" class="contrast"><i class="fa-solid fa-user-plus"></i>  Login</a></li>
        <?php } ?>
    </ul>
</nav>