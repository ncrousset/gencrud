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
        fwrite($file, "class $nameClass".PHP_EOL. "{".PHP_EOL);
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
            $str .= PHP_EOL . "\t\t".'$rows = [';

            // Generate rows for your crud
            foreach ($columns as $column) {
                $str .= $this->generateRows($column);
            }

            $str .= PHP_EOL."\t\t];";
        }

        $str .= PHP_EOL.PHP_EOL."\t}".PHP_EOL;

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
            'create'  => 'Configuration parameters for form create data'
        ];

        $str = PHP_EOL."\t/**".PHP_EOL;
        $str .= "\t* $mensage[$method]".PHP_EOL;
        $str .= "\t*/";

        return $str;
    }
}