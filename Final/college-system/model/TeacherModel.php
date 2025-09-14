<?php


class TeacherModel {
    private $conn;

    public function __construct(PDO $conn) {
        $this->conn = $conn;
    }

    public function getStudents() {
        $stmt = $this->conn->prepare("SELECT users.id, users.full_name, users.email FROM users JOIN students ON users.id = students.student_id");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function uploadNotes($teacherId, $title, $filePath) {
        $stmt = $this->conn->prepare("INSERT INTO notes (teacher_id, title, file_path) VALUES (:teacherId, :title, :filePath)");
        $stmt->bindParam(':teacherId', $teacherId);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':filePath', $filePath);
        return $stmt->execute();
    }
}