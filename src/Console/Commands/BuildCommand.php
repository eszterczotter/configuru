<?php

namespace Configuru\Console\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class BuildCommand extends Command
{
    public function configure()
    {
        $this->setName('build');
        $this->setDescription('Build your configuration');
        $this->setHelp('Run this command to (re)build your configuration from the .guru files.');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {

    }
}
