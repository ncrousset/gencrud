<?php
/**
 * Created by PhpStorm.
 * User: rudys
 * Date: 21/06/16
 * Time: 02:19 PM
 */

namespace Ncrousset\GenCRUD\Console;

use Illuminate\Console\Command;
use Ncrousset\GenCRUD\Generate;
use Ncrousset\GenCRUD\Generate\Directory;

class GenerateMaintCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gencrud:generate {name} {--table=}';

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

//            $generate->createFile('name');

            if($table = $this->option('table')) {
                $this->info("Table name: $table");
            }
        }

        $this->info("Fin");
    }
}