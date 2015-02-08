<?php
/**
 * Created by PhpStorm.
 * User: Brandon
 * Date: 1/19/2015
 * Time: 2:20 PM
 */

namespace acme\Commanding;


use Illuminate\Foundation\Application;

class Commandbus {

    protected $commandTranslator;
    private $app;

    function __construct(Application $app, CommandTranslator $commandTranslator)
    {
        $this->commandTranslator = $commandTranslator;
        $this->app=$app;
    }


    /**
     * @param $command
     */
    public function execute($command) {
        $handler = $this->commandTranslator->toCommandHandler($command);

        //Resolve out of ioc container, and call handle method

        return $this->app->make($handler)->handle($command);
    }
}