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

function isManager() {
    if (isLoggedIn()) {
        $user = $_SESSION['user'];
        if ($user['permissions'] == 1) {
            return true;
        }
    }
    return false;
}

function isUser() {
    if (isLoggedIn()) {
        $user = $_SESSION['user'];
        if ($user['permissions'] == 0) {
            return true;
        }
    }
    return false;
}