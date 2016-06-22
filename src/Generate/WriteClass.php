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
    public function addMethod($file, $nameMethod, $visibility = "public")
    {
        fwrite($file, $this->comment($nameMethod)); // Crea de comment
        $str = PHP_EOL. "\t". "$visibility function $nameMethod()";
        $str .= PHP_EOL. "\t{";
        $str .=  PHP_EOL."\t\t//Code";
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
        fwrite($file, PHP_EOL."\r}".PHP_EOL);
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