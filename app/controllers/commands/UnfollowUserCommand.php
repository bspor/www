<?php
/**
 * Created by PhpStorm.
 * User: Brandon
 * Date: 1/25/2015
 * Time: 6:53 PM
 */

namespace controllers\commands;


class UnfollowUserCommand {
    /**
     * @var string
     */
    public $userId;
    /**
     * @var string
     */
    public $userIdToUnfollow;
    /**
     * @param string userId
     * @param string userIdToUnfollow
     */
    public function __construct($userId, $userIdToUnfollow)
    {
        $this->userId = $userId;
        $this->userIdToUnfollow = $userIdToUnfollow;
    }
}