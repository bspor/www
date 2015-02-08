<?php
/**
 * Created by PhpStorm.
 * User: Brandon
 * Date: 1/19/2015
 * Time: 2:22 PM
 */

namespace acme\Commanding;


use Exception;

class CommandTranslator {

    public function toCommandHandler($command) {
        $handler = str_replace('Command', 'CommandHandler', get_class($command));//PostJobListingCommandHanlder

        if(! class_exists($handler)){
            $message = "Command Handler [$handler] does not exist.";

            throw new Exception($message);


        }

        return $handler;
    }
}