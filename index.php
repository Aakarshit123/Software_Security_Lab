<?php
include("connect.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $hash = hash("sha256",$password);

    $stmt = $conn->prepare("SELECT password FROM users WHERE username=?");
    $stmt->bind_param("s",$username);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows == 0){

        header("Location: registration.php");
        exit();

    } else {

        $row = $result->fetch_assoc();

        if($row['password'] == $hash){
            echo "Login Successful";
        } else {
            echo "Invalid Password";
        }
    }

    $stmt->close();
}

$conn->close();
?>

<form method="post">

Username:<br>
<input type="text" name="username"><br><br>

Password:<br>
<input type="password" name="password"><br><br>

<input type="submit" value="Login">

</form>

<br>

<a href="registration.php">Create Account</a>
