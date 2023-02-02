<?php

// Connection to database
include('connect.php');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if update form is submitted
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    var_dump($id);
    $updated_at = date("Y-m-d H:i:s");
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Update user in database
    $sql = "UPDATE users SET updated_at='$updated_at', name='$name', email='$email', password='$password' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Get user data by id
$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE id=$id";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Update User</title>
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
<a href="index.php" class="back-button">Back</a>
<form action="" method="post">
<table>
    <tr>
        <th colspan="2">Edit User</th>
    </tr>

        <tr>
            <td>Name</td>
            <td><input type="text" name="name" value="<?php echo $user['name']; ?>"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="email" name="email" value="<?php echo $user['email']; ?>"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:right">
                <input type="hidden" name="id" value="<?php echo $user['id']?>">
                <input type="submit" value="Update">
            </td>
        </tr>
</table>
</form>
</body>
</html>