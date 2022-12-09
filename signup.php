<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" placeholder="Name" name="name" required/>
        <br>
        <input type="email" placeholder="Email" name="email" required/>
        <br>
        <input type="password" placeholder="Password" name="password" required/>
        <br>
        <input type="password" placeholder="Confirm password" name="confirmpassword" required/>
        <br>
        <input type="submit" value="Create" name="register"/>        
    </form>

    <p>I already have an account
        <a href='index.php'>Login Page </a>
    </p>
</body>
</html>

<?php
    include("connection.php");
    if($_POST['register']){
        $name = $_POST['name'];
        $id = 1;
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $confirmpass = $_POST['confirmpassword'];

        if($pass !== $confirmpass && $pass != '' && $confirmpass != ''){
            echo "<p>Password and Confirm Password is not same.</p>";
        }else{
            $query = "INSERT INTO user (Username, Email, Pass) values('$name', '$email', '$pass')";

            $data = mysqli_query($conn, $query);

            if($data == 0){
                echo "Data Inserting failed!";
            }
            header ("Location: index.php");
            exit();
        }
    }
?>