<?php

namespace App\Controller;

use App\App\View;
use App\Config\Database;
use App\Exception\ValidationException;
use App\Model\BlogCreateRequest;
use App\Repository\BlogRepository;
use App\Service\BlogService;
use Exception;

class BlogController
{

    private BlogService $blogService;

    public function __construct()
    {
        $blogRepository = new BlogRepository(Database::getConnection());
        $this->blogService = new BlogService($blogRepository);
    }

    public function index()
    {
        $blogs = $this->blogService->getAllData();

        View::render("Home/Blog/index", [
            'title' => "My blogs",
            'blogs' => $blogs,
            'counts' => count($blogs)
        ]);
    }

    public function add()
    {
        View::render("Home/Blog/create", [
            "title" => "Create new blog"
        ]);
    }

    public function postCreate()
    {
        $request = new BlogCreateRequest();

        $request->title = $_POST['title'];
        $request->content = $_POST['content'];

        try {
            $this->blogService->create($request);
            View::redirect("/blog");
        } catch (ValidationException | Exception $exception) {
            View::render("Home/Blog/create", [
                "title" => "Create new blog",
                "error" => $exception->getMessage()
            ]);
        }
    }

    public function show($slug)
    {
        View::render("Home/Blog/detail", [
            'title' => "My firs blog in here app - ardiman"
        ]);
    }
}
