<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Decode JSON data from the request body
    $data = json_decode(file_get_contents('php://input'), true);

    // Check if the 'id' field is present in the data
    if (isset($data['id'])) {
        // Include the database connection script
        /** @var mysqli $db */
        require_once './includes/connection.php';

        // Prepare the SQL statement to delete the comment
        $sql = "DELETE FROM comments WHERE id = ?";
        
        // Prepare and bind parameters
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "i", $data['id']);
        
        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error deleting comment: ' . mysqli_error($conn)]);
        }

        // Close statement and connection
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid data']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>
