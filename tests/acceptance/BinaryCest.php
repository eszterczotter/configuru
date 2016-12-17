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
        $I->seeInShellOutput('build  Build your configuration');
    }

    function theUpdateCommandHasHelp(AcceptanceTester $I)
    {
        $I->runShellCommand('bin/configuru build --help');
        $I->seeInShellOutput('Run this command to (re)build your configuration from the .guru files.');
    }
}
