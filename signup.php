<?php 





    session_start();
    $conn = mysqli_connect("localhost","root","","saint_anne");

    if(!$conn){
        echo "Not connected!";
    }

    if(isset($_SESSION['UserId'])){
        header("Location: ../login.php ");
    }

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $check = mysqli_query($conn, " SELECT * FROM users WHERE username = '{$username}' " );
        if(mysqli_num_rows($check) > 0){
            echo " Username already exist!";
        }else{
            $sql = mysqli_query($conn, "INSERT INTO users(username, password) VALUES('{$username}','{$password}') ");
            if($sql == true){
                $query = mysqli_query($conn, " SELECT * FROM users WHERE username = '{$username}' AND `password` = '{$password}'" );
                $fetch = mysqli_fetch_assoc($query);
                $_SESSION['UserId'] = $fetch['UserId'];
                header("Location: ./login.php");
            }else{
                echo "Not inserted";
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN UP</title>
    <style>body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f2f2f2;
}

form {
    width: 300px;
    margin: 50px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #fff;
}

form div {
    margin-bottom: 15px;
}

form label {
    display: block;
    margin-bottom: 5px;
}

form input[type="text"],
form input[type="password"],
form button[type="submit"] {
    width: calc(100% - 10px);
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

form button[type="submit"] {
    width: 100%;
    background-color: #4caf50;
    color: white;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

form button[type="submit"]:hover {
    background: rgb(73, 57, 113);
}

form div:last-child {
    margin-bottom: 0;
    text-align: center;
}
</style>
</head>
<body>

    <form action="" method="POST">
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" >
        </div>
        <div>
            <label for="password">Password</label>
            <input type="Password" name="password" >
        </div>
        <button type="submit" name="submit">Sign Up</button>
    </form>

</body>
</html>