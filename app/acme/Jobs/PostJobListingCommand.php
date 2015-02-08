<?php
/**
 * Created by PhpStorm.
 * User: Brandon
 * Date: 1/19/2015
 * Time: 2:17 PM
 */

namespace acme\Jobs;


class PostJobListingCommand {
    public $title;

    public $description;

    function __construct($title, $description)
    {
        $this->title = $title;
        $this->description = $description;
    }


}