<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get data sent from the frontend
    $data = json_decode(file_get_contents('php://input'), true);

    // Check if required fields are present
    if (isset($data['title'], $data['author'], $data['content'])) {
        // Extract data
        $title = $data['title'];
        $author = $data['author'];
        $content = $data['content'];

        // Include database connection
        /** @var mysqli $db */
        require_once './includes/connection.php';

        // Prepare the SQL statement
        $sql = "INSERT INTO comments (title, author, content) VALUES (?, ?, ?)";
        
        // Prepare and bind parameters
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $title, $author, $content);
        
        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            $id = mysqli_insert_id($db); // Get the ID of the inserted comment
            echo json_encode(['success' => true, 'comment' => ['id' => $id, 'title' => $title, 'author' => $author, 'content' => $content]]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error inserting comment: ' . mysqli_error($db)]);
        }

        // Close statement and connection
        mysqli_stmt_close($stmt);
        mysqli_close($db);
    } else {
        echo json_encode(['success' => false, 'message' => 'Missing required fields']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>
