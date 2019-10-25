<?php
if (isset($_POST['submit'])){
    include 'config.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $checkuname = mysqli_query($conn,"SELECT * FROM user WHERE username = '".$username."';");
    // echo gettype($checkuname);
    $row = mysqli_fetch_array($checkuname);
    print_r($row);
    if (is_array($row)){
        echo "<script>window.alert('Username already exits');</script>";
    }else{
        echo "<script>window.alert('TRIGGERED');</script>";
        
        $query = "INSERT INTO user (username,password,email)
                        VALUES ('$username','$password','$email')";
        mysqli_query($conn,$query);
        header("Location: login.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="stlye.css">
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="username" placeholder="username">
        <input type="email" name="email" placeholder="email">
        <input type="password" name="password" placeholder="password">
        <input type="submit" name="submit">
    </form>
</body>
</html>