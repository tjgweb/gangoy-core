<?php

namespace TJG\Gangoy\Commands;

use Phinx\Console\Command\Status;

class MigrationConfigStatusCommand extends Status
{
    protected function configure()
    {
        parent::configure();
        $this->setName('migration:status');
    }
}
