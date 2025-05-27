<?php
require_once 'C:/xampp/htdocs/Mercadinho_do_Doce/Private/app/model/user.php';

class UserController {
    private $UserModel;

    public function __construct($pdo) {

        $this->UserModel = new UserModel($pdo);
    }

    public function createUser($name, $email, $cpf, $phone_number, $password) {
        $this->UserModel->createUser($name, $email, $cpf, $phone_number, $password);
    }

    public function showUsers() {
        return $this->UserModel->showUsers();
    }

    public function showListUser() {
        $users = $this->UserModel->listarUsers();
        include 'C:/xampp/htdocs/Mercadinho_do_Doce/Private/app/view/user/update.php';
    }

    public function updateUser($id, $name, $email, $cpf, $phone_number, $password) {
        $this->UserModel->updateUser($id, $name, $email, $cpf, $phone_number, $password);
    }

    public function deleteUser($id) {
        $this->UserModel->deleteUser($id);
    }

    public function showUserperId($id) {
        return $this->UserModel->showUserperId($id);
    }
}
?>