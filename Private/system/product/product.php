<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<body>
    <h1>Products</h1>
    <a href="../index.php">Voltar</a>
    <a href="create.php">Create Product</a>
    
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>QR Code</th>
            <th>Price</th>
            <th>Description</th>
        </tr>
        <?php
        require_once 'C:/xampp/htdocs/Mercadinho_do_Doce/Private/config/config.php';
        require_once 'C:/xampp/htdocs/Mercadinho_do_Doce/Private/app/controller/product.php';

        $productController = new ProductController($pdo);
        $products = $productController->showProducts();

        foreach ($products as $product) {
            echo "<tr>";
            echo "<td>{$product['id']}</td>";
            echo "<td>{$product['name']}</td>";
            echo "<td>{$product['qr_code']}</td>";
            echo "<td>{$product['price']}</td>";
            echo "<td>{$product['description']}</td>";
            echo "<td><a href='update.php?id={$product['id']}'>Update</a></td>";
            echo "<td><a href='delete.php?id={$product['id']}'>Delete</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>