<?php

namespace App\Service;

use App\Config\Database;
use App\Entity\Todo;
use App\Exception\ValidationException;
use App\Model\TodoCreateRequest;
use App\Model\TodoUpdateRequest;
use App\Repository\TodoRepository;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertNull;
use function PHPUnit\Framework\assertSame;

class TodoServiceTest extends TestCase
{
    private TodoService $todoService;
    private TodoRepository $todoRepository;

    protected function setUp(): void
    {
        $this->todoRepository = new TodoRepository(Database::getConnection());
        $this->todoService = new TodoService($this->todoRepository);

        $this->todoRepository->deleteAll();
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

    public function testGetDataById()
    {
        $todo = new Todo();
        $todo->title = "my todo";
        $todo->isDone = 0;

        $idInsert = $this->todoRepository->saveReturnLastId($todo);

        $result = $this->todoService->getDataById($idInsert);

        assertSame($idInsert, $result->id);
        assertSame($todo->title, $result->title);
        assertSame($todo->isDone, $result->isDone);
    }

    public function testGetDataByIdNotFound()
    {
        $this->expectException(ValidationException::class);
        $this->todoService->getDataById("sdfasdf");
    }

    public function testRemoveIdNotFound()
    {
        $this->expectException(ValidationException::class);
        $this->todoService->remove("idNotFound");
    }

    public function testUpdateSuccess()
    {
        $todo = new Todo();
        $todo->title = "new todo";
        $todo->isDone = 0;

        $idInsert = $this->todoRepository->saveReturnLastId($todo);

        $request = new TodoUpdateRequest();
        $request->id = $idInsert;
        $request->title = "new update title todo";

        $result = $this->todoService->updateData($request);

        assertEquals($request->title, $result->todo->title);
        assertEquals($idInsert, $result->todo->id);
    }

    public function testUpdateValidationError()
    {
        $this->expectException(ValidationException::class);
        $request = new TodoUpdateRequest();
        $request->id = "";
        $request->title = "";

        $this->todoService->updateData($request);
    }

    public function testUpdateDataNotFound()
    {
        $this->expectException(ValidationException::class);
        $request = new TodoUpdateRequest();
        $request->id = "asd";
        $request->title = "safsadf";

        $this->todoService->updateData($request);
    }
}
