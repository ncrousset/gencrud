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

    public function getSchema()
    {

    }

    public function hasTable()
    {
        return $this->shema->hasTable($this->tableName);
    }
}