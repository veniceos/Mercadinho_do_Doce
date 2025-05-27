<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
</head>
<body>
    <h1>Update Product</h1>
    <?php
    require_once 'C:/xampp/htdocs/Mercadinho_do_Doce/Private/config/config.php';
    require_once 'C:/xampp/htdocs/Mercadinho_do_Doce/Private/app/controller/product.php';

    $productController = new ProductController($pdo);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Atualiza o produto com os dados do formulário
        $productController->updateProduct(
            $_POST['id'],
             $_POST['name'],
              $_POST['qr_code'],
               $_POST['price'],
                $_POST['description']);
    } else {
        // Obtém o ID do produto a ser atualizado
        $id = $_GET['id'] ?? null;
        if ($id) {
            $product = $productController->showProductperId($id);
        } else {
            echo "ID do produto não fornecido.";
            exit();
        }
    }
    ?>

    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($product['id']); ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required><br>

        <label for="qr_code">QR Code:</label>
        <input type="text" id="qr_code" name="qr_code" value="<?php echo htmlspecialchars($product['qr_code']); ?>" required><br>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" step="0.01" value="<?php echo htmlspecialchars($product['price']); ?>" required><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description"><?php echo htmlspecialchars($product['description']); ?></textarea><br>

        <button type="submit">Update Product</button>
    </form>
</body>
</html>