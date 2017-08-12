<?php

namespace TJG\Gangoy\Commands;

use Phinx\Console\Command\Test;

class MigrationTestCommand extends Test
{
    protected function configure()
    {
        parent::configure();
        $this->setName('migration:test');
    }
}
