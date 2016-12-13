<?php

class UpdateCest
{
    function updateConfiguration(AcceptanceTester $I)
    {
        $I->runShellCommand("bin/configuru update");
    }
}
