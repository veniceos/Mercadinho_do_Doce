<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
</head>
<body>
        <?php
    require_once 'C:/xampp/htdocs/Mercadinho_do_Doce/Private/config/config.php';
    require_once 'C:/xampp/htdocs/Mercadinho_do_Doce/Private/app/controller/user.php';

    $userController = new UserController($pdo);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Deleta o user com o ID fornecido
        $userController->deleteUser($_POST['id']);
        header("Location: user.php");
        exit();
    } else {
        // Obtém o ID do user a ser deletado
        $id = $_GET['id'] ?? null;
        if ($id) {
            $user = $userController->showUserperId($id);
        } else {
            echo "ID do user não fornecido.";
            exit();
        }
    }
    ?>
    <form action="delete.php" method="POST">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($user['id']); ?>">
        <p>Você tem certeza que deseja deletar o user "<?php echo htmlspecialchars($user['name']); ?>"?</p>
        <button type="submit">Deletar Produto</button>
    </form>
</body>
</html>