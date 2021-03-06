<?php
/**
 * Created by PhpStorm.
 * User: rudys
 * Date: 21/06/16
 * Time: 02:19 PM
 */

namespace Ncrousset\GenCRUD\Console;

require __DIR__ . '/../Db/Capsule.php';

use Illuminate\Console\Command;
use Ncrousset\GenCRUD\Generate\Directory;
use Ncrousset\GenCRUD\Generate\File;
use Ncrousset\GenCRUD\Db\TableSchema;

class GenerateMaintCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:gencrud {name} {--table=}';

    /**
     * The console command instance
     *
     * @var string
     */
    protected $description = 'Generate file for mant.';

    /**
     * GenerateMaintCommand constructor.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        $dir = new Directory();

        if($name = $this->argument('name')) {

            if(!$dir->isExists()) {
                $dir->createDirectory();
            }

            if((new File)->isExists($name)) {
                $this->error("File already exists " . $name);
                $this->info("Fin");
                return false;
            } else {

                $table = null;

                if($table = $this->option('table')) {
                    if(!(new TableSchema($table))->hasTable()) {
                        $this->error("There is a table called ".$table);
                        $this->info("Fin");
                    }
                    $this->info("Table name: $table");
                }

                if((new File)->generate($name, $table)) {
                    $this->info("Created ". $name);
                }else {
                    $this->error("Error creating the file " . $name);
                    $this->info("Fin");
                    return false;
                }
            }
        }

        $this->info("Fin");
    }
}