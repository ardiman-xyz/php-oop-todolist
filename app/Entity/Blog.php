<?php

namespace App\Entity;

class Blog
{
    public string $id;
    public string $userId;
    public string $title;
    public string $slug;
    public string $content;
    public string $status;
    public string $created_at;
    public ?string $updated_at = null;
}
