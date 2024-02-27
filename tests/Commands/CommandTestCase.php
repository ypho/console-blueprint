<?php

namespace Ypho\ConsoleBlueprint\Commands;

use Illuminate\Console\Application;
use Illuminate\Events\Dispatcher;
use PHPUnit\Framework\TestCase;
use Ypho\ConsoleBlueprint\Container;

class CommandTestCase extends TestCase
{
    protected Application $artisan;

    protected function setUp(): void
    {
        parent::setUp();

        $container = new Container();
        $events = new Dispatcher($container);
        $this->artisan = new Application($container, $events, 'v1');
    }
}