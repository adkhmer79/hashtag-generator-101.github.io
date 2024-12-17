<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $keyword = htmlspecialchars($_POST['keyword']);
    $platform = htmlspecialchars($_POST['platform']);

    if (empty($keyword) || empty($platform)) {
        die("Keyword and platform are required.");
    }

    // Generate hashtags
    $hashtags = generateHashtags($keyword, $platform);
    $viewsEstimate = generateViews();

    // Save to database
    $stmt = $conn->prepare("INSERT INTO hashtags (keyword, platform, generated_hashtags, views_estimate) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $keyword, $platform, $hashtags, $viewsEstimate);
    $stmt->execute();

    echo "<div class='container mt-5'>";
    echo "<h3 class='text-center'>Generated Hashtags for $platform</h3>";
    echo "<p class='text-center' style='color: rgb(153, 101, 21);'>$hashtags</p>";
    echo "<p class='text-center'><strong>Estimated Views:</strong> $viewsEstimate</p>";
    echo "<a href='index.html' class='btn btn-primary mt-3'>Generate Again</a>";
    echo "</div>";

    $stmt->close();
    $conn->close();
}

function generateHashtags($keyword, $platform) {
    $baseWords = ["viral", "explore", "trending", "daily", "goals", "moments", "2024", "top", "love", "best"];
    $emojis = ["🔥", "✨", "💥", "💯", "🌟", "🎉", "📸", "🌈"];
    $hashtags = [];

    for ($i = 0; $i < 25; $i++) {
        $emoji = $emojis[array_rand($emojis)];
        $base = $baseWords[array_rand($baseWords)];
        $formatted = ucfirst($keyword);
        $hashtags[] = "#$formatted$base $emoji";
    }

    return implode(", ", $hashtags);
}

function generateViews() {
    $views = rand(1000, 1000000);
    return number_format($views) . " views";
}
?>
