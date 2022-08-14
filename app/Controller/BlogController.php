<?php

namespace App\Controller;

use App\App\View;

class BlogController
{
    public function index()
    {
        View::render("Home/Blog/index", [
            'title' => "My blogs"
        ]);
    }

    public function show($slug)
    {
        View::render("Home/Blog/detail", [
            'title' => "My firs blog in here app - ardiman"
        ]);
    }
}
