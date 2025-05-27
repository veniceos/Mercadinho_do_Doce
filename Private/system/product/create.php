<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Products</title>
</head>
<body>
    <h1>Create Product</h1>
    <form action="create.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="QR_code">QR Code:</label>
        <input type="text" id="QR_code" name="QR_code" required><br>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" step="0.01" required><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea><br>

        <button type="submit">Create Product</button>
    </form>

    <?php
    require_once 'C:/xampp/htdocs/Mercadinho_do_Doce/Private/config/config.php';
    require_once 'C:/xampp/htdocs/Mercadinho_do_Doce/Private/app/controller/product.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $productController = new ProductController($pdo);
        $productController->createProduct($_POST['name'], $_POST['QR_code'], $_POST['price'], $_POST['description']);
        header("Location: product.php");
        exit();
    }
    ?>
</body>
</html>