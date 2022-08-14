<?php

namespace App\Repository;

use App\Entity\Blog;
use PDO;

class BlogRepository
{
    private PDO $db;

    public function __construct(PDO $connection)
    {
        $this->db = $connection;
    }

    public function save(Blog $blog): Blog
    {
        $statement = $this->db->prepare("INSERT INTO blogs(userId, title, slug, content, status, created_at) VALUES (?,?,?,?,?,?)");
        $statement->execute([
            $blog->userId,
            $blog->title,
            $blog->slug,
            $blog->content,
            $blog->status,
            $blog->created_at
        ]);

        return $blog;
    }

    public function deleteAll()
    {
        $this->db->exec("DELETE FROM blogs");
    }
}
