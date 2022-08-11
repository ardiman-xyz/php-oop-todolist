<?php

namespace App\Service;

use App\Entity\User;
use App\Exception\ValidationException;
use App\Model\UserLoginRequest;
use App\Model\UserLoginResponse;
use App\Model\UserRegisterRequest;
use App\Model\UserRegisterResponse;
use App\Repository\UserRepository;

class UserService
{

    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(UserRegisterRequest $request): UserRegisterResponse
    {
        $this->validateUserRegisterRequest($request);

        $user = new User();
        $user->username = $request->username;
        $user->password = password_hash($request->password, PASSWORD_BCRYPT);

        $this->userRepository->save($user);

        $response = new UserRegisterResponse();
        $response->user = $user;

        return $response;
    }

    private function validateUserRegisterRequest(UserRegisterRequest $request)
    {
        if (
            $request->username == null || $request->password == null || trim($request->username) == "" || trim($request->password) == ""
        ) {
            throw new ValidationException("username, password cannot be null");
        }
    }

    public function login(UserLoginRequest $request): UserLoginResponse
    {
        $this->validationUserLoginRequest($request);

        $user = $this->userRepository->findById($request->username);

        if ($user == null) {
            throw new ValidationException("Id or password is wrong");
        }

        if (password_verify($request->password, $user->password)) {
            $response = new UserLoginResponse();
            $response->user = $user;
            return $response;
        } else {
            throw new ValidationException("Id or password is wrong");
        }
    }

    private function validationUserLoginRequest($request)
    {
        if (
            $request->username == null || $request->password == null ||
            trim($request->username) == "" || trim($request->password) == ""
        ) {
            throw new ValidationException("Id, Password can not blank");
        }
    }
}
