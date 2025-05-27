<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>
</head>
<body>
    <h1>Employees</h1>
    <a href="../index.php">Voltar</a>
    <a href="create.php">Create Employee</a>
    
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>CPF</th>
            <th>Phone Number</th>
            <th>Position</th>
            <th>Wage</th>
            <th>Registration Date</th>
            <th>Actions</th>
        </tr>
        <?php
        require_once 'C:/xampp/htdocs/Mercadinho_do_Doce/Private/config/config.php';
        require_once 'C:/xampp/htdocs/Mercadinho_do_Doce/Private/app/controller/employee.php';

        $employeeController = new EmployeeController($pdo);
        $employees = $employeeController->showEmployees();

        foreach ($employees as $employee) {
            echo "<tr>";
            echo "<td>{$employee['id']}</td>";
            echo "<td>{$employee['name']}</td>";
            echo "<td>{$employee['email']}</td>";
            echo "<td>{$employee['cpf']}</td>";
            echo "<td>{$employee['phone_number']}</td>";
            echo "<td>{$employee['position']}</td>";
            echo "<td>{$employee['wage']}</td>";
            echo "<td>{$employee['registration_date']}</td>";
            echo "<td><a href='update.php?id={$employee['id']}'>Update</a> | <a href='delete.php?id={$employee['id']}'>Delete</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>