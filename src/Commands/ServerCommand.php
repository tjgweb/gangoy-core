<?php

namespace TJG\Gangoy\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ServerCommand extends Command
{
    protected function configure()
    {
        $this->setName('server')
            ->setDescription('Run a built-in PHP Server in http://localhost:8080');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Run server in http://localhost:8080');
        exec('php -S localhost:8080 -t' . getcwd() . DIRECTORY_SEPARATOR . 'public');
    }
}
