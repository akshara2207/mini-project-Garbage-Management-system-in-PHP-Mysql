<?php
// Include the connection.php file to establish the database connection
include('connection.php');

// Check if driver ID is provided in the query string
if (isset($_GET['id'])) {
    $driver_id = $_GET['id'];

    // Delete driver from the database
    $query = "DELETE FROM driver_details WHERE id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $driver_id);

    if ($stmt->execute()) {
        header("Location: driver_view.php");
        exit();
    } else {
        echo "Error deleting driver: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Driver ID not provided.";
}
?>
