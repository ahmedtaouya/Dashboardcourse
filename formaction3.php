<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Welcome</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        }

        .navbar {
            margin-bottom: 30px;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .nav-link {
            font-size: 1.1rem;
        }

        .btn {
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* 3D button effect */
            transition: all 0.3s ease; /* Smooth transition for hover effect */
        }

        .btn-primary {
            background-color: #3f51b5;
            border-color: #3f51b5;
        }

        .btn-primary:hover {
            background-color: #283593;
            border-color: #283593;
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15); /* Darker shadow on hover */
        }

        .btn-success {
            background-color: #4CAF50;
            border-color: #4CAF50;
        }

        .btn-success:hover {
            background-color: #45a049;
            border-color: #45a049;
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15); /* Darker shadow on hover */
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #c82333;
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15); /* Darker shadow on hover */
        }

        footer {
            background-color: #343a40;
        }

        footer p {
            margin: 0;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="RegPage.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="course.php">Add Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="mySql1.php">View Courses</a>
                    </li>
                    <li class="nav-item">
                        <form action="logout.php" method="post" class="d-inline">
                            <button type="submit" name="Submit" class="btn btn-danger btn-sm">Log Out</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container text-center mt-5">
        <h1 class="display-4">Welcome to Your Dashboard</h1>
        <p class="lead">You have successfully logged in to the secured page.</p>

        <div class="mt-4">
            <a href="course.php" class="btn btn-primary btn-lg mx-2">Add Courses</a>
            <a href="mySql1.php" class="btn btn-success btn-lg mx-2">View Courses</a>
            <form action="logout.php" method="post" class="d-inline">
                <button type="submit" name="Submit" class="btn btn-danger btn-lg">Log Out</button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p>&copy; 2024 Dashboard. All Rights Reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
