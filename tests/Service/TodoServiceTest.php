<?php

namespace App\Service;

use App\Config\Database;
use App\Entity\Todo;
use App\Exception\ValidationException;
use App\Model\TodoCreateRequest;
use App\Repository\TodoRepository;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertNull;

class TodoServiceTest extends TestCase
{
    private TodoService $todoService;
    private TodoRepository $todoRepository;

    protected function setUp(): void
    {
        $this->todoRepository = new TodoRepository(Database::getConnection());
        $this->todoService = new TodoService($this->todoRepository);
    }

    public function testCreateSuccess()
    {
        $request = new TodoCreateRequest();
        $request->title = "my second todo";
        $request->isDone = 0;

        $response = $this->todoService->create($request);

        assertEquals($request->title, $response->todo->title);
        assertEquals($request->isDone, $response->todo->isDone);
    }

    public function testCreateFailed()
    {
        $this->expectException(ValidationException::class);

        $request = new TodoCreateRequest();
        $request->title = "";

        $this->todoService->create($request);
    }

    public function testRemoveSuccess()
    {
        $todo = new Todo();
        $todo->title = "Build awesome website 4";
        $todo->isDone = 0;

        $insertId = $this->todoRepository->saveReturnLastId($todo);

        $result = $this->todoService->remove($insertId);

        assertNull($result);
    }

    public function testRemoveIdNotFound()
    {
        $this->expectException(ValidationException::class);
        $this->todoService->remove("idNotFound");
    }
}
