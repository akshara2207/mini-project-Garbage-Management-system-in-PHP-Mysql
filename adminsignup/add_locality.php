<?php
// Include the connection.php file to establish the database connection
include('connection.php');

// Initialize variables
$error_message = $success_message = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $locality = $_POST["locality"];

    // Validate form data
    if (empty($locality)) {
        $error_message = "Locality is a required field.";
    } else {
        // Insert data into the database
        $query = "INSERT INTO locality_table (localities) VALUES (?)";
        $stmt = $con->prepare($query);
        $stmt->bind_param("s", $locality);

        if ($stmt->execute()) {
            $success_message = "Locality added successfully!";
            // Redirect to locality_view.php after a short delay
            header("refresh:2;url=locality_view.php");
            // Clear form fields if needed
            $locality = "";
        } else {
            $error_message = "Error inserting data into the database: " . $stmt->error;
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Locality</title>
    <link rel="stylesheet" type="text/css" href="add_locality.css">
</head>
<body>

    <div class="navbar">
        <h2>Add Locality</h2>
    </div>

    <?php
    if (!empty($success_message)) {
        echo '<p class="success">' . $success_message . '</p>';
    }

    if (!empty($error_message)) {
        echo '<p class="error">' . $error_message . '</p>';
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="locality">Locality:</label>
        <input type="text" name="locality" required>

        <button type="submit">Add Locality</button>
    </form>

</body>
</html>
