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
}
