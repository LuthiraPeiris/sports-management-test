<?php
session_start();
include 'db.php';


if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $query->bind_param("s", $email);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {

            // Store user info in session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];

            // Redirect based on role
            if ($user['role'] == 'student') {
                header("Location: Student_Dashboard.php");
                exit();
            } else {
                header("Location: Coach_Dashboard.php");
                exit();
            }
        } else {
            echo "<script>alert('Invalid Password');</script>";
        }
    } else {
        echo "<script>alert('Email Not Found');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .login-card {
            max-width: 450px;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 2px 8px rgba(0,0,0,0.15);
        }
    </style>
</head>

<body class="bg-light">

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card login-card w-100">

            <h2 class="text-center mb-4 fw-bold" style="color:#2969a5;">Login</h2>

            <form method="POST">
                <input class="form-control mb-3" placeholder="Email" name="email" required>
                <input class="form-control mb-3" type="password" placeholder="Password" name="password" required>
                <div class="text-center">
                    <button class="btn btn-primary px-4" name="login">Login</button>
                </div>
            </form>

        </div>
    </div>

</body>
</html>
