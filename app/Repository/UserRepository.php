<?php

namespace App\Repository;

use App\Entity\User;
use PDO;


class UserRepository
{
    private PDO $db;

    public function __construct(PDO $connection)
    {
        $this->db = $connection;
    }

    public function save(User $user): User
    {
        $statement = $this->db->prepare("INSERT INTO users(username, password) VALUES (?, ?)");
        $statement->execute([
            $user->username, $user->password
        ]);

        return $user;
    }

    public function remove(string $id): void
    {
        $statement = $this->db->prepare("DELETE FROM users WHERE id = ?");
        $statement->execute([$id]);
    }

    public function findById(string $username): ?User
    {
        $statement = $this->db->prepare("SELECT id, username, password FROM users WHERE username = ?");
        $statement->execute([$username]);
        $row = $statement->fetch();

        try {
            if ($row) {
                $user = new User();
                $user->id = $row['id'];
                $user->username = $row['username'];
                $user->password = $row['password'];

                return $user;
            } else {
                return null;
            }
        } finally {
            $statement->closeCursor();
        }
    }

    public function deleteAll(): void
    {
        $this->db->exec("DELETE FROM users");
    }
}
