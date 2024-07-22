<?php
session_start();
require("functions.php");

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // cek username
    if (mysqli_num_rows($result) === 1) {
        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            $_SESSION['login'] = true;
            header("Location: indexuser.php");
            exit;
        }
    }
    $error = true;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('log.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .kotak_login {
            width: 350px;
            background: rgba(255, 255, 255, 0.9); /* White background with slight transparency */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
            font-weight: 300;
        }

        .form_login {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .tombol_login {
            background: #66bbbb;
            color: white;
            font-size: 14pt;
            width: 100%;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
        }

        .tombol_login:hover {
            background: #559999;
        }

        .link {
            color: #232323;
            text-decoration: none;
            font-size: 10pt;
        }

        .link:hover {
            text-decoration: underline;
        }

        .error {
            color: red;
            font-style: italic;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="kotak_login">
        <h1>Login</h1>

        <?php if (isset($error)): ?>
            <p class="error">Username atau password Anda salah!</p>
        <?php endif; ?>

        <form action="" method="post">
            <div>
                <label for="username">Username :</label>
                <input type="text" class="form_login" name="username" id="username" required>
            </div>
            <div>
                <label for="password">Password :</label>
                <input type="password" class="form_login" name="password" id="password" required>
            </div>
            <div>
                <button type="submit" class="tombol_login" name="login">Login</button>
            </div>
        </form>
        <p>Sudah punya akun? Jika belum silahkan <a class="link" href="registrasi.php">Registrasi</a></p>
    </div>
</body>
</html>
