<?php
session_start();
include 'head.php';
include 'conn.php';

$error = '';

if (isset($_POST["login"])) {
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    $sql = "SELECT * FROM admin_info WHERE admin_username='$username' AND admin_password='$password'";
    $result = mysqli_query($conn, $sql) or die("Query failed.");

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['loggedin'] = true;
        $_SESSION["username"] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Username and Password do not match!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('admin_image/blood-cells.jpg');
            background-size: fixed;
            background-repeat: no-repeat;
            background-attachment: fixed;
            min-height: 100vh;
            margin: 0;
        }

        .login-container {
            padding-top: 90px;
            padding-bottom: 90px;
        }

        .login-box {
            background-color: rgba(255, 255, 255, 0.92);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.3);
        }

        .login-title {
            font-size: 28px;
            font-weight: bold;
            text-align: center;
            color: #b30000;
            margin-bottom: 30px;
        }

        .form-label {
            font-weight: bold;
        }

        .btn-login {
            background-color: #b30000;
            border: none;
        }

        .btn-login:hover {
            background-color: #8b0000;
        }

        .home-button {
            margin-top: 30px;
        }

        .error-message {
            color: red;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container login-container">
    <div class="row justify-content-center">
        <div class="col-md-6 login-box">
            <div class="login-title">
                Blood Bank & Management<br>
                <small>Admin Login Portal</small>
            </div>

            <?php if (!empty($error)): ?>
                <div class="alert alert-danger text-center"><?= $error ?></div>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="form-group">
                    <label class="form-label">Username <span style="color:red">*</span></label>
                    <input type="text" name="username" class="form-control" placeholder="Enter your username" maxlength="10" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Password <span style="color:red">*</span></label>
                    <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                </div>

                <div class="text-center">
                    <button type="submit" name="login" class="btn btn-login text-white btn-block">LOGIN</button>
                </div>

                
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
</body>
</html>

