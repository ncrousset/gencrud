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
    
    
}