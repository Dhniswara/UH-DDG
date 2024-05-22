<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    header("Location: index.php");
}
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'");
    if(mysqli_num_rows($duplicate) > 0){
        echo
        "<script> alert ('Username or Email has already taken'); </script>";
    }
    else {
        if ($password == $confirmpassword) {
            $query = "INSERT INTO tb_user VALUES ('','$name','$username','$email','$password')";
            mysqli_query($conn,$query);
            echo
            "<script> alert ('Registrasi Sukses'); </script>";
        }
        else {
            echo
            "<script> alert ('Password tidak sesuai'); </script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="form.css">
   
</head>
<body>

    <h2>Registration</h2>
    <form class ="" action="" method="post" autocomplete="off">
    <label for="name">Name : </label>
    <input type="text" name = "name" id = "name" required values = ""> <br>
    <label for="username">Username : </label>
    <input type="text" name = "username" id = "username" required values = ""> <br>
    <label for="emai">Email : </label>
    <input type="email" name = "email" id = "email" required values = ""> <br>
    <label for="password">Password : </label>
    <input type="password" name = "password" id = "password" required values = ""> <br>
    <label for="confirmpassword">Confirm Password :</label>
    <input type="password" name = "confirmpassword" id = "confirmpassword" required values = ""> <br>
    <button type="submit" name ="submit" >Register</button>
    </form>

    <br>
    <a href="login.php">Login</a>

    
</body>
</html>