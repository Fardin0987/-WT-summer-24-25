<?php


class UserModel {
    private $conn;

    public function __construct(PDO $conn) {
        $this->conn = $conn;
    }

    public function validateUser($username, $password) {
        $stmt = $this->conn->prepare("SELECT id, role FROM users WHERE username = :username AND password = :password");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function registerUser($username, $password, $role, $fullName, $email) {
        try {
            $this->conn->beginTransaction();
            
            $stmt = $this->conn->prepare("INSERT INTO users (username, password, role, full_name, email) VALUES (:username, :password, :role, :fullName, :email)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':role', $role);
            $stmt->bindParam(':fullName', $fullName);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            
            $lastId = $this->conn->lastInsertId();
            
            if ($role === 'student') {
                $stmt = $this->conn->prepare("INSERT INTO students (student_id) VALUES (:id)");
            } else {
                $stmt = $this->conn->prepare("INSERT INTO teachers (teacher_id) VALUES (:id)");
            }
            $stmt->bindParam(':id', $lastId);
            $stmt->execute();
            
            $this->conn->commit();
            return true;
        } catch(PDOException $e) {
            $this->conn->rollBack();
            return false;
        }
    }
    
    public function getUserProfile($userId) {
        $stmt = $this->conn->prepare("SELECT full_name, username, email, phone, role FROM users WHERE id = :id");
        $stmt->bindParam(':id', $userId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function updateProfile($userId, $fullName, $email, $phone) {
        $stmt = $this->conn->prepare("UPDATE users SET full_name = :fullName, email = :email, phone = :phone WHERE id = :id");
        $stmt->bindParam(':fullName', $fullName);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':id', $userId);
        return $stmt->execute();
    }
    
    public function changePassword($userId, $newPassword) {
        $stmt = $this->conn->prepare("UPDATE users SET password = :newPassword WHERE id = :id");
        $stmt->bindParam(':newPassword', $newPassword);
        $stmt->bindParam(':id', $userId);
        return $stmt->execute();
    }
}