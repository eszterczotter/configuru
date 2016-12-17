<?php

class ConfiguruCest
{
    function runConfiguru(AcceptanceTester $I)
    {
        $I->runShellCommand('bin/configuru');
        $I->seeInShellOutput("Configuru");
    }
}
