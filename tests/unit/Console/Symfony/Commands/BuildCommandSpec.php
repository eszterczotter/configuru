<?php

namespace unit\Configuru\Console\Symfony\Commands;

use Configuru\Commands\Commander;
use Configuru\Console\Symfony\Commands\BuildCommand;
use PhpSpec\ObjectBehavior;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class BuildCommandSpec extends ObjectBehavior
{
    function let(Commander $commander)
    {
        $this->beConstructedWith($commander);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(BuildCommand::class);
    }

    function it_is_a_command()
    {
        $this->shouldHaveType(Command::class);
    }

    function it_has_a_name()
    {
        $this->getName()->shouldReturn('build');
    }

    function it_has_a_description()
    {
        $this->getDescription()->shouldReturn('Build your configuration');
    }

    function it_has_a_help()
    {
        $this->getHelp()->shouldReturn('Run this command to (re)build your configuration from the .guru files.');
    }

    function it_executes(InputInterface $input, OutputInterface $output)
    {
        $this->execute($input, $output);

        $output->writeln("Configuru build successful.")->shouldHaveBeenCalled();
    }
}
