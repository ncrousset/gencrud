<?php

namespace Ncrousset\GenCRUD\Db\Field;

class FieldInt
{
    /**
     * @var string
     */
    public $type = 'int';

    /**
     * @var string
     */
    public $field;

    /**
     * FieldInt constructor.
     *
     * @param string $field
     */
    public function __construct($field = "id")
    {
        $this->field = $field;
    }

}