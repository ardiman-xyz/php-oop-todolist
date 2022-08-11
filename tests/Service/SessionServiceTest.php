<?php

namespace App\Service;

use App\Config\Database;
use App\Entity\Session;
use App\Repository\SessionRepository;
use PHPUnit\Framework\TestCase;

class SessionServiceTest extends TestCase
{
    private SessionService $sessionService;

    protected function setUp(): void
    {
        $sessionRepository = new SessionRepository(Database::getConnection());
        $this->sessionService = new SessionService($sessionRepository);

        $sessionRepository->deleteAll();
    }

    public function testCreate()
    {
        $session = $this->sessionService->create("ardiman");

        $this->expectOutputRegex("[TODO_OOP: $session->userId]");
    }
}
