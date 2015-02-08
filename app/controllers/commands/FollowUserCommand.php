<?php
/**
 * Created by PhpStorm.
 * User: Brandon
 * Date: 1/24/2015
 * Time: 10:31 PM
 */

namespace controllers\commands;


class FollowUserCommand {
    /**
     * @var
     */
    public $userId;
    /**
     * @var
     */
    public $userIdToFollow;
    /**
     * @param $userId
     * @param $userIdToFollow
     */
    function __construct($userId, $userIdToFollow)
    {
        $this->userId = $userId;
        $this->userIdToFollow = $userIdToFollow;
    }
}