<?php


class StudentModel {
    private $conn;

    public function __construct(PDO $conn) {
        $this->conn = $conn;
    }

    public function getAttendance($studentId) {
        $stmt = $this->conn->prepare("SELECT * FROM attendance WHERE student_id = :id");
        $stmt->bindParam(':id', $studentId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getAcademicCalendar() {
        $stmt = $this->conn->prepare("SELECT * FROM academic_calendar ORDER BY event_date ASC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getFeesStatus($studentId) {
        $stmt = $this->conn->prepare("SELECT * FROM fees WHERE student_id = :id");
        $stmt->bindParam(':id', $studentId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}