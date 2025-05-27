<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
</head>
<body>
    <h1>Update User</h1>
    <?php
    require_once 'C:/xampp/htdocs/Mercadinho_do_Doce/Private/config/config.php';
    require_once 'C:/xampp/htdocs/Mercadinho_do_Doce/Private/app/controller/user.php';

    $userController = new UserController($pdo);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Atualiza o usuário com os dados do formulário
        $userController->updateUser(
            $_POST['id'],
            $_POST['name'],
            $_POST['email'],
            $_POST['cpf'],
            $_POST['phone_number'],
            $_POST['password']
        );
        header("Location: user.php");
        exit();
    } else {
        // Obtém o ID do usuário a ser atualizado
        $id = $_GET['id'] ?? null;
        if ($id) {
            $user = $userController->showUserperId($id);
        } else {
            echo "ID do usuário não fornecido.";
            exit();
        }
    }
    ?>
    <form action="update.php" method="POST">
        <input type="hidden" id="id" value="<?php echo htmlspecialchars($user['id']); ?>" name="id" required><br>

        <label for="name">Name:</label>
        <input type="text" id="name"value="<?php echo htmlspecialchars($user['name']); ?>" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email"value="<?php echo htmlspecialchars($user['email']); ?>" name="email" required><br>

        <label for="cpf">CPF:</label>
        <input type="text" id="cpf"value="<?php echo htmlspecialchars($user['cpf']); ?>" name="cpf" required><br>

        <label for="phone_number">Phone Number:</label>
        <input type="text" id="phone_number"value="<?php echo htmlspecialchars($user['phone_number']); ?>" name="phone_number" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password"value="<?php echo htmlspecialchars($user['password']); ?>" name="password" required><br>

        <button type="submit">Update User</button>
    </form>
</body>
</html>