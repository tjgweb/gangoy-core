<?php

namespace TJG\Gangoy\Commands;

use Phinx\Console\Command\SeedCreate;

class SeedCreateCommand extends SeedCreate
{
    protected function configure()
    {
        parent::configure();
        $this->setName('seed:create');
    }
}
