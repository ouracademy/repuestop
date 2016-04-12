<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PathTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testConfigPath()
    {
        $this->assertEquals('/home/ubuntu/workspace/config',config_path());
    }
     public function testAppPath()
    {
        $this->assertEquals('/home/ubuntu/workspace/config',config_path());
    }
     public function testStoragePath()
    {
        $this->assertEquals('/home/ubuntu/workspace/config/mappings', config_path('mappings'));
    }
}
