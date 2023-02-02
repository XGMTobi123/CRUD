<?php
include('connect.php');

// Выбираем всех пользователей
$query = "SELECT * FROM users";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["name"]; ?></td>
            <td><?php echo $row["email"]; ?></td>
            <td>
                <a href='update.php?id=<?php echo $row["id"]; ?>'>Edit</a> |
                <a href='delete.php?id=<?php echo $row["id"]; ?>'>Delete</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

<a href='create.php'>Create New User</a>
</body>
</html>
<?php
$conn->close();
