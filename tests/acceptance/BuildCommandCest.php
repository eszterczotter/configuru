<?php

class BuildCommandCest
{
    function thereIsABuildCommand(AcceptanceTester $I)
    {
        $I->runShellCommand('bin/configuru');
        $I->seeInShellOutput('build  Build your configuration');
    }

    function hasHelp(AcceptanceTester $I)
    {
        $I->runShellCommand('bin/configuru build --help');
        $I->seeInShellOutput('Run this command to (re)build your configuration from the .guru files.');
    }

    function buildConfiguru(AcceptanceTester $I)
    {
        $I->copyDir(__DIR__ . '/../_dummy', __DIR__ . '/../../');
        $I->runShellCommand("bin/configuru build example");
        $I->openFile(__DIR__ . '/../../example/config.yml');
        $I->seeInThisFile('correct value');
    }
}
