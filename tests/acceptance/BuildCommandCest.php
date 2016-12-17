<?php

class BuildCommandCest
{
    function updateConfiguration(AcceptanceTester $I)
    {
        $I->runShellCommand("bin/configuru build");
    }
}
