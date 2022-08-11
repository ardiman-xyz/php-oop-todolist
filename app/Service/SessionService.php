<?php

namespace App\Service;

use App\Config\Database;
use App\Entity\Session;
use App\Repository\SessionRepository;

class SessionService
{
    private SessionRepository $sessionRepository;
    public static string $COOKIE_NAME = "TODO_OOP";

    public function __construct(SessionRepository $sessionRepository)
    {
        $this->sessionRepository = new SessionRepository(Database::getConnection());
    }

    public function create(string $userId): Session
    {
        $session = new Session();
        $session->userId = $userId;

        $this->sessionRepository->save($session);
        setcookie(self::$COOKIE_NAME, $session->userId, time() + (60 * 60 * 24 * 30), '/');

        return $session;
    }
}
