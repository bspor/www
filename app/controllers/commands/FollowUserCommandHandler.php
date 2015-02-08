<?php
/**
 * Created by PhpStorm.
 * User: Brandon
 * Date: 1/24/2015
 * Time: 10:31 PM
 */

namespace controllers\commands;


use Laracasts\Commander\CommandHandler;

class FollowUserCommandHandler implements CommandHandler {
    /**
     * @var UserRepository
     */
    protected $userRepo;
    /**
     * @param UserRepository $userRepo
     */
    function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }
    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $user = $this->userRepo->findById($command->userId);
        $this->userRepo->follow($command->userIdToFollow, $user);
        return $user;
    }
}