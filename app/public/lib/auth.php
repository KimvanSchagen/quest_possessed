<?php
function requireLogin() {
    if (!isset($_SESSION['user'])) {
        header("Location: /login");
        exit;
    }
}

function isLoggedIn() {
    return isset($_SESSION['user']);
}