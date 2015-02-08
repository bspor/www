<?php
/**
 * Created by PhpStorm.
 * User: Brandon
 * Date: 1/19/2015
 * Time: 2:40 PM
 */

namespace acme\Jobs;

use acme\Events\EventGenerator;
class Job extends \Eloquent{
    use EventGenerator;
    protected $fillable = [''];


    public static function post($title, $description) {

        $job = static::create(compact('title', 'description'));

        $job->raise(new JobWasPosted($job));

        return $job;

    }
}