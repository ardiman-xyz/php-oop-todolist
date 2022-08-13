<?php

namespace App\Model;

class TodoUpdateStatusRequest
{
    public ?string $id = null;
    public ?string $isDone = null;
}
