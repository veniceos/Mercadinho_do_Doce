<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Product</title>
</head>
<body>
    <h1>Delete Product</h1>
    <?php
    require_once 'C:/xampp/htdocs/Mercadinho_do_Doce/Private/config/config.php';
    require_once 'C:/xampp/htdocs/Mercadinho_do_Doce/Private/app/controller/product.php';

    $productController = new ProductController($pdo);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Deleta o produto com o ID fornecido
        $productController->deleteProduct($_POST['id']);
        header("Location: product.php");
        exit();
    } else {
        // Obtém o ID do produto a ser deletado
        $id = $_GET['id'] ?? null;
        if ($id) {
            $product = $productController->showProductperId($id);
        } else {
            echo "ID do produto não fornecido.";
            exit();
        }
    }
    ?>

    <form action="delete.php" method="POST">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($product['id']); ?>">
        <p>Você tem certeza que deseja deletar o produto "<?php echo htmlspecialchars($product['name']); ?>"?</p>
        <button type="submit">Deletar Produto</button>
    </form>
</body>
</html>