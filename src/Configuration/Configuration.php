<?php

namespace Configuru\Configuration;

interface Configuration
{
    public function getReplacements() : array;

    public function getExtension() : string;
}