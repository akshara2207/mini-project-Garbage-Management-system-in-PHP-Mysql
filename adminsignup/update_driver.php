<?php
// Include the connection.php file to establish the database connection
include('connection.php');

// Initialize variables
$error_message = $success_message = "";
$driver_data = [];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $driver_id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $mobile = $_POST["mobile"];

    // Validate form data (you can add more validation as needed)
    if (empty($name) || empty($email) || empty($address) || empty($mobile)) {
        $error_message = "All fields are required.";
    } else {
        // Update data in the database
        $query = "UPDATE driver_details SET name = ?, email = ?, address = ?, mobile = ? WHERE id = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("ssssi", $name, $email, $address, $mobile, $driver_id);

        if ($stmt->execute()) {
            $success_message = "Driver updated successfully!";
        } else {
            $error_message = "Error updating data in the database: " . $stmt->error;
        }

        $stmt->close();
    }
} else {
    // Check if driver ID is provided in the query string
    if (isset($_GET['id'])) {
        $driver_id = $_GET['id'];

        // Fetch driver information from the database
        $query = "SELECT * FROM driver_details WHERE id = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("i", $driver_id);

        if ($stmt->execute()) {
            $result = $stmt->get_result();

            // Check if the driver ID exists
            if ($result->num_rows > 0) {
                $driver_data = $result->fetch_assoc();
            } else {
                $error_message = "Driver not found.";
            }
        } else {
            $error_message = "Error fetching data from the database: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $error_message = "Driver ID not provided.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Driver</title>
    <link rel="stylesheet" type="text/css" href="update_driver.css">
</head>
<body>

    <div class="navbar">
        <h2>Update Driver</h2>
    </div>

    <?php
    if (!empty($error_message)) {
        echo '<p class="error">' . $error_message . '</p>';
    }

    if (!empty($success_message)) {
        echo '<p class="success">' . $success_message . '</p>';
    }
    ?>

    <?php if (!empty($driver_data)): ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="id" value="<?php echo $driver_data['id']; ?>">
            <label for="name">Name:</label>
            <input type="text" name="name" value="<?php echo $driver_data['name']; ?>" required>

            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo $driver_data['email']; ?>" required>

            <label for="address">Address:</label>
            <input type="text" name="address" value="<?php echo $driver_data['address']; ?>" required>

            <label for="mobile">Mobile:</label>
            <input type="text" name="mobile" value="<?php echo $driver_data['mobile']; ?>" required>

            <button type="submit">Update</button>
        </form>
    <?php endif; ?>

</body>
</html>
