<?php
include("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $password = hash("sha256", $password);

    $stmt = $conn->prepare("INSERT INTO users (username,password) VALUES (?,?)");
    $stmt->bind_param("ss", $username, $password);

    if($stmt->execute()){
        header("Location: index.php");
        exit();
    } else {
        echo "Error";
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

<input type="submit" value="Register">
</form>

<br>
<a href="index.php">Go to Login</a>
