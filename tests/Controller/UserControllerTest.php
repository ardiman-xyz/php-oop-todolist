<?php

namespace App\Controller;

use PHPUnit\Framework\TestCase;

class UserControllerTest extends TestCase
{
    private UserController $userController;

    protected function setUp(): void
    {
        $this->userController = new UserController();
    }

    public function testPostRegisterSuccess()
    {
        $_POST['name'] = 'Eko';
        $_POST['password'] = 'rahasia';

        $this->userController->postRegister();

        // asserS
    }
}
