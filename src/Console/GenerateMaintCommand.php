<?php
/**
 * Created by PhpStorm.
 * User: rudys
 * Date: 21/06/16
 * Time: 02:19 PM
 */

namespace Ncrousset\GenCRUD\Console;

use Illuminate\Console\Command;

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
        if($name = $this->argument('name')) {
            $this->info("Nombre de archivo $name");
        }

        $this->info("Fin");
    }
}