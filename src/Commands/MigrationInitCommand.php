<?php

namespace TJG\Gangoy\Commands;

use Phinx\Console\Command\Init;

class MigrationInitCommand extends Init
{
    protected function configure()
    {
        parent::configure();
        $this->setName('migration:init');
    }
}
