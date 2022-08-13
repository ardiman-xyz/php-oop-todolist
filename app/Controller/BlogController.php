<?php

namespace App\Controller;

use App\App\View;

class BlogController
{
    public function index()
    {
        View::render("Home/Blog/index", [
            'title' => "Blog"
        ]);
    }
}
