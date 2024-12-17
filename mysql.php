<?php
$status = "";
if (isset($_POST['new']) && $_POST['new'] == 1) {
    $course1 = $_REQUEST['course1'];
    $course2 = $_REQUEST['course2'];
    $course3 = $_REQUEST['course3'];
    $course4 = $_REQUEST['course4'];
    $course5 = $_REQUEST['course5'];
    $course6 = $_REQUEST['course6'];

    // Directory for file uploads
    $uploads_dir = 'uploads';
    if (!is_dir($uploads_dir)) {
        mkdir($uploads_dir, 0777, true);
    }

    $file_paths = [];
    for ($i = 1; $i <= 6; $i++) {
        $file_field = "file" . $i;
        if (!empty($_FILES[$file_field]['name'])) {
            $file_name = basename($_FILES[$file_field]['name']);
            $file_path = $uploads_dir . "/" . $file_name;

            // Move uploaded file to the uploads directory
            if (move_uploaded_file($_FILES[$file_field]['tmp_name'], $file_path)) {
                $file_paths[] = $file_path;
            } else {
                $file_paths[] = null;
                $status = "Error uploading file for Course $i.";
                break; // Exit loop on error
            }
        } else {
            $file_paths[] = null;
        }
    }

    if (!$status) { // Only execute SQL if no errors occurred during file upload
        $conn = new mysqli("localhost", "root", "", "register");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO tablecourse (course1, course2, course3, course4, course5, course6, file1, file2, file3, file4, file5, file6) 
                VALUES ('$course1', '$course2', '$course3', '$course4', '$course5', '$course6', 
                        '" . $file_paths[0] . "', '" . $file_paths[1] . "', '" . $file_paths[2] . "', 
                        '" . $file_paths[3] . "', '" . $file_paths[4] . "', '" . $file_paths[5] . "')";

        if ($conn->query($sql) === TRUE) {
            $status = "New record added successfully";
        } else {
            $status = "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Courses</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white text-center">
                        <h2>Add Courses</h2>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($status)) { echo "<div class='alert alert-info'>$status</div>"; } ?>
                        <form action="addcourses.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="new" value="1">
                            <?php for ($i = 1; $i <= 6; $i++): ?>
                            <div class="mb-3">
                                <label for="course<?= $i ?>" class="form-label">Course <?= $i ?></label>
                                <input type="text" id="course<?= $i ?>" name="course<?= $i ?>" class="form-control" placeholder="Enter Course <?= $i ?>" required>
                                <label for="file<?= $i ?>" class="form-label mt-2">Upload File for Course <?= $i ?></label>
                                <input type="file" id="file<?= $i ?>" name="file<?= $i ?>" class="form-control">
                            </div>
                            <?php endfor; ?>
                            <div class="text-center">
                                <button type="submit" name="Submit" class="btn btn-primary btn-lg">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Fetching records with file download links
$conn = new mysqli("localhost", "root", "", "register");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all records from tablecourse
$sql = "SELECT * FROM tablecourse";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<div class='container mt-5'><table class='table table-striped'>";
    echo "<thead class='thead-dark'><tr><th>Course 1</th><th>Course 2</th><th>Course 3</th><th>Course 4</th><th>Course 5</th><th>Course 6</th><th>Files</th><th>Actions</th></tr></thead><tbody>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["course1"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["course2"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["course3"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["course4"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["course5"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["course6"]) . "</td>";

        // Display download links for files
        echo "<td>";
        for ($i = 1; $i <= 6; $i++) {
            $file_path = $row["file$i"];
            if ($file_path) {
                echo "<a href='$file_path' target='_blank'>Download File $i</a><br>";
            }
        }
        echo "</td>";

        echo "<td>";
        echo "<a href='?delete=" . $row["id"] . "' class='btn btn-danger btn-sm'>Delete</a>";
        echo " <a href='?edit=" . $row["id"] . "' class='btn btn-warning btn-sm'>Edit</a>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</tbody></table></div>";
} else {
    echo "<div class='alert alert-info'>No records found</div>";
}

$conn->close();
?>
