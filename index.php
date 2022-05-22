<?php 

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['id'])) {
    header("Location: home.php");
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE uemail='$email' AND upass='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $row['uid'];
        header("Location: home.php");
    } else {
        echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">

        <title>Task for Preneur Lab Limited</title>
    </head>
    <body>
        <div class="container">
            <h1 style="font-size: 3rem;">Task for <span style="font-size: 3rem; font-weight: 800; color:green;">PreneurLab</span> Limited</h1>
            <br>
            <br>
            <form action="" method="POST" class="login-email">
                <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
                <div class="input-group">
                    <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
                </div>
                <div class="input-group">
                    <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
                </div>
                <br>

                <div class="input-group">
                    <button name="submit" class="btn btn-success">Login</button>
                </div>
                <br>
                <p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>
            </form>
        </div>
    </body>
</html>