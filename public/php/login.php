<?php
if (isset($_POST["login"])) {
    if ($_POST["username"]  == "salwa" && $_POST["password"] == "salwa21") {
        header("Location: home.php");
        exit;
    } else {
        $error = true;
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CarHub Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #0f2027, #2c5364, #203a43);
            min-height: 100vh;
        }
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.2);
            padding: 2.5rem 2rem;
            width: 100%;
            max-width: 370px;
            text-align: center;
        }
        .login-card .logo {
            width: 70px;
            margin-bottom: 1.2rem;
        }
        .form-label {
            font-weight: 500;
        }
        .form-input {
            border-radius: 8px;
            border: 1px solid #ced4da;
            padding: 0.75rem 1rem;
            margin-bottom: 1rem;
            width: 100%;
        }
        .btn-primary {
            width: 100%;
            border-radius: 8px;
            padding: 0.7rem;
            font-weight: 600;
            background: linear-gradient(90deg, #0f2027 0%, #2c5364 100%);
            border: none;
        }
        .btn-primary:hover {
            background: linear-gradient(90deg, #2c5364 0%, #0f2027 100%);
        }
        .login-footer {
            margin-top: 1.5rem;
            font-size: 0.97rem;
        }
        .register-link {
            color: #2c5364;
            font-weight: 600;
            text-decoration: none;
        }
        .register-link:hover {
            text-decoration: underline;
        }
        .alert {
            font-size: 0.95rem;
        }
        @media (max-width: 576px) {
            .login-card {
                padding: 2rem 1rem;
            }
        }
    </style>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent" data-aos="fade-down">
        <div class="container">
            <a class="navbar-brand fw-bolder logo text-white" href="#">CarHub</a>
        </div>
    </nav>
    <!-- card login -->
    <div class="login-container">
        <div class="login-card" data-aos="zoom-in" data-aos-duration="900">
            <img src="../img/logo.png" class="logo" data-aos="flip-left" data-aos-duration="1200" alt="CarHub Logo">
            <h4 class="mb-3 fw-bold" style="color:#2c5364;">Welcome Back!</h4>
            <p class="mb-4 text-muted">Sign in to your CarHub account</p>
            <?php if (isset($error)) : ?>
                <div class="alert alert-danger mt-2" role="alert">
                    Username atau password salah!
                </div>
            <?php endif; ?>
            <form action="" method="POST" class="login-form" data-aos="fade-up" data-aos-delay="200">
                <div class="form-group mb-3 text-start">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username" class="form-input" placeholder="Enter your username" required>
                </div>
                <div class="form-group mb-4 text-start">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-input" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="btn btn-primary" name="login">Login</button>
            </form>
            <p class="login-footer" data-aos="fade-up" data-aos-delay="400">
                Don't have an account? <a href="register.php" class="register-link">Sign up here</a>
            </p>
        </div>
    </div>
    <!-- akhir card login -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true
        });
    </script>
</body>

</html>