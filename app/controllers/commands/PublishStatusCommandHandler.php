<?php
/**
 * Created by PhpStorm.
 * User: Brandon
 * Date: 1/16/2015
 * Time: 2:51 PM
 */




use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use controllers\commands\Status;

class PublishStatusCommandHandler implements CommandHandler {
    use DispatchableTrait;

    protected $statusRepository;

    function __construct(StatusRepository $statusRepository)
    {
        $this->statusRepository = $statusRepository;
    }

    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $status = Status::publish($command->body);
        $status = $this->statusRepository->save($status, $command->userId);
        $this->dispatchEventsFor($status);
        return $status;
    }


}