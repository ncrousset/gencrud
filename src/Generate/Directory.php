<?php
/**
 * Created by PhpStorm.
 * User: rudys
 * Date: 22/06/16
 * Time: 09:42 AM
 */

namespace Ncrousset\GenCRUD\Generate;

use Ncrousset\GenCRUD\Generate\Generate;

class Directory extends Generate
{

    /**
     * @return bool
     */
    public function isExists()
    {
        return parent::isExists();
    }

    /**
     * @return void
     */
    public function createDirectory()
    {
        mkdir("App/Maintenance", 0700);
    }
}