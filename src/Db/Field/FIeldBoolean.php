<?php

namespace Ncrousset\GenCRUD\Db\Field;

class FIeldBoolean
{
    /**
     * @var string
     */
    public $type = 'boolean';

    /**
     * @var string
     */
    public $field;

    /**
     * Field bool constructor.
     *
     * @param string $field
     */
    public function __construct($field = "")
    {
        $this->field = $field;
    }
}