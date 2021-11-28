<?php

namespace Pages\Login;

use Exception;
use Infrastructure\Session;
use Pages\Controller;

class LoginController extends Controller
{
    private LoginService $loginService;
    public function __construct()
    {
        $this->loginService = new LoginService();
    }

    public function isAllowAccess(): bool
    {
        return true;
    }

    public function index()
    {
        Session::current()->endSession();
        
        return View('Login', 'index');
    }

    public function login()
    {
        $user = $this->loginService->getUser($_POST['username'], $_POST['password']);
        if ($user === null)
            header('Location: /Login');

        Session::initSession($user);

        header('Location: /Home');
    }

    public function register()
    {

        $user = $this->loginService->addUser($_POST['username'], $_POST['password']);
        $username = $user->id;

        header('Location: /Login');
    }
}
