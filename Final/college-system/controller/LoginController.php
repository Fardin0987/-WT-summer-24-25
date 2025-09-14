<?php


require_once __DIR__ . '/../model/UserModel.php';

class LoginController {
    private $userModel;

    public function __construct(UserModel $userModel) {
        $this->userModel = $userModel;
    }

    public function showLoginPage($error = null) {
        require __DIR__ . '/../view/login.php';
    }
    
    public function showSignupPage() {
        require __DIR__ . '/../view/signup.php';
    }

    public function login() {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        $user = $this->userModel->validateUser($username, $password);

        if ($user) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_role'] = $user['role'];
            header('Location: index.php?action=dashboard');
            exit();
        } else {
            $this->showLoginPage('Invalid username or password.');
        }
    }

    public function signup() {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        $role = $_POST['role'] ?? '';
        $fullName = $_POST['full_name'] ?? '';
        $email = $_POST['email'] ?? '';

        if ($this->userModel->registerUser($username, $password, $role, $fullName, $email)) {
            header('Location: index.php?action=login_page&success=1');
            exit();
        } else {
            $this->showSignupPage('Registration failed. Username or email may already exist.');
        }
    }

    public function logout() {
        session_destroy();
        header('Location: index.php');
        exit();
    }
}