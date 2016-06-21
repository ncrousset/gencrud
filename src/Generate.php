<?php
/**
 * Created by PhpStorm.
 * User: rudys
 * Date: 21/06/16
 * Time: 04:23 PM
 */

namespace Ncrousset\GenCRUD;

class Generate
{
    protected $path = 'App/Maintenance';

    public function __construct()
    {

    }

    /**
     *
     * @return bool
     */
    public function isExists()
    {
        return file_exists($this->path);
    }

    /**
     * @return void
     */
    public function createDirectory()
    {
        mkdir("App/Maintenance", 0700);
    }
}