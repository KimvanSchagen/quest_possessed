<?php
$user = $_SESSION['user'];
?>
<div>
    <h1>Profile</h1>
    <h1>Welcome, <?php echo htmlspecialchars($user['username'] ?? 'User'); ?>!</h1>
</div>
