<?php


require_once __DIR__ . '/../model/UserModel.php';

class ProfileController {
    private $userModel;

    public function __construct(UserModel $userModel) {
        $this->userModel = $userModel;
    }

    public function showProfile() {
        $userId = $_SESSION['user_id'];
        $user = $this->userModel->getUserProfile($userId);
        require __DIR__ . '/../view/profile.php';
    }

    public function updateProfile() {
        $userId = $_SESSION['user_id'];
        $fullName = $_POST['full_name'] ?? '';
        $email = $_POST['email'] ?? '';
        $phone = $_POST['phone'] ?? '';
        
        $success = $this->userModel->updateProfile($userId, $fullName, $email, $phone);
        
        header('Location: index.php?action=profile&status=' . ($success ? 'success' : 'failed'));
        exit();
    }
    
    public function showPasswordChange() {
        require __DIR__ . '/../view/change_password.php';
    }

    public function changePassword() {
        $userId = $_SESSION['user_id'];
        $newPassword = $_POST['new_password'] ?? '';
        $confirmPassword = $_POST['confirm_password'] ?? '';
        
        if ($newPassword === $confirmPassword) {
            $success = $this->userModel->changePassword($userId, $newPassword);
            header('Location: index.php?action=change_password_page&status=' . ($success ? 'success' : 'failed'));
            exit();
        } else {
            $error = "Passwords do not match.";
            require __DIR__ . '/../view/change_password.php';
        }
    }
}