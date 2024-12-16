<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['player_trait'] = $_POST['trait']; // Save the player's trait choice
    header("Location: door1.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magic Door Adventure</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="fade-transition"></div>
    <header>
        <img class="logo" src="assets/logo.png" alt="Door Logo">
        <h1>Magic Door Adventure: A New Destiny</h1>
    </header>
    <main>
        <h2>Welcome, Adventurer!</h2>
        <p>Select your character trait to begin:</p>
        <form method="POST" class="centered-form">
            <label>
                <input type="radio" name="trait" value="bravery" required> Bravery
            </label>
            <label>
                <input type="radio" name="trait" value="wisdom" required> Wisdom
            </label>
            <label>
                <input type="radio" name="trait" value="curiosity" required> Curiosity
            </label>
            <button type="submit">Start Adventure</button>
        </form>
    </main>
    <footer>
        © 2024 Magic Door Adventure
    </footer>
    <script src="fade-transition.js"></script>
</body>
</html>
