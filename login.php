<?php
if (isset($_POST['submit'])){
    include 'config.php';
    echo "Triggered";
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password =  mysqli_real_escape_string($conn,$_POST['password']);
    $query = "SELECT id
                    FROM user
                    WHERE username ='$username' AND password = '$password';";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);
    if (is_array($row)){
        session_start();
        $_SESSION['user_id'] = $row[0]['id'];
        header("Location: index.php");
    }else{
        echo "<script>window.alert('Invalid Credentials');</script>";
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
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <form action="" method="POST">
        <label for="username">Username</label><input type="text" name="username">
        <label for="password">Password</label><input type="password" name="password">
        <input type="submit" name="submit">
   </form> 
</body>
</html>