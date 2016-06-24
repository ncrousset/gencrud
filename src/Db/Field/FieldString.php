<?php

namespace Ncrousset\GenCRUD\Db\Field;

class FieldString
{
    /**
     * @var string
     */
    public $type = 'string';

    /**
     * @var string
     */
    public $field;

    /**
     * FieldString constructor.
     *
     * @param string $field
     */
    public function __construct($field = "")
    {
        $this->field = $field;
    }
}