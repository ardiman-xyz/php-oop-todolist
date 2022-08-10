<?php

namespace App\Controller;

use App\App\View;
use App\Config\Database;
use App\Exception\ValidationException;
use App\Model\UserRegisterRequest;
use App\Repository\UserRepository;
use App\Service\UserService;

class UserController
{

    private UserService $userService;

    public function __construct()
    {
        $userRepository = new UserRepository(Database::getConnection());
        $this->userService = new UserService($userRepository);
    }

    public function register()
    {
        View::render("User/register", [
            "title" => "Register new User"
        ]);
    }

    public function postRegister()
    {
        $request = new UserRegisterRequest();
        $request->username = $_POST['username'];
        $request->password = $_POST['password'];

        try {
            $this->userService->register($request);
            View::redirect('/users/login');
        } catch (ValidationException $exception) {
            View::render("User/register", [
                'title' => 'Register new User',
                'error' => $exception->getMessage()
            ]);
        }
    }

    public function login(): void
    {
        View::render("User/login", [
            "title" => "user login"
        ]);
    }
}
