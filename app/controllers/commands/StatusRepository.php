<?php
/**
 * Created by PhpStorm.
 * User: Brandon
 * Date: 1/16/2015
 * Time: 2:58 PM
 */




use controllers\commands\Status;
use models\User;

class StatusRepository {

    /**
     * @param User $user
     * @return mixed
     */
    public function getAllForUser() {

        return Sentry::getUser()->statuses()->with('user')->latest()->get();
    }

    /**
     * @param Status $status
     * @param $userId
     * @return
     */
    public function save(Status $status, $userId)
    {
        $user=Sentry::findUserById($userId);

        return $user->statuses()->save($status);
    }


    /**
     * Get the feed for a user.
     *
     * @param User $user
     * @return mixed
     */
    public function getFeedForUser(User $user)
    {
        $userIds = $user->followedUsers()->lists('followed_id');
        $userIds[] = $user->id;
        return Status::with('comments')->whereIn('user_id', $userIds)->latest()->get();
    }
}