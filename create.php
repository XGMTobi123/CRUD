<?php
include('connect.php');

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if($name == "" || $email == "" || $password == "") {
        echo "All fields are required!";
    } else {
        $sql = "INSERT INTO users (created_at, updated_at, name, email, password) VALUES (now(), now(), '$name', '$email', '$password')";
        if(mysqli_query($conn, $sql)) {
            header("location: index.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Create User</title>
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
<a href="index.php">Home</a>
<form action="" method="post">
    <table>
        <tr>
            <td>Name:</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><input type="email" name="email"></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="submit" value="Submit"></td>
        </tr>
    </table>
</form>
</body>
</html>