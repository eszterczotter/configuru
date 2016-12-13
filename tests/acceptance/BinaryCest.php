<?php

class BinaryCest
{
    function runConfiguru(AcceptanceTester $I)
    {
        $I->runShellCommand('bin/configuru');
        $I->seeInShellOutput("Configuru");
    }
}
