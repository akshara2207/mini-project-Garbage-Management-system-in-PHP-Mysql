<?php
// Assuming you have a connection to your database
include("connection.php");

// Fetch data from the usertable
$query = "SELECT id, name, email FROM usertable";
$data = mysqli_query($con, $query);

// Check if data is available
$total = mysqli_num_rows($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User View</title>
    <!-- Include Bootstrap CSS -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!-- Link to your external stylesheet if needed -->
    <link rel="stylesheet" type="text/css" href="user_view.css">
</head>
<body>

    <div class="container">
        <h2>User View</h2>
        <?php
        if ($total != 0) {
            echo '<table class="table">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>ID</th>';
            echo '<th>Name</th>';
            echo '<th>Email</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            while ($result = mysqli_fetch_assoc($data)) {
                echo '<tr>';
                echo '<td>' . $result['id'] . '</td>';
                echo '<td>' . $result['name'] . '</td>';
                echo '<td>' . $result['email'] . '</td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
        } else {
            echo '<p>No records found</p>';
        }
        ?>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</body>
</html>
