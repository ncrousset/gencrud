<?php

/**
 * Created by PhpStorm.
 * User: rudys
 * Date: 21/06/16
 * Time: 04:11 PM
 */

namespace Ncrousset\GenCRUD;

use Illuminate\Container\Container;
use Illuminate\Console\Command;

abstract class GenCrud
{
    /**
     * The container instance
     *
     * @var \Illuminate\Container\Container
     */
    protected $container;

    /**
     * The console command instance
     *
     * @var \Illuminate\Console\Command
     */
    protected $command;

    /**
     * Run de GenCrud
     *
     * @return void
     */
    abstract public function run();

    /**
     *
     *
     * @param string $class
     * @return void
     */
    public function call($class)
    {
        $this->resolve($class)->run();

        if(isset($this->command)) {
            $this->command->getOutput()->writeln("<info>Gencrud:</info> $class" );
        }
    }

    /**
     * Resolve an instance of the given GenCrud class.
     *
     * @param $class
     * @return mixed
     */
    public function resolve($class)
    {
        if(isset($this->container)) {
            $instance = $this->container->make($class);

            $instance->setContainer($this->container);
        } else {
            $instance = new $class;
        }

        if(isset($this->command)) {
            $instance->setCommand($this->command);
        }

        return $instance;
    }

    /**
     * Set the Ioc container instance.
     *
     * @param Container $container
     * @return $this
     */
    public function setContainer(Container $container)
    {
        $this->container = $container;

        return $this;
    }

    /**
     * Set the command instance.
     *
     * @param Command $command
     * @return $this
     */
    public function setCommand(Command $command)
    {
        $this->command = $command;

        return $this;
    }
}