<?php

namespace App\Controller;

use App\App\View;
use App\Config\Database;
use App\Exception\ValidationException;
use App\Model\TodoCreateRequest;
use App\Repository\TodoRepository;
use App\Service\TodoService;
use Exception;

class TodoController
{
    private TodoService $todoService;

    public function __construct()
    {
        $todoRepository = new TodoRepository(Database::getConnection());
        $this->todoService = new TodoService($todoRepository);
    }

    public function store()
    {
        $request = new TodoCreateRequest();
        $request->title = $_POST['title'];
        $request->isDone = 0;

        try {
            $this->todoService->create($request);
            View::redirect('/', [
                'title' => 'Home - Todo',
            ]);
        } catch (ValidationException $validation) {
            View::render('Home/index', [
                'title' => 'Home - Todo',
                'error' => $validation->getMessage()
            ]);
        }
    }

    public function delete(string $id): void
    {
        try {
            $this->todoService->remove($id);
            View::redirect('/', [
                'title' => 'Home - Todo',
            ]);
        } catch (ValidationException | Exception $validation) {
            View::render('Home/index', [
                'title' => 'Home - Todo',
                'error' => $validation->getMessage()
            ]);
        }
    }
}
