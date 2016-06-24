<?php

namespace Ncrousset\GenCRUD\Db\Field;

use Ncrousset\GenCRUD\Db\Field\FieldSchemaInterface;

class Field implements FieldSchemaInterface
{

    /**
     * @var bool
     */
    public $nullable = false;

    /**
     * @var bool
     */
    public $primary = false;

    /**
     * @var bool
     */
    public $hidden = true;
    

    /**
     * @return void
     */
    public function nullable()
    {
        $this->nullable = true;
    }

    /**
     * @return void
     */
    public function primary()
    {
        $this->primary = true;
    }

    /**
     * @return void
     */
    public function hidden()
    {
        $this->hidden = true;
    }
}