<?php
/**
 * Created by PhpStorm.
 * User: rudys
 * Date: 21/06/16
 * Time: 04:23 PM
 */

namespace Ncrousset\GenCRUD\Generate;

abstract class Generate
{
    protected $path = 'App/Maintenance/';

    /**
     *
     * @return bool
     */
    public function isExists()
    {
        return file_exists($this->path);
    }
    
    public function createFile($name)
    {
        $this->validateNameFile();
    }

    private function validateNameFile()
    {
        if(is_dir($this->path)) {
            if($dir = opendir($this->path)) {
                while(($file = readdir($dir)) !== false) {
                    echo "filename: $file ". filetype($this->path.$file) . "\n";
                }

                closedir($dir);
            }
        }
    }
}