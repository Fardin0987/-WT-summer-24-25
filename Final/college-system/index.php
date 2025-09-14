<?php


session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/includes/db_connection.php';
require_once __DIR__ . '/model/UserModel.php';
require_once __DIR__ . '/model/StudentModel.php';
require_once __DIR__ . '/model/TeacherModel.php';
require_once __DIR__ . '/controller/LoginController.php';
require_once __DIR__ . '/controller/DashboardController.php';
require_once __DIR__ . '/controller/ProfileController.php';

$userModel = new UserModel($conn);
$studentModel = new StudentModel($conn);
$teacherModel = new TeacherModel($conn);

$loginController = new LoginController($userModel);
$dashboardController = new DashboardController($userModel, $studentModel, $teacherModel);
$profileController = new ProfileController($userModel);

$action = $_GET['action'] ?? $_POST['action'] ?? 'login_page';


$publicActions = ['login_page', 'login', 'signup_page', 'signup'];

if (!in_array($action, $publicActions) && !isset($_SESSION['user_id'])) {
    header('Location: index.php?action=login_page');
    exit();
}

switch ($action) {
    case 'login_page':
        $loginController->showLoginPage();
        break;
    case 'login':
        $loginController->login();
        break;
    case 'logout':
        $loginController->logout();
        break;
    case 'signup_page':
        $loginController->showSignupPage();
        break;
    case 'signup':
        $loginController->signup();
        break;
    case 'dashboard':
        $dashboardController->showDashboard();
        break;
    case 'profile':
        $profileController->showProfile();
        break;
    case 'update_profile':
        $profileController->updateProfile();
        break;
    case 'change_password_page':
        $profileController->showPasswordChange();
        break;
    case 'change_password':
        $profileController->changePassword();
        break;
    case 'academic_calendar':
        include 'view/academic_calendar.php';
        break;
    case 'upload_notes':
        
        if ($_SESSION['user_role'] === 'teacher') {
            $teacherId = $_SESSION['user_id'];
            $title = $_POST['note_title'] ?? '';
            
            $uploadDir = 'public/uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $filePath = $uploadDir . basename($_FILES['note_file']['name']);
            move_uploaded_file($_FILES['note_file']['tmp_name'], $filePath);
            $teacherModel->uploadNotes($teacherId, $title, $filePath);
            header('Location: index.php?action=dashboard&status=upload_success');
            exit();
        }
        break;
    default:
        header('Location: index.php?action=login_page');
        exit();
}
?>