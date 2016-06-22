<?php
/**
 * Created by PhpStorm.
 * User: rudys
 * Date: 22/06/16
 * Time: 10:06 AM
 */

namespace Ncrousset\GenCRUD\Generate;

use Ncrousset\GenCRUD\Generate\Generate;

class File extends Generate
{
    /**
     * @param $name
     * @return bool
     */
    public function isExists($name)
    {
        $this->path = $this->path . $name . '.php';
        return parent::isExists();
    }

    /**
     *  Create de new file .php
     *
     * @param $name
     */
    public function create($name)
    {
        $fileName = $name . '.php';
        return touch($this->path . $fileName);
    }

}