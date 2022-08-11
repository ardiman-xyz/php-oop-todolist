<?php

namespace App\Controller;

use App\App\View;

class HomeController
{

    public function index(): void
    {
        View::render('Home/index', [
            'title' => 'Home - Todo'
        ]);
    }
}
