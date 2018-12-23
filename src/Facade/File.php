<?php

namespace Karamel\File\Facade;

use Karamel\File\FileFactory;

class File
{

    public static function write($path, $data, $mod)
    {
        FileFactory::build('file', $path, $data, $mod)->write();
    }

    public static function read($path, $data, $mod)
    {
        return FileFactory::build('file', $path, $data, $mod)->read();

    }


}