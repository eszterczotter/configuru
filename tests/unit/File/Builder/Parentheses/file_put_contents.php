<?php

namespace Configuru\File\Builder\Parentheses;

class FilePutContents extends \Exception
{
}

function file_put_contents($path, $content)
{
    throw new FilePutContents("$content written to $path");
}

