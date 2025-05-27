<?php
class EmployeeModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Model para criar employee
    public function createEmployee($name, $email, $cpf, $phone_number, $password, $position, $wage, $registration_date) {
        $sql = "INSERT INTO employee (name, email, cpf, phone_number, password, position, wage, registration_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        
        // Tenta executar a inserção e verifica se foi bem-sucedida
        if ($stmt->execute([$name, $email, $cpf, $phone_number, $password, $position, $wage, $registration_date])) {
            // Redireciona para "Employee.php" se a inserção for bem-sucedida
            header('Location: Employee.php');
            exit();
        } else {
            // Exibe a mensm de erro se a inserção falhar
            echo "Não foi possível criar esse Competidor no momento";
        }
        $registration_date = $_POST['registration_date'] ?? null;

        if (!$registration_date) {
            echo "Erro: data não enviada.";
            exit();
        }

        // Continua se a data foi enviada corretamente
        $model->createEmployee($name, $email, $cpf, $phone_number, $password, $position, $wage, $registration_date);
            
    }

    // Model para listar employee
    public function showEmployees() {
        $sql = "SELECT * FROM employee";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateEmployee($id, $name, $email, $cpf, $phone_number, $password = null)
{
    try {
        if ($password) {
            $sql = "UPDATE employee SET name = ?, email = ?, cpf = ?, phone_number = ?, password = ? WHERE id = ?";
            $stmt = $this->pdo->prepare($sql);
            $params = [$name, $email, $cpf, $phone_number, $password, $id];
        } else {
            $sql = "UPDATE employee SET name = ?, email = ?, cpf = ?, phone_number = ? WHERE id = ?";
            $stmt = $this->pdo->prepare($sql);
            $params = [$name, $email, $cpf, $phone_number, $id];
        }

        if ($stmt->execute($params)) {
            header("Location: Employee.php");
            exit();
        } else {
            echo "Houve um erro, retorne mais tarde.";
        }
    } catch (Exception $e) {
        echo "Houve um erro, retorne mais tarde.";
    }
}


    // Model para deletar employee
    public function deleteEmployee($id) {
        try {
            $sql = "DELETE FROM employee WHERE id = ?";
            $stmt = $this->pdo->prepare($sql);
            $result = $stmt->execute([$id]);
    
            if ($result) {
                // Se a deleção for bem-sucedida, redirecione para Employee.php
                header("Location: Employee.php");
                exit();
            } else {
                // Se a deleção falhar, imprima a mensm de erro
                echo "Houve um erro, retorne mais tarde.";
            }
        } catch (Exception $e) {
            // Caso ocorra uma exceção, imprima a mensm de erro
            echo "Houve um erro, retorne mais tarde.";
        }
    }

    // Model para mostrar employee por ID
    public function showEmployeeperId($id) {
        $sql = "SELECT * FROM employee WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
}

?>