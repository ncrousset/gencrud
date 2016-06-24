<?php

namespace Ncrousset\GenCRUD\Db\Field;

class FieldText
{
    /**
     * @var string
     */
    public $type = 'text';

    /**
     * @var string
     */
    public $field;

    /**
     * Field text constructor.
     *
     * @param string $field
     */
    public function __construct($field = "")
    {
        $this->field = $field;
    }
}