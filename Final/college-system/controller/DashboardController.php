<?php


require_once __DIR__ . '/../model/UserModel.php';
require_once __DIR__ . '/../model/StudentModel.php';
require_once __DIR__ . '/../model/TeacherModel.php';

class DashboardController {
    private $userModel;
    private $studentModel;
    private $teacherModel;

    public function __construct(UserModel $userModel, StudentModel $studentModel, TeacherModel $teacherModel) {
        $this->userModel = $userModel;
        $this->studentModel = $studentModel;
        $this->teacherModel = $teacherModel;
    }

    public function showDashboard() {
        if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_role'])) {
            header('Location: index.php?action=login_page');
            exit();
        }

        $userId = $_SESSION['user_id'];
        $role = $_SESSION['user_role'];
        
        $userProfile = [];
        $students = [];
        
        $userProfile = $this->userModel->getUserProfile($userId);
        
        if ($role === 'student') {
            $attendance = $this->studentModel->getAttendance($userId);
            $calendar = $this->studentModel->getAcademicCalendar();
            $fees = $this->studentModel->getFeesStatus($userId);
            require __DIR__ . '/../view/student_dashboard.php';
        } else {
            $students = $this->teacherModel->getStudents();
            require __DIR__ . '/../view/teacher_dashboard.php';
        }
    }
}