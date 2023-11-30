<?php
// Include the connection.php file to establish the database connection
include('connection.php');

// Initialize variables
$error_message = $success_message = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $password = $_POST["password"];
    $mobile = $_POST["mobile"];

    // Validate form data
    if (empty($name) || empty($email) || empty($password) || empty($mobile)) {
        $error_message = "Name, email, password, and mobile are required fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid email format.";
    } elseif (!preg_match("/^\d{10}$/", $mobile)) {
        $error_message = "Invalid phone number. Please enter a 10-digit number.";
    } else {
        // Insert data into the database
        $query = "INSERT INTO driver_details (name, email, address, password, mobile) VALUES (?, ?, ?, ?, ?)";
        $stmt = $con->prepare($query);
        $stmt->bind_param("sssss", $name, $email, $address, $password, $mobile);

        if ($stmt->execute()) {
            $success_message = "Driver added successfully!";
            // Redirect to driver_view.php after a short delay
            header("refresh:2;url=driver_view.php");
            // Clear form fields if needed
            $name = $email = $address = $password = $mobile = "";
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
    <title>Add Driver</title>
    <link rel="stylesheet" type="text/css" href="add_driver.css">
</head>
<body>

    <div class="navbar">
        <h2>Add Driver</h2>
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
        <label for="name">Name:</label>
        <input type="text" name="name" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="address">Address:</label>
        <input type="text" name="address">

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <label for="mobile">Mobile:</label>
        <input type="number" name="mobile" required>

        <button type="submit">Add Driver</button>
    </form>

</body>
</html>
