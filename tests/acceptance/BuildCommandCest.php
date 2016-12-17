<?php

class BuildCommandCest
{
    function buildConfiguru(AcceptanceTester $I)
    {
        $I->copyDir(__DIR__ . '/../_dummy', __DIR__ . '/../../');
        $I->runShellCommand("bin/configuru build");
        $I->openFile(__DIR__ . '/../../example/config.yml');
        //$I->seeInThisFile('correct value');
    }
}
