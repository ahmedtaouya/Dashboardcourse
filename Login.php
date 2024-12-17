<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('45271.jpg'); /* Add the correct path */
            background-size: cover; /* Ensures image fits the screen */
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            font-family: Arial, sans-serif;
            color: #333;
        }
        .card-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Full height of the viewport */
        }

        .card {
            width: 100%; /* Make the card full width and take full advantage of available space */
            max-width: 700px; /* Max width of the card */
            perspective: 1000px;
            transform-style: preserve-3d;
            transition: transform 0.5s;
        }

        .card:hover {
            transform: rotateY(5deg);
        }

        .card-header {
            background: #3f51b5;
            color: white;
        }

        .btn-primary {
            background: #3f51b5;
            border-color: #3f51b5;
        }

        .btn-primary:hover {
            background: #283593;
            border-color: #283593;
        }
    </style>
</head>
<body class="bg-light">

    <!-- Main Content -->
    <div class="container mt-5">
        <div class="card-container">
            <div class="card shadow">
                <div class="card-header text-center">
                    <h2>Login Page</h2>
                </div>
                <div class="card-body">
                    <form action="formaction3.php" method="post">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="Submit" class="btn btn-primary btn-lg">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
