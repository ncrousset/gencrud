<?php

namespace Ncrousset\GenCRUD\Db\Field;

interface FieldSchemaInterface
{

    /**
     * Name of column
     *
     * @param $field
     * @return mixed
     */
    public function field($field);

    /**
     * if is null the column, value for default is false
     *
     * @return mixed
     */
    public function nullable();

    /**
     * If is primary key the column, value for default is false
     *
     * @return mixed
     */
    public function primary();
    
    /**
     * Display the column in the form, default value is true
     *
     * @return mixed
     */
    public function hidden();

}