<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connection successful";

if (isset($_POST['Submit'])) {
    // Prepare statement
    $stmt = $conn->prepare("INSERT INTO tablecourse (course1, course2, course3, course4, course5, course6) VALUES (?, ?, ?, ?, ?, ?)");
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    // Bind parameters (s: string)
    $stmt->bind_param("ssssss", $_POST['course1'], $_POST['course2'], $_POST['course3'], $_POST['course4'], $_POST['course5'], $_POST['course6']);

    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>New Record added Successfully</div>";
        // Redirect to mySql1.php after successful insertion
        header('Location: mySql1.php');
        exit();
    } else {
        echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Courses</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Register Courses</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="course1">Course 1</label>
                <input type="text" class="form-control" name="course1" placeholder="Enter Course 1" required>
            </div>
            <div class="form-group">
                <label for="course2">Course 2</label>
                <input type="text" class="form-control" name="course2" placeholder="Enter Course 2" required>
            </div>
            <div class="form-group">
                <label for="course3">Course 3</label>
                <input type="text" class="form-control" name="course3" placeholder="Enter Course 3" required>
            </div>
            <div class="form-group">
                <label for="course4">Course 4</label>
                <input type="text" class="form-control" name="course4" placeholder="Enter Course 4" required>
            </div>
            <div class="form-group">
                <label for="course5">Course 5</label>
                <input type="text" class="form-control" name="course5" placeholder="Enter Course 5" required>
            </div>
            <div class="form-group">
                <label for="course6">Course 6</label>
                <input type="text" class="form-control" name="course6" placeholder="Enter Course 6" required>
            </div>
            <button type="submit" name="Submit" class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
