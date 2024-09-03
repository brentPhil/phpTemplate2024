<?php

const BASE_PATH = __DIR__ . '/../';
require BASE_PATH . 'functions.php';
require BASE_PATH . 'bootstrap.php';

$db = \Core\App::resolve(Core\Database::class);

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Prepare and execute the delete query
    $stmt = $db->query("DELETE FROM farmers WHERE id = :id", ['id' => $id]);

    // Check if delete was successful
    if ($stmt->rowCount() > 0) {
        // Deletion was successful
        echo json_encode([
            'status' => 'success',
            'message' => 'Record deleted successfully.'
        ]);
    } else {
        // Deletion failed (possibly because the ID does not exist)
        echo json_encode([
            'status' => 'error',
            'message' => 'Failed to delete record. Please try again.'
        ]);
    }
} else {
    // No ID was provided
    echo json_encode([
        'status' => 'error',
        'message' => 'No ID provided.'
    ]);
}