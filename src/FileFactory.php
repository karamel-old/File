<?php
namespace Karamel\File ;
use Karamel\File\Exceptions\InvalidTypeDriverException;

class FileFactory {
    public static function build($type , $path , $data , $mod)
    {
        switch ($type){
            case 'file': return new \Karamel\File\Drivers\File($path , $data , $mod) ;
                break ;
            default :
                throw new InvalidTypeDriverException() ;

        }
    }
}