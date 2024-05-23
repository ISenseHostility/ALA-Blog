<?php
// Include database connection
/** @var mysqli $db */
require_once './includes/connection.php';

// Fetch comments from database
$sql = "SELECT * FROM comments";
$result = mysqli_query($db, $sql);

// Check if there are any comments
if (mysqli_num_rows($result) > 0) {
    // Fetch and output each comment
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div>";
        echo "<h3>{$row['title']}</h3>";
        echo "<p>Author: {$row['author']}</p>";
        echo "<p>{$row['content']}</p>";
        echo "</div>";
    }
} else {
    echo "No comments yet.";
}

// Close database connection
mysqli_close($db);
?>
