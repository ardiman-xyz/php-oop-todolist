<?php

namespace App\Controller;

use App\App\View;
use App\Config\Database;
use App\Repository\TodoRepository;
use App\Service\TodoService;

class HomeController
{
    private TodoService $todoService;

    public function __construct()
    {
        $todoRepository = new TodoRepository(Database::getConnection());
        $this->todoService = new TodoService($todoRepository);
    }

    public function index(): void
    {
        $todos = $this->todoService->getAllData();

        View::render('Home/index', [
            'title' => 'Home - Todo',
            'todos' => $todos
        ]);
    }
}
