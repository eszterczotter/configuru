<?php

namespace Configuru\Converter;

interface Converter
{
    public function convert(string $content) : string;
}