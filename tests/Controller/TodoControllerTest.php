<?php

namespace App\Controller;

use App\Config\Database;
use App\Repository\TodoRepository;
use App\Service\TodoService;
use PHPUnit\Framework\TestCase;

class TodoControllerTest extends TestCase
{
    private TodoService $todoService;

    protected function __construct()
    {
        $todoRepository = new TodoRepository(Database::getConnection());
        $this->todoService = new TodoService($todoRepository);
    }

    // public function testUpdateSuccess()
    // {
    //     $_POST['id']
    // }
}
