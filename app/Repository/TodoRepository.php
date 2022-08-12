<?php

namespace App\Repository;

use App\Entity\Todo;
use PDO;

class TodoRepository
{
    private PDO $db;

    public function __construct(PDO $connection)
    {
        $this->db = $connection;
    }

    public function save(Todo $todo): Todo
    {
        $statement = $this->db->prepare("INSERT INTO todos(title, is_done) VALUES (?,?)");
        $statement->execute([
            $todo->title,
            $todo->isDone
        ]);

        return $todo;
    }

    public function getAllData()
    {
        $sql = "SELECT id, title, is_done FROM todos";

        $statement = $this->db->query($sql);
        $todos = $statement->fetchAll();
        return $todos;
    }

    public function saveReturnLastId(Todo $todo): string
    {
        $statement = $this->db->prepare("INSERT INTO todos(title, is_done) VALUES (?,?)");
        $statement->execute([
            $todo->title,
            $todo->isDone
        ]);
        $lastId = $this->db->lastInsertID();

        return $lastId;
    }

    public function findById(string $id): ?Todo
    {
        $statement = $this->db->prepare("SELECT id, title, is_done FROM todos WHERE id = ?");
        $statement->execute([$id]);
        if ($row = $statement->fetch()) {

            $todo = new Todo();
            $todo->id = $row['id'];
            $todo->title = $row['title'];
            $todo->isDone = $row['is_done'];

            return $todo;
        } else {
            return null;
        }
    }

    public function update(Todo $todo): Todo
    {
        $statement = $this->db->prepare("UPDATE todos SET title = ? WHERE id = ?");
        $statement->execute([$todo->title, $todo->id]);

        return $todo;
    }

    public function deleteById(string $id): void
    {
        $statement = $this->db->prepare("DELETE FROM todos WHERE id = ?");
        $statement->execute([$id]);
    }

    public function deleteAll()
    {
        $this->db->exec("DELETE FROM todos");
    }
}
