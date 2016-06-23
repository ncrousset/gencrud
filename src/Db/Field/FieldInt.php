<?php


namespace Ncrousset\GenCRUD\Db\Field;

use Ncrousset\GenCRUD\Db\Field\FieldSchemaInterface;
use Ncrousset\GenCRUD\Db\Field\Field;

class FieldInt extends Field implements FieldSchemaInterface
{

    /**
     * @var string
     */
     public $type = 'int';

}