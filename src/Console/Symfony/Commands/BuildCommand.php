<?php

namespace Configuru\Console\Symfony\Commands;

use Configuru\Commands\Commander;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class BuildCommand extends Command
{
    /**
     * @var Commander
     */
    private $commander;

    public function __construct(Commander $commander)
    {
        $this->commander = $commander;
        parent::__construct();
    }

    public function configure()
    {
        $this->setName('build');
        $this->setDescription('Build your configuration');
        $this->setHelp('Run this command to (re)build your configuration from the .guru files.');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->commander->execute(new \Configuru\Commands\Build\Command());
        $output->writeln("Configuru build successful.");
    }
}
