<?php


namespace App\models;

use PDO;

class Employee extends Model
{
    /**
     * @param $name
     * @param $email
     * @return bool
     */
    public function register(String $name, String $email): bool
    {
        $sql = 'INSERT INTO employee (name, email) '
            . 'VALUES (:name, :email)';
        $result = $this->db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        return $result->execute();
    }

    /**
     * @return array
     */
    public function getEmployeeList(): array
    {
        $result = $this->db->query(
            'SELECT id, name, email FROM employee ORDER BY id ASC');
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param $id
     * @return array
     */
    public function getEmployeeById(int $id): array
    {

        $sql = 'SELECT id, name, email  FROM employee WHERE id = :id';
        $result = $this->db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result->fetch();
    }


    /**
     * @param $id
     * @param $name
     * @param $email
     * @return bool
     */
    public function updateEmployee(int $id, string $name, string $email): bool
    {

        $sql = "UPDATE employee SET name = :name, email = :email  WHERE id = :id";

        $result = $this->db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        return $result->execute();
    }

    /**
     * @param $id
     * @return bool
     */
    public function deleteEmployeeById(int $id): bool
    {

        $sql = 'DELETE FROM employee WHERE id = :id';
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $this->db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * @param $name
     * @return bool
     */
    public static function checkName(String $name): bool
    {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }


    /**
     * @param $email
     * @return bool
     */
    public static function checkEmail(String $email): bool
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }


    /**
     * @param $email
     * @return bool if exist - true
     */
    public function checkEmailExists(String $email): bool
    {
        $sql = 'SELECT COUNT(*) FROM employee WHERE email = :email';
        $result = $this->db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        if ($result->fetchColumn()) {
            return true;
        } else {
            return false;
        }
    }
}