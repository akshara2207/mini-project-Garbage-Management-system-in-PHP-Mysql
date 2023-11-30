<?php
// Include the connection.php file to establish the database connection
include('connection.php');

// Fetch all driver details from the database
$query = "SELECT * FROM driver_details";
$result = $con->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Drivers</title>
    <link rel="stylesheet" type="text/css" href="driver_view.css">
</head>
<body>

    <div class="navbar">
        <h2>All Drivers</h2>
    </div>

    <?php
    if ($result->num_rows > 0):
    ?>
    <table class="driver-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Mobile</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $result->fetch_assoc()):
            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['mobile']; ?></td>
                <td>
                    <a href="update_driver.php?id=<?php echo $row['id']; ?>" class="button-link">Update</a>
                    <a href="delete_driver.php?id=<?php echo $row['id']; ?>" class="button-link" onclick="return confirm('Are you sure you want to delete this driver?')">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <?php
    else:
        echo '<p class="error">No drivers found.</p>';
    endif;
    ?>

</body>
</html>
