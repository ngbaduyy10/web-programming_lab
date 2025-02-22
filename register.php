<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,600;0,700;1,400&family=Sen:wght@700&display=swap"
        rel="stylesheet"
    />
    <link rel="stylesheet" href="css/auth.css" />
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body class="row">
<div class="login-container col-xl-7 col-lg-8 col-md-10 col-sm-12">
    <div class="form-box login row align-items-stretch">
        <div class="d-none d-sm-block col-6 p-4 welcome">
            <div class="h-100 d-flex justify-content-center align-items-center">
                <div>
                    <h1 class="text-white">Welcome to Bright!</h1>
                    <p>Sign up with your personal information and be a part of our community.</p>
                    <p>Already have an account</p>
                    <a href="login.php" class="sec-button">Sign In</a>
                </div>
            </div>
        </div>
        <form action="" class="d-flex flex-column align-items-center col-12 col-sm-6 p-4">
            <h1>Sign Up</h1>
            <div class="input-box">
                <label for="username" class="d-block">Username</label>
                <input type="text" id="username" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <label for="email" class="d-block">Email</label>
                <input type="email" id="email" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <label for="password" class="d-block">Password</label>
                <input type="password" id="password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <button type="submit" class="button mt-4">Sign Up</button>
            <p class="other">or register with social platforms</p>
            <div class="social-icons">
                <a href="#"><i class='bx bxl-google'></i></a>
                <a href="#"><i class='bx bxl-facebook'></i></a>
                <a href="#"><i class='bx bxl-github'></i></a>
                <a href="#"><i class='bx bxl-linkedin'></i></a>
            </div>
        </form>
    </div>
</div>
</body>
</html>
