<?php

namespace Ypho\Console\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Tester\CommandTester;

class HeartbeatTest extends CommandTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan->resolve(Heartbeat::class);
    }

    public function test_if_heartbeat_command_works()
    {
        $command = $this->artisan->find('heartbeat');

        $tester = new CommandTester($command);
        $tester->execute([]);

        $output = trim($tester->getDisplay());

        $this->assertEquals(Command::SUCCESS, $tester->getStatusCode());
        $this->assertEquals('This command ain\'t much, but it\'s honest work!', $output);
    }
}
