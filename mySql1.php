<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Records</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .table {
            margin-top: 30px;
        }
        .btn-group-vertical > .btn {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Database Records</h1>

        <?php
        // Database connection parameters
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "register";

        // Create a connection to the database
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check the connection
        if ($conn->connect_error) {
            echo "<div class='alert alert-danger'>Connection failed: " . $conn->connect_error . "</div>";
        } else {
            echo "<div class='alert alert-success'>Connection successful</div>";
        }

        // Create the table if it does not exist
        $sql = "CREATE TABLE IF NOT EXISTS tablecourse (
            id INT AUTO_INCREMENT PRIMARY KEY,
            course1 VARCHAR(80) NOT NULL,
            course2 VARCHAR(80) NOT NULL,
            course3 VARCHAR(80) NOT NULL,
            course4 VARCHAR(80) NOT NULL,
            course5 VARCHAR(80) NOT NULL,
            course6 VARCHAR(80) NOT NULL,
            file1 VARCHAR(255) NOT NULL,
            file2 VARCHAR(255) NOT NULL,
            file3 VARCHAR(255) NOT NULL,
            file4 VARCHAR(255) NOT NULL,
            file5 VARCHAR(255) NOT NULL,
            file6 VARCHAR(255) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success'>Table created successfully</div>";
        } else {
            echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
        }

        // Handle delete request
        if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
            $id = intval($_GET['delete']);
            $deleteSql = "DELETE FROM tablecourse WHERE id=$id";
            if ($conn->query($deleteSql) === TRUE) {
                echo "<div class='alert alert-success'>Record deleted successfully</div>";
            } else {
                echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
            }
        }

        // Handle update request
        if (isset($_POST['update'])) {
            $id = isset($_POST['id']) ? intval($_POST['id']) : null;
            if ($id !== null && $id > 0) {
                $course1 = $conn->real_escape_string($_POST['course1']);
                $course2 = $conn->real_escape_string($_POST['course2']);
                $course3 = $conn->real_escape_string($_POST['course3']);
                $course4 = $conn->real_escape_string($_POST['course4']);
                $course5 = $conn->real_escape_string($_POST['course5']);
                $course6 = $conn->real_escape_string($_POST['course6']);

                $updateSql = "UPDATE tablecourse SET 
                    course1='$course1', 
                    course2='$course2', 
                    course3='$course3', 
                    course4='$course4', 
                    course5='$course5', 
                    course6='$course6' 
                    WHERE id=$id";

                if ($conn->query($updateSql) === TRUE) {
                    echo "<div class='alert alert-success'>Record updated successfully</div>";
                } else {
                    echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
                }
            } else {
                echo "<div class='alert alert-warning'>Invalid ID</div>";
            }
        }

        // Display all records
        $sql = "SELECT * FROM tablecourse";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table class='table table-striped'>";
            echo "<thead class='thead-dark'>";
            echo "<tr>";
            echo "<th>Course 1</th>";
            echo "<th>Course 2</th>";
            echo "<th>Course 3</th>";
            echo "<th>Course 4</th>";
            echo "<th>Course 5</th>";
            echo "<th>Course 6</th>";
            echo "<th>Files</th>";
            echo "<th>Actions</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            while ($rows = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($rows["course1"]) . "</td>";
                echo "<td>" . htmlspecialchars($rows["course2"]) . "</td>";
                echo "<td>" . htmlspecialchars($rows["course3"]) . "</td>";
                echo "<td>" . htmlspecialchars($rows["course4"]) . "</td>";
                echo "<td>" . htmlspecialchars($rows["course5"]) . "</td>";
                echo "<td>" . htmlspecialchars($rows["course6"]) . "</td>";
                echo "<td>";

                for ($i = 1; $i <= 6; $i++) {
                    $file_path = $rows["file$i"];
                    if ($file_path) {
                        echo "<a href='$file_path' target='_blank' class='btn btn-link'>Download File $i</a><br>";
                    }
                }

                echo "</td>";
                echo "<td>";
                echo "<a href='?delete=" . $rows["id"] . "' class='btn btn-danger btn-sm'>Delete</a>";
                echo " <a href='?edit=" . $rows["id"] . "' class='btn btn-warning btn-sm'>Edit</a>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<div class='alert alert-info'>No records found</div>";
        }

        // Display edit form
        if (isset($_GET['edit']) && is_numeric($_GET['edit'])) {
            $id = intval($_GET['edit']);
        
            // Query to get the data
            $editSql = "SELECT * FROM tablecourse WHERE id=$id";
            $editResult = $conn->query($editSql);
        
            // Check if the query was successful
            if ($editResult === false) {
                echo "<div class='alert alert-danger'>Error in query: " . $conn->error . "</div>";
            } elseif ($editResult->num_rows == 1) {
                // Fetch the data from the row
                $row = $editResult->fetch_assoc();
                echo "<form method='POST' class='mt-4'>";
                echo "<input type='hidden' name='id' value='" . htmlspecialchars($row['id']) . "'>";
                echo "<div class='form-group'>";
                echo "<label for='course1'>Course 1:</label>";
                echo "<input type='text' name='course1' class='form-control' value='" . htmlspecialchars($row['course1']) . "' required>";
                echo "</div>";
                echo "<div class='form-group'>";
                echo "<label for='course2'>Course 2:</label>";
                echo "<input type='text' name='course2' class='form-control' value='" . htmlspecialchars($row['course2']) . "' required>";
                echo "</div>";
                echo "<div class='form-group'>";
                echo "<label for='course3'>Course 3:</label>";
                echo "<input type='text' name='course3' class='form-control' value='" . htmlspecialchars($row['course3']) . "' required>";
                echo "</div>";
                echo "<div class='form-group'>";
                echo "<label for='course4'>Course 4:</label>";
                echo "<input type='text' name='course4' class='form-control' value='" . htmlspecialchars($row['course4']) . "' required>";
                echo "</div>";
                echo "<div class='form-group'>";
                echo "<label for='course5'>Course 5:</label>";
                echo "<input type='text' name='course5' class='form-control' value='" . htmlspecialchars($row['course5']) . "' required>";
                echo "</div>";
                echo "<div class='form-group'>";
                echo "<label for='course6'>Course 6:</label>";
                echo "<input type='text' name='course6' class='form-control' value='" . htmlspecialchars($row['course6']) . "' required>";
                echo "</div>";
                echo "<button type='submit' name='update' class='btn btn-primary'>Update</button>";
                echo "</form>";
            } else {
                echo "<div class='alert alert-warning'>No such record exists</div>";
            }
        }

        // Close the connection
        $conn->close();
        ?>
        <a href="formaction3.php" class="btn btn-secondary mt-3">Back to Dashboard</a>
    </div>
</body>
</html>  