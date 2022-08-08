<?php

namespace App\Repository;

use App\Config\Database;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertNull;

class UserRepositoryTest extends TestCase
{

    private UserRepository $userRepository;

    protected function setUp(): void
    {
        $this->userRepository = new UserRepository(Database::getConnection());

        $this->userRepository->deleteAll();
    }

    public function testSaveSuccess()
    {
        $user = new User();
        $user->username = "ardiman";
        $user->password = "ardiman123_";

        $this->userRepository->save($user);

        $result = $this->userRepository->findById($user->username);

        assertEquals($user->username, $result->username);
    }

    public function testFindByIdNotFound()
    {
        $result = $this->userRepository->findById("sdrfsd");

        assertNull($result);
    }
}
