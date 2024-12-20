<?php
require_once(__DIR__ . '/../../lib/auth.php');
?>


    <!DOCTYPE html>
    <!--data-theme="light"-->
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Quest Possessed</title>

        <meta name="description"
              content="Quest Possessed - Embark on thrilling adventures and explore captivating quests like never before.">
        <meta name="keywords"
              content="quests, skill development, productivity, life gamification, goal setting, personal growth, habit tracking, challenges">
        <meta name="author" content="Kim van Schagen">

        <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.colors.min.css">
        <link rel="stylesheet" href="/assets/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <script src="/assets/js/main.js"></script>
    </head>

    <body class="container">

<?php
if (!isManager()) {
    require(__DIR__ . "/nav_bar.php");
} else {
    require(__DIR__ . "/nav_bar_manager.php");
}

