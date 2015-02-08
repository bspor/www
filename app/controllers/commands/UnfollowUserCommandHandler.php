<?php
/**
 * Created by PhpStorm.
 * User: Brandon
 * Date: 1/25/2015
 * Time: 6:54 PM
 */

namespace controllers\commands;


use Laracasts\Commander\CommandHandler;

class UnfollowUserCommandHandler implements CommandHandler{
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
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
        $user = $this->userRepo->findById($command->userId);
        $this->userRepo->unfollow($command->userIdToUnfollow, $user);
    }

}