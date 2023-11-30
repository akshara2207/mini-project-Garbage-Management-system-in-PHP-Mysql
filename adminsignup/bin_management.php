<?php
// Include the connection.php file to establish the database connection
include('connection.php');

// Initialize variables
$error_message = $success_message = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $area = $_POST["area"];
    $locality = $_POST["locality"];
    $landmark = $_POST["landmark"];
    $city = $_POST["city"];
    $driver_email = $_POST["driver_email"];
    $cycle_period = $_POST["cycle_period"];
    $loadtype = $_POST["loadtype"];

    // Validate form data (you can add more validation as needed)
    if (empty($area) || empty($locality) || empty($city) || empty($driver_email) || empty($cycle_period) || empty($loadtype)) {
        $error_message = "All fields are required.";
    } else {
        // Insert data into the database
        $query = "INSERT INTO binData (area, locality, landmark, city, driver_email, cycle_period, loadtype) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $con->prepare($query);
        $stmt->bind_param("sssssss", $area, $locality, $landmark, $city, $driver_email, $cycle_period, $loadtype);

        if ($stmt->execute()) {
            $success_message = "Bin added successfully!";
            // Clear form fields if needed
            $area = $landmark = $city = $driver_email = $cycle_period = $loadtype = "";
        } else {
            $error_message = "Error inserting data into the database: " . $stmt->error;
        }

        $stmt->close();
    }
}

// Fetch existing localities from the database
$localityQuery = "SELECT localities FROM locality_table";
$localityResult = $con->query($localityQuery);

// Check if there are existing localities
if ($localityResult->num_rows > 0) {
    while ($row = $localityResult->fetch_assoc()) {
        $existingLocalities[] = $row['localities'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bin Management</title>
    <link rel="stylesheet" type="text/css" href="bin_management.css">
</head>
<body>

    <div class="navbar">
        <h2>Bin Management</h2>
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
        <label for="area">Area:</label>
        <input type="text" name="area" required>

        <label for="locality">Locality:</label>
        <select name="locality" required>
            <?php
            if (!empty($existingLocalities)) {
                foreach ($existingLocalities as $existingLocality) {
                    echo '<option value="' . $existingLocality . '">' . $existingLocality . '</option>';
                }
            }
            ?>
        </select>

        <label for="landmark">Landmark:</label>
        <input type="text" name="landmark">

        <label for="city">City:</label>
        <input type="text" name="city" required>

        <label for="driver_email">Driver Email:</label>
        <input type="email" name="driver_email" required>

        <label for="cycle_period">Cycle Period:</label>
        <select name="cycle_period" required>
            <option value="Daily">Daily</option>
            <option value="Weekly">Weekly</option>
            <option value="Twice">Twice</option>
            <option value="Monthly">Monthly</option>
            <!-- Add more options as needed -->
        </select>

        <label for="loadtype">Load Type:</label>
        <select name="loadtype" required>
            <option value="Low">Low</option>
            <option value="Medium">Medium</option>
            <option value="High">High</option>
            <!-- Add more options as needed -->
        </select>

        <button type="submit">Submit</button>
    </form>

</body>
</html>
