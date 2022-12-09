<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="post">
        <input type="email" placeholder="Email" name="email" required/>
        <br>
        <input type="password" placeholder="Password" name="password" required/>
        <br>
        <input type="submit" value="Login" name="register"/>  
    </form>

    <a href='Signup.php'>
        <input 
            type="submit" 
            class="Signup"
            value="Signup"
        >
    </a>
    
</body>
</html>


<?php
    include("connection.php");
    if($_POST['register']){
        $email = $_POST['email'];
        $pass = $_POST['password'];
        
        $allData = "SELECT * FROM user";
        $display = mysqli_query($conn, $allData);

        $totalRow = mysqli_num_rows($display);

        while($result = mysqli_fetch_assoc($display)){
            if( $result['Email'] == $email ){
                if($pass == $result['Pass']){
                    header ("Location: home.php?name=".$result['Username']);
                    exit();
                }else{
                    echo "Wrong Password!";
                }
            }
        }

    }
?>