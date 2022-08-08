<?php

namespace App\Config;

use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertNotNull;
use function PHPUnit\Framework\assertSame;

class DatabaseTest extends TestCase
{
    public function testGetConnection()
    {
        $connection = Database::getConnection();

        assertNotNull($connection);
    }

    public function testGetConnectionSingleTon()
    {
        $connection1 = Database::getConnection();
        $connection2 = Database::getConnection();

        assertSame($connection1, $connection2);
    }
}
