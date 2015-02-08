<?php
/**
 * Created by PhpStorm.
 * User: Brandon
 * Date: 1/19/2015
 * Time: 2:33 PM
 */

namespace acme\Commanding;


interface CommandHandler {
    public function handle($command);
}