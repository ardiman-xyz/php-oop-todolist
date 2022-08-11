<?php

namespace App\Service;

use App\Config\Database;
use App\Exception\ValidationException;
use App\Model\UserLoginRequest;
use App\Model\UserRegisterRequest;
use PHPUnit\Framework\TestCase;
use App\Repository\UserRepository;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertNotEquals;
use function PHPUnit\Framework\assertTrue;

class UserServiceTest extends TestCase
{
    private UserService $userService;

    protected function setUp(): void
    {
        $userRepository = new UserRepository(Database::getConnection());
        $this->userService = new UserService($userRepository);
    }

    public function testRegisterSuccess()
    {
        $user = new UserRegisterRequest();
        $user->username = "ardiman";
        $user->password = "ardiman123_";

        $response = $this->userService->register($user);

        assertEquals($user->username, $response->user->username);
        assertNotEquals($user->password, $response->user->password);

        assertTrue(password_verify($user->password, $response->user->password));
    }

    public function testRegisteredFailed()
    {
        $this->expectException(ValidationException::class);

        $user = new UserRegisterRequest();
        $user->username = "";
        $user->password = "";

        $this->userService->register($user);
    }

    public function testLoginSuccess()
    {
        $request = new UserLoginRequest();
        $request->username = "ardiman";
        $request->password = "ardiman123_";

        $response = $this->userService->login($request);

        self::assertEquals($request->username, $response->user->username);
        self::assertTrue(password_verify($request->password, $response->user->password));
    }

    public function testLoginWrongPassword()
    {
        $this->expectException(ValidationException::class);

        $request = new UserLoginRequest();
        $request->username = "ardiman";
        $request->password = "ardiman123f_";

        $this->userService->login($request);
    }

    public function testLoginNotFound()
    {
        $this->expectException(ValidationException::class);

        $request = new UserLoginRequest();
        $request->username = "Risal";
        $request->password = "ardiman123f_";

        $this->userService->login($request);
    }

    public function testLoginEmptyRequest()
    {
        $this->expectException(ValidationException::class);

        $request = new UserLoginRequest();
        $request->username = "";
        $request->password = "";

        $this->userService->login($request);
    }
}
