<?php 
include 'functions.php';

if ( isset($_POST['register']) ) {
    if ( register($_POST) > 0 ) {
        echo "
            <script>
                alert('user baru berhasil ditambahkan!');
            </script>
        ";
    } else {
        echo mysqli_error($db);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZyGroup | Register</title>
    <link rel="icon" href="static/logo/ZyLogo.png" type="image/x-icon"/>
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
    <div class="container-fluid vh-100 custom2">
        <div class="row d-flex justify-content-center align-items-center h-100 ">

        <div class="col-md-8 col-lg-6 col-xl-4 px-5 rounded-3 my-5">

            <form action="" method="post">
            <div class="align-items-center mb-4">
                <h2 class="mb-0 page-title text-white text-center">Sign up</h2>
            </div>

            <!-- First / Last Name Input -->
            <div class="row mb-3">
                <div class="col form-outline">
                    <label for="first-name" class="form-label fw-bold text-white">First Name</label>
                    <input id="first-name" name="first_name" type="text" 
                    class="form-control form-control-lg fs-6"
                    placeholder="Enter first name" required/>
                </div>
                <div class="col form-outline">
                    <label for="last-name" class="form-label fw-bold text-white">Last Name</label>
                    <input id="last-name" name="last_name" type="text" 
                    class="form-control form-control-lg fs-6"
                    placeholder="Enter last name" />
                </div>
            </div>

            <!-- Username input -->
            <div class="form-outline mb-3">
                <label for="username" class="form-label fw-bold text-white">Username</label>
                <input id="username" name="username" type="text" 
                class="form-control form-control-lg fs-6"
                placeholder="Enter username" required/>
            </div>

            <!-- Email input -->
            <div class="form-outline mb-3">
                <label for="email" class="form-label fw-bold text-white">Email</label>
                <input id="email" name="email" type="email" 
                class="form-control form-control-lg fs-6"
                placeholder="Enter email" required/>
            </div>

            <!-- Create Password input -->
            <div class="form-outline mb-3">
                <label for="password" class="form-label fw-bold text-white">Password</label>
                <input id="password" name="password" type="password" 
                class="form-control form-control-lg fs-6"
                placeholder="Create password" required/>
            </div>

            <!-- Confirm password -->
            <div class="form-outline mb-2">
                <label for="password2" class="form-label fw-bold text-white">Confirm Password</label>
                <input id="password" name="password2" type="password" 
                class="form-control form-control-lg fs-6"
                placeholder="Confirm password" required/>
            </div>

            <div class="text-center mt-3 pt-2">
                <button type="submit" name="register" class="btn btn-primary btn-lg"
                style="padding-left: 2.5rem; padding-right: 2.5rem;">Create New Account</button>
                <p class="small fw-bold mt-2 pt-1 mb-0 text-white">Already have an account? <a href="login.php"
                    class="link-danger">Login</a></p>
            </div>

            </form>
        </div>

        <!-- <div class="col-md-9 col-lg-6 col-xl-4 offset-xl-1">
            <img src="static/logo/ZyLogo.png"
            class="img-fluid logo" width="450" alt="ZyGroup">
        </div> -->

        </div>
    </div>

    </section>    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>