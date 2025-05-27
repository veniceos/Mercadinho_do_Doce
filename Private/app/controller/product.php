<?php
require_once 'C:/xampp/htdocs/Mercadinho_do_Doce/Private/app/model/product.php';

class ProductController {
    private $productModel;

    public function __construct($pdo) {

        $this->productModel = new ProductModel($pdo);
    }

    public function createProduct($name, $qr_code, $price, $description) {
        $this->productModel->createProduct($name, $qr_code, $price, $description);
    }

    public function showProducts() {
        return $this->productModel->showProducts();
    }

    public function showListProduct() {
        $products = $this->productModel->listarProducts();
        include 'C:/xampp/htdocs/Mercadinho_do_Doce/Private/app/view/product/update.php';
    }

    public function updateProduct($id, $name, $qr_code, $price, $description) {
        $this->productModel->updateProduct($id, $name, $qr_code, $price, $description);
    }
    
    public function deleteProduct ($id) {
        $this->productModel->deleteProduct($id);
    }

    public function showProductperId($id) {
        return $this->productModel->showProductperId($id);
    }
}

?>