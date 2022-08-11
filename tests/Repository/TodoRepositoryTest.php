<?php

namespace App\Repository;

use App\Config\Database;
use App\Entity\Todo;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertNull;

class TodoRepositoryTest extends TestCase
{
    private TodoRepository $todoRepository;

    protected function setUp(): void
    {
        $this->todoRepository = new TodoRepository(Database::getConnection());

        $this->todoRepository->deleteAll();
    }

    public function testSaveSuccess()
    {
        $todo = new Todo();
        $todo->title = "Build awesome website";
        $todo->isDone = 0;

        $result = $this->todoRepository->save($todo);

        assertEquals($result->title, $todo->title);
        assertEquals($result->isDone, $todo->isDone);
    }

    public function testFindById()
    {
        $todo = new Todo();
        $todo->title = "Build awesome website 3";
        $todo->isDone = 0;

        $insertId = $this->todoRepository->saveReturnLastId($todo);

        $result = $this->todoRepository->findById($insertId);

        assertEquals($insertId, $result->id);
        assertEquals($todo->title, $result->title);
        assertEquals($todo->isDone, $result->isDone);
    }

    public function testDeleteByIdSuccess()
    {
        $todo = new Todo();
        $todo->title = "Build awesome website 4";
        $todo->isDone = 0;

        $insertId = $this->todoRepository->saveReturnLastId($todo);

        $result = $this->todoRepository->findById($insertId);

        assertEquals($insertId, $result->id);
        assertEquals($todo->title, $result->title);
        assertEquals($todo->isDone, $result->isDone);

        $result = $this->todoRepository->deleteById($insertId);

        assertNull($result);
    }

    public function testDeleteByIdNotFound()
    {
        $result = $this->todoRepository->findById("notfound");

        assertNull($result);
    }
}
