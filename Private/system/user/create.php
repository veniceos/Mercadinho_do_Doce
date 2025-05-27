<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
</head>
<body>
    <h1>Create User</h1>
    <form action="create.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" required><br>

        <label for="phone_number">Phone Number:</label>
        <input type="text" id="phone_number" name="phone_number" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <button type="submit">Create User</button>

    <?php
    require_once 'C:/xampp/htdocs/Mercadinho_do_Doce/Private/config/config.php';
    require_once 'C:/xampp/htdocs/Mercadinho_do_Doce/Private/app/controller/user.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $userController = new UserController($pdo);
        $userController->createUser(
            $_POST['name'],
            $_POST['email'],
            $_POST['cpf'],
            $_POST['phone_number'],
            $_POST['password']);
        header("Location: user.php");
        exit();
    }
    ?>
</body>
</html>