<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        echo "As senhas não coincidem.";
        exit();
    }

    $users = json_decode(file_get_contents('users.json'), true);

    foreach ($users as $user) {
        if ($user['username'] === $username) {
            echo "Nome de usuário já existe.";
            exit();
        }
    }

    $new_user = [
        'username' => $username,
        'password' => password_hash($password, PASSWORD_DEFAULT)
    ];

    $users[] = $new_user;
    file_put_contents('users.json', json_encode($users, JSON_PRETTY_PRINT));

    echo "Usuário cadastrado com sucesso! <a href='login.php'>Faça login aqui</a>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
</head>
<body>
    <form action="register.php" method="post">
        <label for="username">Nome de usuário:</label>
        <input type="text" name="username" required>
        <br>
        <label for="password">Senha:</label>
        <input type="password" name="password" required>
        <br>
        <label for="confirm_password">Confirme a senha:</label>
        <input type="password" name="confirm_password" required>
        <br>
        <button type="submit">Registrar</button>
    </form>
</body>
</html>
