<?php

namespace App\Service;

use App\Entity\Todo;
use App\Exception\ValidationException;
use App\Helper\ValidationUtil;
use App\Model\TodoCreateRequest;
use App\Model\TodoCreateResponse;
use App\Model\TodoUpdateRequest;
use App\Model\TodoUpdateResponse;
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
        ValidationUtil::validationReflection($request);

        $todo = new Todo();
        $todo->title = $request->title;
        $todo->isDone = $request->isDone;

        $this->todoRepository->save($todo);

        $response = new TodoCreateResponse();
        $response->todo = $todo;

        return $response;
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

    public function getDataById(string $id): ?Todo
    {
        $result = $this->todoRepository->findById($id);

        if ($result === null) return throw new ValidationException("Todo not found");

        return $result;
    }

    public function updateData(TodoUpdateRequest $request): TodoUpdateResponse
    {
        ValidationUtil::validationReflection($request);

        try {
            $todo = $this->todoRepository->findById($request->id);

            if ($todo === null) return throw new ValidationException("Todo not found!");

            $todo->title = $request->title;
            $this->todoRepository->update($todo);

            $response = new TodoUpdateResponse();
            $response->todo = $todo;
            return $response;
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function getAllData()
    {
        return $this->todoRepository->getAllData();
    }
}
