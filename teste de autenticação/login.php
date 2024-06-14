<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $users = json_decode(file_get_contents('users.json'), true);

    foreach ($users as $user) {
        if ($user['username'] === $username && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $username;
            setcookie('user_id', $username, time() + (86400 * 30), "/"); // 30 dias de duração cookie
            header("Location: projetos/calculadora/calculadora.html");
            exit();
        }
    }
    echo "Login ou senha incorretos.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <form action="login.php" method="post">
        <label for="username">Nome de usuário:</label>
        <input type="text" name="username" required autocomplete="off">
        <br>
        <label for="password">Senha:</label>
        <input type="password" name="password" required autocomplete="off">
        <br>
        <button type="submit">Login</button>
    </form>
    <p>Não tem uma conta? <a href="register.php">Registre-se aqui</a></p>
</body>
</html>
