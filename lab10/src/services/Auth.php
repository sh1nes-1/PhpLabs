<?php
require_once __DIR__."/../exceptions/AuthException.php";
require_once __DIR__."/../dao/UserDaoPdo.php";

session_start();

class Auth {
    private static ?Auth $singleton = null;

    private PDO $db;
    private UserDaoPdo $userDao;
    private ?User $user;    

    private function __construct() {
        require_once __DIR__."/../../config/db.php";

        $this->db = $db;
        $this->userDao = new UserDaoPdo($db);
        $this->user = null;

        $this->tryRestoreFromSession();
    }

    private function tryRestoreFromSession() {        
        if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
            $username = $_SESSION['username'];
            $password = $_SESSION['password'];

            $user = $this->userDao->findOneWithUsername($username);

            if ($user === FALSE || $user->getPassword() != $password) {
                $this->logOut();
                return;
            }
    
            $this->user = $user;
        }
    }

    public static function instance() {
        if (Auth::$singleton == null) {
            Auth::$singleton = new Auth();
        }

        return Auth::$singleton;
    }

    public function logIn($username, $password) {
        $user = $this->userDao->findOneWithUsername($username);

        if ($user === FALSE || !password_verify($password, $user->getPassword())) {
            throw new AuthException();
        }

        $_SESSION['username'] = $user->getUsername();
        $_SESSION['password'] = $user->getPassword();

        $this->user = $user;
    }

    public function logOut() {
        unset($_SESSION['username']);
        unset($_SESSION['password']);
        $this->user = null;
    }

    public function isLoggedIn() {
        return $this->user != null;
    }

    public function isLoggedAsAdmin() {
        return $this->isLoggedIn() && $this->user->isAdmin();
    }

    public function getUser() {
        return $this->user;
    }
}