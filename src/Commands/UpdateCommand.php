<?php

namespace Effy\Configuru\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class UpdateCommand extends Command
{
    public function configure()
    {
        $this->setName('update');
        $this->setDescription('Updates your configuration');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {

    }
}
