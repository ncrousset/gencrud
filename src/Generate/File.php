<?php
/**
 * Created by PhpStorm.
 * User: rudys
 * Date: 22/06/16
 * Time: 10:06 AM
 */

namespace Ncrousset\GenCRUD\Generate;

use Ncrousset\GenCRUD\Generate\Generate;
use Ncrousset\GenCRUD\Generate\WriteClass;

class File extends Generate
{

    use WriteClass;
    
    /**
     * @var string
     */
    private $fileName = "";

    /**
     * @param $name
     * @return bool
     */
    public function isExists($name)
    {
        $this->path = $this->path . $name . '.php';
        return parent::isExists();
    }

    public function generate($nameClass, $table)
    {
        if($this->create($nameClass)) {
            $this->createClass($nameClass, $table);
        }

        return true;
    }

    /**
     *  Create de new file .php
     *
     * @param $name
     */
    private function create($name)
    {
        $this->fileName = $this->path . $name . '.php';
        return touch($this->fileName);
    }

    private function createClass($nameClass, $table)
    {
        if(file_exists($this->fileName)) {
            $file = fopen($this->fileName, "a");
            $this->initPhpFile($file);
            $this->initClass($file, $nameClass);

            if($table !== null) {
                $this->addAtribute($file, '$table', $table);
            }

            $this->addMethod($file, 'index');
            $this->addMethod($file, 'show');
            $this->addMethod($file, 'edit');
            $this->addMethod($file, 'create');

            fclose($file);
        }
    }


}