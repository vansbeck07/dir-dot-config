<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Vansbeck07\Arr;
use Vansbeck07\Config;

class EnvTest extends TestCase
{
    public function testExample(): void
    {
        $configArray = (new Config(__DIR__.'/../config/'))->get();

        $this->assertEquals('production', Arr::multiKeyGet('app.app_env', $configArray));
        $this->assertEquals('test', Arr::multiKeyGet('database.default.dbname', $configArray));

        $updated = Arr::multiKeySet('app.app_env', 'development', $configArray);
        $this->assertEquals('development', Arr::multiKeyGet('app.app_env', $updated));
    }
}
