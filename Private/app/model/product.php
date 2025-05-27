<?php
class ProductModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Model para criar product
    public function createProduct($name, $qr_code, $price, $description) {
        $sql = "INSERT INTO product (name, qr_code, price, description) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        
        // Tenta executar a inserção e verifica se foi bem-sucedida
        if ($stmt->execute([$name, $qr_code, $price, $description])) {
            // Redireciona para "Product.php" se a inserção for bem-sucedida
            header('Location: Product.php');
            exit();
        } else {
            // Exibe a mensm de erro se a inserção falhar
            echo "Não foi possível criar esse Competidor no momento";
        }
    }
    


    // Model para listar product
    public function showProducts() {
        $sql = "SELECT * FROM product";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Model para atualizar product
    public function updateProduct($id, $name, $qr_code, $price, $description) {
        try {
            $sql = "UPDATE product SET name = ?, qr_code = ?, price = ?, description = ? WHERE id = ?";
            $stmt = $this->pdo->prepare($sql);
            $result = $stmt->execute([$name, $qr_code, $price, $description, $id]);
    
            if ($result) {
                // Se a atualização for bem-sucedida, redirecione para Product.php
                header("Location: Product.php");
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
    
    
    // Model para deletar Product
    public function deleteProduct($id) {
        try {
            $sql = "DELETE FROM product WHERE id = ?";
            $stmt = $this->pdo->prepare($sql);
            $result = $stmt->execute([$id]);
    
            if ($result) {
                // Se a exclusão for bem-sucedida, redirecione para Product.php
                header("Location: Product.php");
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
    

    public function showProductperId($id) {
        $sql = "SELECT * FROM product WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>