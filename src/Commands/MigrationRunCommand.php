<?php

namespace TJG\Gangoy\Commands;

use Phinx\Console\Command\Migrate;

class MigrationRunCommand extends Migrate
{
    protected function configure()
    {
        parent::configure();
        $this->setName('migration:run');
    }
}
