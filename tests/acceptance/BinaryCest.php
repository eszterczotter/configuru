<?php

class BinaryCest
{
    function runConfiguru(AcceptanceTester $I)
    {
        $I->runShellCommand('bin/configuru');
        $I->seeInShellOutput("Configuru");
    }

    function thereIsAnUpdateCommand(AcceptanceTester $I)
    {
        $I->runShellCommand('bin/configuru');
        $I->seeInShellOutput('update  Updates your configuration');
    }

    function theUpdateCommandHasHelp(AcceptanceTester $I)
    {
        $I->runShellCommand('bin/configuru update --help');
        $I->seeInShellOutput('Run this command to rebuild your configuration from .guru files.');
    }
}
