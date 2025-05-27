<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Employee</title>
</head>
<body>
    <h1>Create Employee</h1>
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

        <label for="position">Position:</label>
        <input type="text" id="position" name="position" required><br>

        <label for="wage">Wage:</label>
        <input type="number" id="wage" name="wage" required><br>

        <label for="registrion_date">Registration Date:</label>
        <input type="date" id="registration_date" name="registration_date" required><br>

        <button type="submit">Create Employee</button>
    </form>

    <?php
    require_once 'C:/xampp/htdocs/Mercadinho_do_Doce/Private/config/config.php';
    require_once 'C:/xampp/htdocs/Mercadinho_do_Doce/Private/app/controller/employee.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $employeeController = new EmployeeController($pdo);
        $employeeController->createEmployee($_POST['name'],
            $_POST['email'],
            $_POST['cpf'],
            $_POST['phone_number'],
            $_POST['password'],
            $_POST['position'],
            $_POST['wage'],
            $_POST['registration_date'],);
        header("Location: employee.php");
        exit();
    }
    ?>
</body>
</html>