<?php

namespace Ncrousset\GenCRUD\Db\Field;

use Ncrousset\GenCRUD\Db\Field\FieldSchemaInterface;

class Field implements FieldSchemaInterface
{

    /**
     * @var string
     */
    public $field = "";

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
     * Set the value name column
     *
     * @param $field
     * @return void
     */
    public function field($field)
    {
        $this->field = $field;
    }

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