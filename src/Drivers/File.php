<?php
namespace Karamel\File\Drivers ;
use karamel\File\Exceptions\EmptyDataException;
use Karamel\File\Exceptions\InvalidFilePathException;
use Karamel\File\Exceptions\TargteFileIsDirectoryException;
use Karamel\File\Interfaces\IFile;

class File implements IFile{

    private  $path ;
    private $data ;
    private $mod ;

    public function __construct($path , $data , $mod)
    {
        $this->data = $data ;
        $this->path = $path ;
        $this->mod = $mod ;

    }


    public function validateData()
    {
        if (empty($this->data))
            throw new EmptyDataException() ;
    }

    public function write()
    {
        $this->validateData() ;

        if (!file_exists($this->path))
            throw new InvalidFilePathException() ;

        $file = fopen($this->path , $this->mod) ;
        fwrite($file , $this->data) ;
        fclose($file) ;

    }

    public function read()
    {
        $this->validateData() ;

        if (!file_exists($this->path))
            throw new InvalidFilePathException() ;

        if (is_dir($this->path))
            throw  new TargteFileIsDirectoryException() ;

        $file  = file_get_contents($this->path ) ;
        return $file;

    }
}

