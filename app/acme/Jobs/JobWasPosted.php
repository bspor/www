<?php
/**
 * Created by PhpStorm.
 * User: Brandon
 * Date: 1/19/2015
 * Time: 3:14 PM
 */

namespace acme\Jobs;


class JobWasPosted {

    public $job;

    /**
     * @param Job $job
     */
    function __construct(Job $job)
    {
        $this->job = $job;
    }


}