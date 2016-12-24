<?php

namespace Configuru\File\Builder\Native;

class FilePutContents extends \Exception
{
}

function file_put_contents($path, $content)
{
    throw new FilePutContents("$content written to $path");
}

