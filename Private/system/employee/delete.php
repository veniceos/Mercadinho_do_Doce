<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Employee</title>
</head>
<body>
        <?php
    require_once 'C:/xampp/htdocs/Mercadinho_do_Doce/Private/config/config.php';
    require_once 'C:/xampp/htdocs/Mercadinho_do_Doce/Private/app/controller/employee.php';

    $employeeController = new EmployeeController($pdo);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Deleta o employee com o ID fornecido
        $employeeController->deleteEmployee($_POST['id']);
        header("Location: employee.php");
        exit();
    } else {
        // Obtém o ID do employee a ser deletado
        $id = $_GET['id'] ?? null;
        if ($id) {
            $employee = $employeeController->showEmployeeperId($id);
        } else {
            echo "ID do employee não fornecido.";
            exit();
        }
    }
    ?>
    <form action="delete.php" method="POST">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($employee['id']); ?>">
        <p>Você tem certeza que deseja deletar o employee "<?php echo htmlspecialchars($employee['name']); ?>"?</p>
        <button type="submit">Deletar Produto</button>
    </form>
</body>
</html>