<?php

namespace TJG\Gangoy\Commands;

use Phinx\Console\Command\Rollback;

class MigrationRollbackCommand extends Rollback
{
    protected function configure()
    {
        parent::configure();
        $this->setName('migration:rollback');
    }
}
