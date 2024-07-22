<?php
require 'functions.php';
if(isset($_POST["register"])){
    if(registrasi($_POST) > 0){
        echo "<script>
        alert('user baru berhasil ditambahkan!');
        </script>";
    }else{
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-image: url('log.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
            margin: 0;
        }

        .kotak_login {
            background: rgba(255, 255, 255, 0.9); /* White background with slight transparency */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 300px;
            text-align: center;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
            font-size: 20px;
        }

        .form_login {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .tombol_login {
            background: #5cb85c;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
        }

        .tombol_login:hover {
            background: #4cae4c;
        }

        a {
            color: #5cb85c;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
    <title>Halaman Registrasi</title>
</head>
<body>

<div class="kotak_login">
    <h1>Halaman Registrasi</h1>

    <form action="" method="post">
        <div>
            <label for="first_name">First Name :</label>
            <input type="text" class="form_login" name="first_name" id="first_name" required>
        </div>
        <div>
            <label for="last_name">Last Name :</label>
            <input type="text" class="form_login" name="last_name" id="last_name" required>
        </div>
        <div>
            <label for="register_date">Register Date :</label>
            <input type="date" class="form_login" name="register_date" id="register_date" required>
        </div>
        <div>
            <label for="username">Username :</label>
            <input type="text" class="form_login" name="username" id="username" required>
        </div>
        <div>
            <label for="password">Password :</label>
            <input type="password" class="form_login" name="password" id="password" required>
        </div>
        <div>
            <label for="password2">Konfirmasi Password :</label>
            <input type="password" class="form_login" name="password2" id="password2" required>
        </div>
        <div>
            <button type="submit" class="tombol_login" name="register">Register!</button>
        </div>
        <div>
            <a href="login.php">Halaman Login</a>
        </div>
    </form>
</div>

</body>
</html>
