<?php

namespace Ncrousset\GenCRUD\Generate;

trait WriteClass
{
    /**
     * @param $file
     */
    public function initPhpFile($file)
    {
        fwrite($file, '<?php'.PHP_EOL.PHP_EOL);
    }

    /**
     * Inicializa la class
     *
     * @param $file
     * @param $nameClass
     */
    public function openClass($file, $nameClass)
    {
        fwrite($file, "class ".ucfirst($nameClass).PHP_EOL. "{".PHP_EOL);
    }

    /**
     * Creating atribute
     *
     * @param $file
     * @param $nameAtrib
     * @param $valueAtrib
     * @param string $visibility
     */
    public function addAtribute($file, $nameAtrib, $valueAtrib, $visibility = "protected")
    {
        $valueFormat = (gettype($valueAtrib) === "string")
                ? "'$valueAtrib'"
                : $valueAtrib ;

        $str = PHP_EOL . "\t" . "$visibility $nameAtrib = $valueFormat;".PHP_EOL;

        fwrite($file, $str);
    }

    /**
     * Add the method on class
     *
     * @param $file
     * @param $nameMethod
     * @param string $visibility public|private|protected
     */
    public function addMethod($file, $nameMethod, $columns, $visibility = "public")
    {
        fwrite($file, $this->comment($nameMethod)); // Crea de comment
        $str = PHP_EOL. "\t". "$visibility function $nameMethod()";
        $str .= PHP_EOL. "\t{";

        if($columns !== false) {

            $str .= PHP_EOL."\t\t //Columns the table";

            // Generate rows for your crud
            foreach ($columns as $key => $column) {
                $classFieldSchema = 'FieldSchema';

                $typeField = [
                    'int' => 'FieldInt',
                    'varchar' => 'FieldString',
                    'text' => 'FieldText',
                    'blob' => 'FIeldBoolean'
                ];

                $type = $this->getTypeAndLenght($column->Type);

                $classFieldInt = $typeField[$type[0]]; //Depends on $colums->Type

                $strEntity = "$%s = (new %s(new %s('%s')));";
                $str .= PHP_EOL."\t\t". sprintf(
                        $strEntity, $column->Field, $classFieldSchema,
                        $classFieldInt, $column->Field);

                $str .= ($column->Null !== 'YES') ?"":PHP_EOL."\t\t".sprintf("$%s->nullable();", $column->Field);
                $str .= ($column->Key !== 'PRI') ?"":PHP_EOL."\t\t".sprintf("$%s->primary();", $column->Field);
                $str .= ($type[1] > 0) ? PHP_EOL."\t\t".sprintf("$%s->setMaxLength(%d);", $column->Field,  $type[1]):"";

                $str .= PHP_EOL;
            }
        }
        $str .= PHP_EOL."\t}".PHP_EOL;
        fwrite($file, $str);
    }

    /**
     * @param $file
     * @param $columns
     */
    public function createRows($file, $columns)
    {
        $str = PHP_EOL."\tprivate ".'$rows = [';

        foreach ($columns as $column) {
            $str .= PHP_EOL."\t\t\t"."'name' => (new FieldSchema(FieldInt)),";
        }

        $str .= PHP_EOL."\t];";
        fwrite($file, $str);
    }

    /**
     *  Close the class
     *
     * @param $file
     */
    public function closeClass($file)
    {
        fwrite($file, "\r}");
    }

    /**
     * Get the type from columns and lenght
     *
     * @param $stringType
     * @return array
     */
    private function getTypeAndLenght($stringType)
    {
        $pos = strpos($stringType, '(');

        //if $pos is false the type is bool
        if($pos) {
            $type = substr($stringType, 0, $pos);
            $lenght = substr($stringType, ($pos + 1));
            $lenght = (int) str_replace(')', '', $lenght);
        }else {
            $type = $stringType;
            $lenght = 0;
        }

        return [$type, $lenght];
    }

    /**
     *
     */
    private function generateRows($row)
    {
        $str = PHP_EOL . "\t\t\t 'name' => ";
        $str .= "[";
        $str .= PHP_EOL . "\t\t\t\t 'type' => 'int', ";
        $str .= PHP_EOL . "\t\t\t\t 'null' => false, ";
        $str .= PHP_EOL . "\t\t\t\t 'primary' => false, ";
        $str .= PHP_EOL . "\t\t\t\t 'default' => 'hola', ";
        $str .= PHP_EOL . "\t\t\t\t 'auto_increment' => false, ";
        $str .= PHP_EOL . "\t\t\t\t 'hidden' => false";
        $str .= PHP_EOL."\t\t\t ]";

        return $str. ',';
    }

    /**
     *
     * @param $method
     */
    private function comment($method)
    {
        $mensage = [
            'index' => 'Configuration parameters for listing data',
            'show'  => 'Configuration parameters for show data',
            'edit'  => 'Configuration parameters for form edit data',
            'create'  => 'Configuration parameters for form create data',
            'shema' => 'Schema the table'
        ];

        $str = PHP_EOL."\t/**".PHP_EOL;
        $str .= "\t* $mensage[$method]".PHP_EOL;
        $str .= "\t*/";

        return $str;
    }
}