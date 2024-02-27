<?php

namespace Ypho\ConsoleBlueprint\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Command\Command as SymfonyCommand;

class Heartbeat extends Command
{
    protected $name = 'heartbeat';
    protected $description = 'Checks if the console application is working';

    public function handle(): int
    {
        $this->info('This command ain\'t much, but it\'s honest work!');

        return SymfonyCommand::SUCCESS;
    }
}