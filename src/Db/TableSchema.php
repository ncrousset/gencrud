<?php

namespace Ncrousset\GenCRUD\Db;

use Illuminate\Database\Capsule\Manager as Capsule;

class TableSchema
{
    protected $tableName = "";

    protected $shema = null;

    /**
     * TableSchema constructor.
     *
     * @param $tableName
     */
    public function __construct($tableName)
    {
        $this->tableName = $tableName;
        $this->shema = (Capsule::schema());
    }

    /**
     * @return bool
     */
    public function getSchema()
    {
        if(!$this->hasTable()) {
            return false;
        }

        $colums = Capsule::select("SHOW COLUMNS FROM $this->tableName");

        return $colums;

    }

    /**
     * If the table exists in the schema
     *
     * @return bool
     */
    public function hasTable()
    {
        return $this->shema->hasTable($this->tableName);
    }
}