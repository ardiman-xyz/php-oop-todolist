<?php

namespace App\Repository;

use App\Config\Database;
use App\Entity\Session;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;

class SessionRepositoryTest extends TestCase
{
    private SessionRepository $sessionRepository;

    protected function setUp(): void
    {
        $connection = Database::getConnection();
        $this->sessionRepository = new SessionRepository($connection);

        $this->sessionRepository->deleteAll();
    }

    public function testSaveSuccess()
    {
        $session = new Session();
        $session->userId = "ardiman";

        $response = $this->sessionRepository->save($session);

        assertEquals($session->userId, $response->userId);
    }
}
