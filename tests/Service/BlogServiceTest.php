<?php

namespace App\Service;

use App\Config\Database;
use App\Exception\ValidationException;
use App\Model\BlogCreateRequest;
use App\Repository\BlogRepository;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;

class BlogServiceTest extends TestCase
{
    private BlogService $blogService;
    private BlogRepository $blogRepository;

    protected function setUp(): void
    {
        $this->blogRepository = new BlogRepository(Database::getConnection());
        $this->blogService = new BlogService($this->blogRepository);

        $this->blogRepository->deleteAll();
    }

    public function testCreateSuccess()
    {
        $request = new BlogCreateRequest();
        $request->title = "first blog";
        $request->content = "first content blog";

        $result = $this->blogService->create($request);

        assertEquals($request->title, $result->blog->title);
        assertEquals($request->content, $result->blog->content);
    }

    public function testCreateFailed()
    {
        $this->expectException(ValidationException::class);

        $request = new BlogCreateRequest();
        $request->title = "";
        $request->content = "";
        $request->status = 1;

        $this->blogService->create($request);
    }
}
