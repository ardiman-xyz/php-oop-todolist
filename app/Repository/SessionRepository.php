<?php

namespace App\Repository;

use App\Entity\Session;
use PDO;

class SessionRepository
{
    private PDO $db;

    public function __construct(PDO $connection)
    {
        $this->db = $connection;
    }

    public function save(Session $session): Session
    {
        $statement = $this->db->prepare("INSERT INTO sessions(userId) VALUES (?)");
        $statement->execute([$session->userId]);

        return $session;
    }

    public function deleteAll(): void
    {
        $this->db->exec("DELETE FROM sessions");
    }
}
