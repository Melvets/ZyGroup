<?php 
session_start();
include 'functions.php';

if ( isset($_COOKIE['auth']) && isset($_COOKIE['key']) ) {
    $auth = $_COOKIE['auth'];
    $key = $_COOKIE['key'];

    $result = mysqli_query($db, "SELECT id_user, username FROM tbl_user");
    $row = mysqli_fetch_assoc($result);

    if ( $auth === hash('sha256', $row['id_user']) && $key === hash('sha256', $row['username']) ) {
        $_SESSION['login'] = true;
    }
}

if ( isset($_SESSION["login"]) ) {
    header("Location: index.php");
    exit;
}


if ( isset($_POST["login"]) ) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($db, "SELECT * FROM tbl_user WHERE username = '$username' ");

    if ( mysqli_num_rows($result) === 1 ) {
        $row = mysqli_fetch_assoc($result);

        if ( password_verify($password, $row["password"]) ) {
            $_SESSION["login"] = true;
            $_SESSION["data_user"] = $username;

            if ( isset($_POST["remember"]) ) {
                setcookie('auth', hash('sha256', $row['id_user']), time()+60 * 60 * 24);
                setcookie('key', hash('sha256', $row['username']), time()+60 * 60 * 24);
            }

            $_SESSION["alertInfo"] ="Anda login sebagai" . " " . $row['username'];
            header("Location: index.php");
        }
    }

    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZyGroup | Login</title>
    <link rel="icon" href="static/logo/ZyLogo2.png" type="image/x-icon"/>
    <link rel="shortcut icon" href="static/logo/ZyLogo2.png" type="image/x-icon"/>
    <!-- bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- style -->
    <link rel="stylesheet" href="loginstyle.css">

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&family=Niconne&family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&family=Russo+One&display=swap" rel="stylesheet">
    
</head>
<body>

    <section class="vh-100 section-login">
    <div class="background-custom "></div>
    <div class="container-fluid custom">
        <div class="row d-flex justify-content-center align-items-center h-100 ">
        <div class="col-md-9 col-lg-6 col-xl-4">
            <img src="static/logo/ZyLogo2.png"
            class="img-fluid logo" width="380" alt="ZyGroup">
        </div>

        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 px-5 rounded-3 my-5">
            
        <form action="" method="post">

            <div class="align-items-center mb-4">
                <h2 class="mb-0 page-title text-white">Login</h2>
            </div>
            
            <?php if ( isset($error) ) : ?>
            <div class="mb-3">
                <p class="text-danger">Upss... Username atau password salah!</p>
            </div>
            <?php endif; ?>

            <!-- Username input -->
            <div class="form-outline mb-3">
                <label for="username" class="form-label fw-bold text-white">Username</label>
                <input id="username" name="username" type="text" 
                class="form-control form-control-lg fs-6"
                placeholder="Enter username" required/>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-2">
                <label for="password" class="form-label fw-bold text-white">Password</label>
                <input id="password" name="password" type="password" 
                class="form-control form-control-lg fs-6"
                placeholder="Enter password" required/>
            </div>

                <!-- Checkbox -->
            <div class="form-check mb-0">
                <input id="remember-me" name="remember" class="form-check-input me-2" type="checkbox" value="" />
                <label for="remember-me" class="form-check-label text-white">
                    Remember me
                </label>
            </div>



            <div class="text-center text-lg-start mt-2 pt-2">
                <button type="submit" name="login" class="btn btn-primary btn-lg"
                style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                <p class="small fw-bold mt-2 pt-1 mb-0 text-white">Don't have an account? <a href="register.php"
                    class="link-danger">Register</a></p>
            </div>

        </form>

        </div>
        </div>
    </div>

    </section>    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>