<?php
/**
 * Created by PhpStorm.
 * User: rudys
 * Date: 28/06/16
 * Time: 10:24 AM
 */

namespace Ncrousset\GenCRUD\Console;

use Illuminate\Console\Command;

class GenCrudCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "gencrud";

    /**
     * @var string
     */
    protected $description = "Execute the GenCrud";

    /**
     * GenCrudCommand constructor.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        echo  "Handle";
    }
}