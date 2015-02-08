<?php
/**
 * Created by PhpStorm.
 * User: Brandon
 * Date: 1/16/2015
 * Time: 2:37 PM
 */

class PublishStatusCommand {

    public $body;
    public $userId;

    function __construct($body, $userId)
    {
        $this->body = $body;
        $this->userId=$userId;
    }


}