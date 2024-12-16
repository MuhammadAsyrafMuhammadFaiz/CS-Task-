<?php
session_start();
if (!isset($_SESSION['player_trait'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Forest Path</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="fade-transition"></div>
    <header>
        <img class="logo" src="assets/logo.png" alt="Door Logo">
        <h1>Magic Door Adventure: A New Destiny</h1>
    </header>
    <main>
        <h2>The Forest Path</h2>
        <p>Your chosen trait, <strong><?php echo htmlspecialchars($_SESSION['player_trait']); ?></strong>, will guide your fate. Choose your next step:</p>
        <div class="door-grid">
            <a href="door2.php?path=1" class="door">
                <span>The Hidden Trail</span>
            </a>
            <a href="door2.php?path=2" class="door">
                <span>The Whispering Meadow</span>
            </a>
            <a href="door2.php?path=3" class="door">
                <span>The Dark Glade</span>
            </a>
        </div>
    </main>
    <footer>
        © 2024 Magic Door Adventure
    </footer>
    <script src="fade-transition.js"></script>
</body>
</html>
