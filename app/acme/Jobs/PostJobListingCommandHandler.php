<?php
/**
 * Created by PhpStorm.
 * User: Brandon
 * Date: 1/19/2015
 * Time: 2:32 PM
 */

namespace acme\Jobs;

use acme\Commanding\CommandHandler;
use acme\Events\EventDispatcher;
class PostJobListingCommandHandler implements CommandHandler{

    protected $job;
    /**
     * @var EventDispatcher
     */
    private $dispatcher;

    /**
     * @param Job $job
     * @param EventDispatcher $dispatcher
     */
    function __construct(Job $job, EventDispatcher $dispatcher)
    {
        $this->job = $job;
        $this->dispatcher = $dispatcher;
    }


    public function handle($command)
    {
        $job = Job::post($command->title, $command->description);
        $this->dispatcher->dispatch($job->releaseEvents());
    }

}