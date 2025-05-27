<?php
require_once 'C:/xampp/htdocs/Mercadinho_do_Doce/Private/app/model/employee.php';

class EmployeeController {
    private $employeeModel;

    public function __construct($pdo) {

        $this->employeeModel = new EmployeeModel($pdo);
    }

    public function createEmployee($name, $email, $cpf, $phone_number, $password, $position, $wage, $registration_date) {
        $this->employeeModel->createEmployee($name, $email, $cpf, $phone_number, $password, $position, $wage, $registration_date);
    }

    public function showEmployees() {
        return $this->employeeModel->showEmployees();
    }

    public function showListEmployee() {
        $employees = $this->employeeModel->listarEmployees();
        include 'C:/xampp/htdocs/Mercadinho_do_Doce/Private/app/view/employee/update.php';
    }

    public function updateEmployee($id, $name, $email, $cpf, $phone_number, $password, $position, $wage, $registration_date) {
        $this->employeeModel->updateEmployee($id, $name, $email, $cpf, $phone_number, $password, $position, $wage, $registration_date);
    }

    public function deleteEmployee($id) {
        $this->employeeModel->deleteEmployee($id);
    }

    public function showEmployeeperId($id) {
        return $this->employeeModel->showEmployeeperId($id);
    }
}
?>