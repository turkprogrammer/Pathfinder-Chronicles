<?php

namespace App\Adapter;

use Predis\Client;

class RedisAdapter
{
    private Client $redis;

    public function __construct()
    {
        // Подключение к Redis или инициализация объекта Predis\Client
        $this->redis = new Client($_ENV['REDIS_URL']);
    }

    public function set($key, $value)
    {
        // Установка значения по ключу в Redis
        $this->redis->set($key, $value);
    }

    public function get($key)
    {
        // Получение значения из Redis по ключу
        return $this->redis->get($key);
    }

    public function delete($key)
    {
        // Удаление значения из Redis по ключу
        $this->redis->del([$key]);
    }
}
