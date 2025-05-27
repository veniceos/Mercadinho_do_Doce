<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Employee</title>
</head>
<body>
    <h1>Update Employee</h1>
    <?php
    require_once 'C:/xampp/htdocs/Mercadinho_do_Doce/Private/config/config.php';
    require_once 'C:/xampp/htdocs/Mercadinho_do_Doce/Private/app/controller/employee.php';

    $employeeController = new EmployeeController($pdo);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Atualiza o produto com os dados do formulário
        $employeeController->updateEmployee(
            $_POST['id'],
            $_POST['name'],
            $_POST['email'],
            $_POST['cpf'],
            $_POST['phone_number'],
            $_POST['password'],
            $_POST['position'],
            $_POST['wage'],
            $_POST['registration_date']);
    } else {
        // Obtém o ID do produto a ser atualizado
        $id = $_GET['id'] ?? null;
        if ($id) {
            $employee = $employeeController->showEmployeeperId($id);
        } else {
            echo "ID do produto não fornecido.";
            exit();
        }
    }
    ?>
    <form action="update.php" method="POST">
         <input type="hidden" name="id" value="<?php echo htmlspecialchars($employee['id']); ?>">

         <label for="name">Name:</label>
        <input type="text" id="name" value="<?php echo htmlspecialchars($employee['name']); ?>" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" value="<?php echo htmlspecialchars($employee['email']); ?>" name="email" required><br>

        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" value="<?php echo htmlspecialchars($employee['cpf']); ?>" name="cpf" required><br>

        <label for="phone_number">Phone Number:</label>
        <input type="text" id="phone_number" value="<?php echo htmlspecialchars($employee['phone_number']); ?>" name="phone_number" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" value="<?php echo htmlspecialchars($employee['password']); ?>" name="password" required><br>

        <label for="position">Position:</label>
        <input type="text" id="position" value="<?php echo htmlspecialchars($employee['position']); ?>" name="position" required><br>

        <label for="wage">Wage:</label>
        <input type="number" id="wage" value="<?php echo htmlspecialchars($employee['wage']); ?>" name="wage" required><br>
        
        <label for="registration_date">Registration Date:</label>
        <input type="date" id="registration_date" value="<?php echo htmlspecialchars($employee['registration_date']); ?>" name="registration_date" required><br>
        <button type="submit">Update Employee</button>

        </form>
</body>
</html>