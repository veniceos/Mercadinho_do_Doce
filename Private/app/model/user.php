<?php
class UserModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Model para criar user
    public function createUser($name, $email, $cpf, $phone_number, $password) {
        $sql = "INSERT INTO user (name, email, cpf, phone_number, password) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        
        // Tenta executar a inserção e verifica se foi bem-sucedida
        if ($stmt->execute([$name, $email, $cpf, $phone_number, $password])) {
            // Redireciona para "User.php" se a inserção for bem-sucedida
            header('Location: User.php');
            exit();
        } else {
            // Exibe a mensm de erro se a inserção falhar
            echo "Não foi possível criar esse Competidor no momento";
        }
    }

    // Model para listar user
    public function showUsers() {
        $sql = "SELECT * FROM user";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Model para atualizar user
    public function updateUser($id, $name, $email, $cpf, $phone_number, $password) {
        try {
            $sql = "UPDATE user SET name = ?, email = ?, cpf = ?, phone_number = ?, password = ? WHERE id = ?";
            $stmt = $this->pdo->prepare($sql);
            $result = $stmt->execute([$name, $email, $cpf, $phone_number, $password, $id]);

            if ($result) {
                // Se a atualização for bem-sucedida, redirecione para User.php
                header("Location: User.php");
                exit();
            } else {
                // Se a atualização falhar, imprima a mensm de erro
                echo "Houve um erro, retorne mais tarde.";
            }
        } catch (Exception $e) {
            // Caso ocorra uma exceção, imprima a mensm de erro
            echo "Houve um erro, retorne mais tarde.";
        }
    }

    // Model para deletar user
    public function deleteUser($id) {
        try {
            $sql = "DELETE FROM user WHERE id = ?";
            $stmt = $this->pdo->prepare($sql);
            $result = $stmt->execute([$id]);

            if ($result) {
                // Se a exclusão for bem-sucedida, redirecione para User.php
                header("Location: User.php");
                exit();
            } else {
                // Se a exclusão falhar, imprima a mensm de erro
                echo "Houve um erro, retorne mais tarde.";
            }
        } catch (Exception $e) {
            // Caso ocorra uma exceção, imprima a mensm de erro
            echo "Houve um erro, retorne mais tarde.";
        }
    }

    // Model para mostrar user por ID
    public function showUserperId($id) {
        $sql = "SELECT * FROM user WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
}

?>