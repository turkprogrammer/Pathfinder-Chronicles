<?php

namespace App\Tests\Adapter;

use App\Adapter\RedisAdapter;
use PHPUnit\Framework\TestCase;

class RedisAdapterTest extends TestCase
{
    private RedisAdapter $redisAdapter;

    protected function setUp(): void
    {
        // Initialize the RedisAdapter instance
        $this->redisAdapter = new RedisAdapter();
    }

    public function testSetAndGet()
    {
        // Test the set() method
        $this->redisAdapter->set('key', 'value');

        // Test the get() method
        $result = $this->redisAdapter->get('key');

        // Assert that the value retrieved from Redis matches the expected value
        $this->assertEquals('value', $result);
    }

    public function testDelete()
    {
        // Test the delete() method
        $this->redisAdapter->set('key', 'value');
        $this->redisAdapter->delete('key');

        // Test that the value is successfully deleted
        $result = $this->redisAdapter->get('key');

        // Assert that the value is null after deletion
        $this->assertNull($result);
    }
}
