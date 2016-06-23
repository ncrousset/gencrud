<?php

namespace Ncrousset\GenCRUD\Db\Field;


class FieldSchema extends Field
{
    /**
     * @var
     */
    private $schema;

    /**
     * FieldSchema constructor.
     * @param $schema
     */
    public function __construct($schema)
    {
        $this->schema = $schema;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->schema->type;
    }

    /**
     * @return mixed
     */
    public function getField()
    {
        return $this->schema->field;
    }

    /**
     * 
     * @param $field
     * @return void
     */
    public function setField($field)
    {
        $this->schema->field = $field;
    }
}