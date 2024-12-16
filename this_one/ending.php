<?php
session_start();

// Redirect to the index page if required session variables are not set
if (!isset($_SESSION['player_trait']) || !isset($_SESSION['path']) || !isset($_GET['action'])) {
    header("Location: index.php");
    exit;
}

// Retrieve session variables
$trait = htmlspecialchars($_SESSION['player_trait']);
$location = htmlspecialchars($_SESSION['path']);
$action = (int) $_GET['action']; // Retrieve the action from the query parameter

// Normalize the trait to match the array keys ("bravery", "wisdom", "curiosity")
$trait = strtolower($trait);

// Define detailed endings array
$endings = [
    "1" => [ // Hidden Trail
        1 => [
            "bravery" => "Bad Ending: Your bravery led you straight into the heart of a carefully concealed trap. The air grows colder as shadows loom, and your courage turns to folly. A hollow wind howls, marking the end of your journey.",
            "wisdom" => "Good Ending: Your wisdom, honed by years of careful observation and study, reveals the true path through the Hidden Trail. A glimmer of light guides your way, and you emerge victorious, your name destined to be etched in tales of triumph.",
            "curiosity" => "Bad Ending: Your curiosity was both your strength and your downfall. Entranced by the mysteries of the Hidden Trail, you venture too far into the unknown. The forest closes in, whispering secrets you will never understand."
        ],
        2 => [
            "bravery" => "Good Ending: With sheer force of will, you charged ahead, cutting through every obstacle in your way. The Hidden Trail yields to your determination, and you find yourself standing in the light of a new dawn.",
            "wisdom" => "Bad Ending: The clues you gathered seemed to point in one direction, but a single misstep proves fatal. Even the wisest are not immune to the cruel twists of fate.",
            "curiosity" => "Bad Ending: Your curiosity, relentless and untamed, led you to an ancient stone circle. The ground trembles beneath your feet as you unknowingly awaken a force best left undisturbed."
        ],
        3 => [
            "bravery" => "Bad Ending: Without a second thought, you built a shelter out in the open. The night brought not peace, but predators. The bravery that carried you so far could not protect you this time.",
            "wisdom" => "Good Ending: Your wisdom, coupled with the knowledge of the land, allowed you to construct a safe haven. The dangers of the Hidden Trail are kept at bay, and you survive to tell the tale.",
            "curiosity" => "Bad Ending: You couldn’t resist the urge to explore the dark corners of the forest. Unseen dangers lurk in the shadows, and your journey ends in silence and darkness."
        ]
    ],
    "2" => [ // Whispering Meadow
        1 => [
            "bravery" => "Good Ending: The meadow, with its whispering winds and enchanting atmosphere, recognized your bravery. As the whispers faded, you found yourself surrounded by peace and tranquility, your courage rewarded.",
            "wisdom" => "Bad Ending: You unlocked many of the meadow's secrets, but its true nature remained elusive. The whispers became louder, overwhelming your mind and leaving you lost in a dream-like haze.",
            "curiosity" => "Bad Ending: Your tools were no match for the magical resistance of the meadow. The whispers turned hostile, and your relentless probing led to your undoing."
        ],
        2 => [
            "bravery" => "Bad Ending: You charged into the meadow without a second thought, ignoring the subtle warnings around you. The ground gave way beneath your feet, and you fell into a trap laid by the meadow’s ancient magic.",
            "wisdom" => "Good Ending: Your wisdom allowed you to see past the illusions of the meadow. By deciphering its riddles, you earned safe passage and emerged with newfound understanding.",
            "curiosity" => "Bad Ending: Your relentless curiosity brought you face-to-face with the meadow’s true guardian. Its ethereal form consumed you, leaving no trace of your existence."
        ],
        3 => [
            "bravery" => "Bad Ending: Your bravery led you into the very heart of the meadow, where whispers turned into screams. The meadow’s magic consumed you, leaving behind only echoes of your courage.",
            "wisdom" => "Bad Ending: You thought you had found a safe grove, but the meadow’s magic is deceitful. Even the wise are not immune to its charms, and your journey ends here.",
            "curiosity" => "Good Ending: With all the tools and knowledge you had gathered, you unraveled the meadow’s mysteries. Its whispers turned into a song of victory, and you walked away stronger than ever."
        ]
    ],
    "3" => [ // Dark Glade
        1 => [
            "bravery" => "Bad Ending: Your courage was unmatched, but the Dark Glade was no place for boldness alone. A chilling mist enveloped you, and the darkness claimed another soul.",
            "wisdom" => "Bad Ending: The glade’s magic twisted your wisdom, turning every piece of knowledge into a cruel trap. Your mind became your greatest enemy, and your story ends in despair.",
            "curiosity" => "Good Ending: Despite the dangers, your curiosity drove you to explore every shadow. You uncovered the glade’s hidden treasures and emerged with newfound power."
        ],
        2 => [
            "bravery" => "Good Ending: The Dark Glade recognized your bravery, and its magic bent to your will. You walked away victorious, a legend in the making.",
            "wisdom" => "Good Ending: Your wisdom guided you through the treacherous Dark Glade, allowing you to see the truth hidden in the shadows. You leave the glade, forever changed but stronger than before.",
            "curiosity" => "Bad Ending: The glade’s secrets were not meant for you. The more you sought, the more the darkness consumed, until there was nothing left but silence."
        ],
        3 => [
            "bravery" => "Bad Ending: Your courage was unshaken as you explored the Dark Glade, but the glade’s power overwhelmed even the strongest of hearts. You fade into its shadows, a story left untold.",
            "wisdom" => "Good Ending: Your wisdom proved invaluable in the Dark Glade. By solving its ancient puzzles, you earned its respect and found a way out, carrying its secrets with you.",
            "curiosity" => "Bad Ending: Curiosity was your downfall. The glade offered temptations that you couldn’t resist, and in chasing them, you sealed your fate."
        ]
    ]
];

// Retrieve the corresponding ending text
$endingText = $endings[$location][$action][$trait] ?? "";

// Display the ending page
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Ending</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="fade-transition"></div>
    <main class="ending-page">
        <h1>Your Journey Ends</h1>

        <!-- Main Ending Text (Good/Bad Ending) -->
        <?php if ($endingText): ?>
            <p><?php echo nl2br($endingText); ?></p>
        <?php else: ?>
            <p>There was an error retrieving the ending text. Please check the values.</p>
        <?php endif; ?>

        <!-- Journey Echoes Text -->
        <p>Your journey ends here, but its echoes remain...</p>

        <!-- Restart Button -->
        <a href="index.php" class="restart-button">Restart Adventure</a>
    </main>
    <script src="fade-transition.js"></script>
</body>
</html>
