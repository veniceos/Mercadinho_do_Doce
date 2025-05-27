<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
</head>
<body>
    <h1>Users</h1>
    <a href="../index.php">Voltar</a>
    <a href="create.php">Create User</a>
    
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>CPF</th>
            <th>Phone Number</th>\
            <th>Password</th>
            <th>Actions</th>
        </tr>
        <?php
        require_once 'C:/xampp/htdocs/Mercadinho_do_Doce/Private/config/config.php';
        require_once 'C:/xampp/htdocs/Mercadinho_do_Doce/Private/app/controller/user.php';

        $userController = new UserController($pdo);
        $users = $userController->showUsers();

        foreach ($users as $user) {
            echo "<tr>";
            echo "<td>{$user['id']}</td>";
            echo "<td>{$user['name']}</td>";
            echo "<td>{$user['email']}</td>";
            echo "<td>{$user['cpf']}</td>";
            echo "<td>{$user['phone_number']}</td>";
            echo "<td>{$user['password']}</td>";
            echo "<td><a href='update.php?id={$user['id']}'>Update</a> | <a href='delete.php?id={$user['id']}'>Delete</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>