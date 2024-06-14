<?php
session_start();
if (!isset($_SESSION['user_id']) && !isset($_COOKIE['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : $_COOKIE['user_id'];

echo "Bem-vindo, " . htmlspecialchars($user_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Página Inicial</title>
</head>
<body>
    <h1>Você está autenticado!</h1>
    <a href="logout.php">Logout</a>
</body>
</html>
