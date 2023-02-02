<?php
include('connect.php');
// Подключаемся к базе данных


// Получаем ID пользователя
$id = $_GET["id"];

// Удаляем пользователя
$query = "DELETE FROM users WHERE id=$id";
$conn->query($query);

// Редиректим на страницу со списком пользователей
header("Location: index.php");

$conn->close();
