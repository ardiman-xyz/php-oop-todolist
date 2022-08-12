<?php

namespace App\Service;

use App\Entity\Todo;
use App\Exception\ValidationException;
use App\Model\TodoCreateRequest;
use App\Model\TodoCreateResponse;
use App\Repository\TodoRepository;
use Exception;

class TodoService
{
    private TodoRepository $todoRepository;

    public function __construct(TodoRepository $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    public function create(TodoCreateRequest $request): TodoCreateResponse
    {
        $this->validateTodoCreateRequest($request);

        $todo = new Todo();
        $todo->title = $request->title;
        $todo->isDone = $request->isDone;

        $this->todoRepository->save($todo);

        $response = new TodoCreateResponse();
        $response->todo = $todo;

        return $response;
    }

    private function validateTodoCreateRequest(TodoCreateRequest $request)
    {
        if (
            $request->title == null || trim($request->title) == ""
        ) {
            throw new ValidationException("Title is required");
        }
    }

    public function remove(string $id): void
    {
        $result = $this->todoRepository->findById($id);

        if ($result === null) {
            throw new ValidationException("Todo not found");
        }

        try {
            $this->todoRepository->deleteById($id);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function getAllData()
    {
        return $this->todoRepository->getAllData();
    }
}
