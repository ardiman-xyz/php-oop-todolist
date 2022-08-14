<?php

namespace App\Repository;

use App\Config\Database;
use App\Entity\Blog;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;

class BlogRepositoryTest extends TestCase
{
    private BlogRepository $blogRepository;

    protected function setUp(): void
    {
        $this->blogRepository = new BlogRepository(Database::getConnection());
    }

    public function testSave()
    {
        $blog = new Blog();
        $blog->userId = 1;
        $blog->title = "first blog";
        $blog->slug = "first-blog";
        $blog->content = "first content";
        $blog->status = 1;
        $blog->created_at = time();

        $response = $this->blogRepository->save($blog);

        assertEquals($blog->userId, $response->userId);
        assertEquals($blog->title, $response->title);
        assertEquals($blog->slug, $response->slug);
        assertEquals($blog->content, $response->content);
        assertEquals($blog->status, $response->status);
        assertEquals($blog->created_at, $response->created_at);
    }
}
