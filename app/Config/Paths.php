<?php

namespace Config;

class Paths
{
    // System folder — one level up from app
    public string $systemDirectory = __DIR__ . '/../../system';

    // App directory (not needed, but correct)
    public string $appDirectory = __DIR__ . '/..';

    // Writable folder
    public string $writableDirectory = __DIR__ . '/../../writable';

    // Tests folder
    public string $testsDirectory = __DIR__ . '/../../tests';

    // Views folder
    public string $viewDirectory = __DIR__ . '/../Views';
}