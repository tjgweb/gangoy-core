<?php

namespace TJG\Gangoy\Commands;

use Phinx\Console\Command\SeedRun;

class SeedCommand extends SeedRun
{
    protected function configure()
    {
        parent::configure();
        $this->setName('seed:run');
    }
}
