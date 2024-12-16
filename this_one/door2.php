<?php
session_start();
if (!isset($_SESSION['player_trait']) || !isset($_GET['path'])) {
    header("Location: index.php");
    exit;
}

$_SESSION['path'] = $_GET['path']; // Save the player's chosen path

// Define backstories based on the first path
$backstories = [
    1 => [
        "title" => "The Hidden Trail",
        "description" => "You find yourself on a secluded, overgrown path. The air is filled with the scent of wildflowers, and whispers seem to follow you. Your <strong>{trait}</strong> will guide you through the uncertainty ahead."
    ],
    2 => [
        "title" => "The Whispering Meadow",
        "description" => "You step into a serene meadow where the grass dances to an unseen melody. The whispers of the wind carry secrets of an ancient magic. Your <strong>{trait}</strong> will determine your fate in this enchanted land."
    ],
    3 => [
        "title" => "The Dark Glade",
        "description" => "Shadows surround you as you enter a glade where the trees block out the sun. The eerie silence is broken only by the occasional rustle of unseen creatures. Your <strong>{trait}</strong> will help you navigate this foreboding place."
    ]
];

$current_path = (int) $_GET['path'];
$backstory = $backstories[$current_path] ?? [
    "title" => "Unknown Path",
    "description" => "You wander into an unfamiliar area, unsure of what lies ahead. Your choices will shape your journey."
];

$backstory['description'] = str_replace("{trait}", htmlspecialchars($_SESSION['player_trait']), $backstory['description']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($backstory['title']); ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="fade-transition"></div>
    <header>
        <img class="logo" src="assets/logo.png" alt="Door Logo">
        <h1>Magic Door Adventure: A New Destiny</h1>
    </header>
    <main>
        <h2><?php echo htmlspecialchars($backstory['title']); ?></h2>
        <p><?php echo $backstory['description']; ?></p>
        <div class="door-grid">
            <a href="ending.php?action=1" class="door">Scavenge for food</a>
            <a href="ending.php?action=2" class="door">Follow the trail</a>
            <a href="ending.php?action=3" class="door">Seek shelter</a>
        </div>
    </main>
    <footer>
        © 2024 Magic Door Adventure
    </footer>
    <script src="fade-transition.js"></script>
</body>
</html>
